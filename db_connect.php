<?php
$servername = "localhost"; 
$username = "adamocda_cinema";
$password = "XNhyCzULPNURnSHWgmLL";
$dbname = "adamocda_cinema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}
?>
