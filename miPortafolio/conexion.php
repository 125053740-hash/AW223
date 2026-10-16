<?php 

$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos= "portafolio_db";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);
$conexion->set_charset("utf8mb4");