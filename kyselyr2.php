<head> <meta charset="utf-8"></head>
<?php 
@ini_set("display_errors", 1);
@ini_set("error_reporting", E_ALL);
// Otetaan yhteys tietokantapalvelimeen
include("yhteysr2.php");
// Muista: ei lainausmerkkejä lainausmerkkiparin sisälle: EI " " " "
// vaan: " ' ' "
$sql_lause = "SELECT Country, COUNT(CustomerID) FROM customers GROUP BY Country;";
try {
  $kysely = $yhteys->prepare($sql_lause);
  $kysely->execute();
    }
 catch (PDOException $e) {
            die("VIRHE: " . $e->getMessage());
       }
$tulos = $kysely->fetchAll();
// Tulostus siististi HTML-taulukkoon
echo "<table border='2'>";
echo "<th align='left'>Maa</th><th align='left'>Määrä</th>";
foreach($tulos as $rivi) {     
	echo "<tr>";
		echo "<td>" . $rivi['Country'] . "</td>" . "<td>" . $rivi['COUNT(CustomerID)'] . "</td>";
	echo "</tr>";
}                         
echo "</table>";
?>