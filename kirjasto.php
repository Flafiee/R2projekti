<?php
include 'yhteysr2.php';

$viesti = '';

$kirja_id = $_POST['kirja_id'] ?? ''; //?? poistaa virheilmoituksen
$lainaaja = $_POST['lainaaja'] ?? '';
$palautus_laina_id = $_POST['palautus_laina_id'] ?? '';
$palautus_lainaaja = $_POST['palautus_lainaaja'] ?? '';

if ($palautus_laina_id != '' && $palautus_lainaaja != '') {
    $sql = "SELECT Lainaaja FROM Lainat WHERE LainaID = $palautus_laina_id";
    $tulos = $yhteysr2->query($sql); //palauttaa tulokset
    $rivi = $tulos->fetch(PDO::FETCH_ASSOC); //suorittaa kyselyitä, eli esim kirjan lainauksen merkintä
    $oikea_lainaaja = $rivi['Lainaaja'];
    
    if ($palautus_lainaaja == $oikea_lainaaja) {
        $sql = "UPDATE Lainat SET Palautettu = 1 WHERE LainaID = $palautus_laina_id";
        $yhteysr2->exec($sql);
        $viesti = 'Kirja palautettu.';
    } else {
        $viesti = 'Väärä lainaaja.';
    }
}

if ($kirja_id != '' && $lainaaja != '') { //varmistetaan että molemmat kentät täytetty
    $sql = "SELECT Kopioita FROM Kirjat WHERE KirjaID = $kirja_id";
    $tulos = $yhteysr2->query($sql);
    $rivi = $tulos->fetch(PDO::FETCH_ASSOC);
    $kopioita = $rivi['Kopioita'];

    $sql = "SELECT COUNT(*) AS lainoja FROM Lainat WHERE KirjaID = $kirja_id AND Palautettu = 0";
    $tulos = $yhteysr2->query($sql);
    $rivi = $tulos->fetch(PDO::FETCH_ASSOC);
    $lainassa = $rivi['lainoja'];

    if ($kopioita > $lainassa) {
        $sql = "INSERT INTO Lainat (KirjaID, Lainaaja) VALUES ($kirja_id, '$lainaaja')";
        $yhteysr2->exec($sql);
        $viesti = 'Kirja lainattu.';
    } else {
        $viesti = 'Ei saatavilla.';
    }
} else {
    $viesti = 'Kirjoita ID ja lainaaja.';
}

$kirjat = $yhteysr2->query(
    'SELECT k.KirjaID, k.KirjaName, a.KirjailijaName, g.Genret, k.Kopioita, COUNT(l.LainaID) AS Lainassa FROM Kirjat k JOIN Kirjailijat a ON k.KirjailijaID = a.KirjailijaID JOIN Genret g ON k.GenreID = g.GenreID LEFT JOIN Lainat l ON k.KirjaID = l.KirjaID AND l.Palautettu = 0 GROUP BY k.KirjaID, k.KirjaName, a.KirjailijaName, g.Genret, k.Kopioita'
);

$lainat = $yhteysr2->query(
    'SELECT l.LainaID, l.KirjaID, k.KirjaName, l.Lainaaja, l.LainaPvm FROM Lainat l JOIN Kirjat k ON l.KirjaID = k.KirjaID WHERE l.Palautettu = 0'
);
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Kirjasto</title>
</head>
<body>
    <h1>Kirjasto</h1>

    <p><?php echo $viesti; ?></p>

    <h2>Kirjat</h2>
    <table border="1" padding="5" spacing="0">
    <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Kirjailija</th>
        <th>Genre</th>
        <th>Kopioita</th>
        <th>Lainassa</th>
        <th>Saatavilla</th>
    </tr>
        <?php foreach ($kirjat as $kirja) { 
            $saatavilla = $kirja['Kopioita'] - $kirja['Lainassa'];
        ?>
    <tr>
        <td><?php echo $kirja['KirjaID']; ?></td>
        <td><?php echo $kirja['KirjaName']; ?></td>
        <td><?php echo $kirja['KirjailijaName']; ?></td>
        <td><?php echo $kirja['Genret']; ?></td>
        <td><?php echo $kirja['Kopioita']; ?></td>
        <td><?php echo $kirja['Lainassa']; ?></td>
        <td><?php echo $saatavilla; ?></td>
    </tr>
        <?php } ?>
    </table>

    <h2>Lainaa kirja</h2>
    <form method="post">
        Kirjan ID:<br>
        <input type="text" name="kirja_id"><br><br>

        Lainaaja:<br>
        <input type="text" name="lainaaja"><br><br>

        <button type="submit">Lainaa tästä</button>
    </form>

    <h2>Lainatut kirjat</h2>
    <table border="1" padding="5" spacing="0">
        <tr>
            <th>Lainan ID</th>
            <th>Kirjan ID</th>
            <th>Kirja</th>
            <th>Lainaaja</th>
            <th>Päivämäärä</th>
        </tr>
        <?php foreach ($lainat as $laina) { ?>
            <tr>
                <td><?php echo $laina['LainaID']; ?></td>
                <td><?php echo $laina['KirjaID']; ?></td>
                <td><?php echo $laina['KirjaName']; ?></td>
                <td><?php echo $laina['Lainaaja']; ?></td>
                <td><?php echo $laina['LainaPvm']; ?></td>
            </tr>
        <?php } ?>
    </table>
    
    <h2>Palauta kirja</h2>
    <form method="post">
        Lainan ID:<br>
        <input type="text" name="palautus_laina_id"><br><br>

        Lainaajan nimi:<br>
        <input type="text" name="palautus_lainaaja"><br><br>

        <button type="submit">Palauta</button>
    </form>
</body>
</html>
