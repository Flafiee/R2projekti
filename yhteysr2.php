<?php
$servername = "localhost";
$username = "root";  // XAMPP default username
$password = "";     // XAMPP default password 


try {
       $yhteys = new PDO("mysql:host=$servername;dbname=$username", $username, $password);
       $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Yhteys muodostettu<br>";
    }
catch(PDOException $e)
    {
    echo "Ei yhteyttä tietokantaan!<br> " . $e->getMessage();
    }
?>