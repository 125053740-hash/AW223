<?php
header('Content-Type: text/html; charset=UTF-8');

function redirigirEstado($estado)
{
    header('Location: index.php?estado=' . $estado, true, 303);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirigirEstado('datos');
}

$concepto = $_POST['txtconcepto'] ?? null;
$categoria = $_POST['txtcategoria'] ?? null;
$monto = $_POST['txtmonto'] ?? null;

if (!is_string($concepto) || !is_string($categoria) || !is_string($monto)) {
    redirigirEstado('datos');
}

$concepto = trim($concepto);
$categoria = trim($categoria);
$monto = trim($monto);


require_once __DIR__ . '/conexion.php';

try {
    $consulta = $conexion->prepare(
        'INSERT INTO datos (monto, categoria, concepto, pagado) VALUES (?, ?, ?, 0)'
    );
    $consulta->bind_param('sss', $monto, $categoria, $concepto);
    $consulta->execute();
    $consulta->close();
    $conexion->close();
} catch (mysqli_sql_exception $error) {
    error_log('Error al guardar un gasto: ' . $error->getMessage());
    $conexion->close();
    redirigirEstado('error');
}

redirigirEstado('exito');
