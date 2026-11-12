<?php
// Devuelve los mensajes mas recientes para que admin.php pueda mostrarlos.
function consultaMensajes(): mysqli_result
{
    require_once 'conexion.php';

    return $conexion->query('SELECT id, nombre, correo, mensaje, timeStaps FROM datos ORDER BY id DESC');
}