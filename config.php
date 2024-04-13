<?php
// Plik config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tinderlikedb";

// Tworzenie połączenia
$db = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
