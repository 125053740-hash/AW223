<?php
require_once "conexion.php";

$id = $_GET['id'] ?? null;

if ($id) {
    
    $stmt = $conexion->prepare("DELETE FROM mensajes WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
      
        header("Location: admin.php?estado=eliminado");
        exit();
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }
    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}

$conexion->close();
?>