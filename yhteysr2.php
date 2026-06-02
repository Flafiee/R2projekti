<?php
$servername = "localhost";
$username = "root";  // XAMPP default username
$password = "";     // XAMPP default password
$db = "r2projekti";

try {
    $yhteysr2 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $yhteysr2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ei yhteyttä tietokantaan!<br> " . $e->getMessage();
}
?>