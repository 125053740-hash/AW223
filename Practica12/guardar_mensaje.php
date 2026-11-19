<?php
// Este endpoint solo acepta los datos enviados desde el formulario por POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contacto');
    exit();
}

// Recorta espacios para validar y guardar valores limpios.
$nombre = trim($_POST['txtnombre'] ?? '');
$correo = trim($_POST['txtcorreo'] ?? '');
$mensaje = trim($_POST['txtmensaje'] ?? '');

// Rechaza datos vacios, correos invalidos y textos mayores a los limites del formulario.
if ($nombre === '' || $correo === '' || $mensaje === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)
    || strlen($nombre) > 100 || strlen($correo) > 150 || strlen($mensaje) > 2000) {
    header('Location: index.php?estadophp=datos#contacto');
    exit();
}

require_once 'conexion.php';

// Las consultas preparadas separan los datos del comando SQL.
$consulta = $conexion->prepare('INSERT INTO datos (nombre, correo, mensaje) VALUES (?, ?, ?)');
$consulta->bind_param('sss', $nombre, $correo, $mensaje);

try {
    $consulta->execute();
    $consulta->close();
    $conexion->close();
    header('Location: index.php?estadophp=exito#contacto');
} catch (mysqli_sql_exception $error) {
    header('Location: index.php?estadophp=error#contacto');
}

exit();