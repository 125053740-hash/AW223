<?php
// Datos de conexion local; cambialos si tu servidor MySQL usa otros valores.
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$baseDatos = 'portafolio_db';

// Abre la conexion y fija UTF-8 para guardar correctamente los textos.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexion = new mysqli($servidor, $usuario, $password, $baseDatos);
    $conexion->set_charset('utf8mb4');
} catch (mysqli_sql_exception $error) {
    // El mensaje indica que hay que revisar MySQL y los datos de conexion.
    die('No se pudo conectar con la base de datos. Revisa conexion.php.');
}