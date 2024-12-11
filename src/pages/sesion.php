<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header('Location: ../login.php'); 
    exit(); 
}
$idUsuario = $_SESSION['idUsuario'];
$nombres = $_SESSION['nombres'];
$apellidos = $_SESSION['apellidos']; 
?>