<?php
require_once "conexion.php";

$id = $_POST['id'] ?? null;
$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

// Validación para no permitir campos vacíos
if (!$id || empty($nombre) || empty($email) || empty($mensaje)) {
    header("Location: admin.php?estado=vacio");
    exit();
}

$stmt = $conexion->prepare("UPDATE mensajes SET nombre = ?, correo = ?, mensaje = ? WHERE id = ?");
$stmt->bind_param("sssi", $nombre, $email, $mensaje, $id);

if ($stmt->execute()) {
    header("Location: index.php?estado=actualizado");
} else {
    header("Location: admin.php?estado=error");
}

$stmt->close();
$conexion->close();