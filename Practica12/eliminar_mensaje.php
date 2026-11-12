<?php
// Valida el identificador antes de eliminar para evitar consultas con datos inesperados.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: admin.php');
    exit();
}

require_once 'conexion.php';

// La consulta preparada elimina solamente el registro cuyo id coincide.
$consulta = $conexion->prepare('DELETE FROM datos WHERE id = ?');
$consulta->bind_param('i', $id);

try {
    $consulta->execute();
    $consulta->close();
    $conexion->close();
    header('Location: admin.php?estado=eliminado');
} catch (mysqli_sql_exception $error) {
    header('Location: admin.php?estado=error');
}

exit();