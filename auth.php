<?php
session_start();
if(!isset($_SESSION['ID_utilizator'])){
    header("Location: index.php");
    exit;
}
?>
