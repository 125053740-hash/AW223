<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido.");
}

$nombre = isset($_POST["txtnombre"]) && is_string($_POST["txtnombre"]) ? trim($_POST["txtnombre"]) : "";
$correo = isset($_POST["txtcorreo"]) && is_string($_POST["txtcorreo"]) ? trim($_POST["txtcorreo"]) : "";
$mensaje = isset($_POST["txtmensaje"]) && is_string($_POST["txtmensaje"]) ? trim($_POST["txtmensaje"]) : "";

if ($nombre === "" || $correo === "" || $mensaje === "" || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?estado=error#contacto");
    exit;
}

try {
    require_once("conexion.php");

    $sqlInsert = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sqlInsert);
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conexion->close();

    header("Location: index.php?estado=guardado#contacto");
    exit;
} catch (mysqli_sql_exception $error) {
    error_log("No se pudo guardar el mensaje: " . $error->getMessage());
    header("Location: index.php?estado=error#contacto");
    exit;
}