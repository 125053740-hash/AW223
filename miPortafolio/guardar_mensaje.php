<?php 
require_once("conexion.php");

$nombre= $_POST["txtnombre"];
$correo= $_POST["txtcorreo"];
$mensaje= $_POST["txtmensaje"];

$sqlInsert="INSERT INTO mensajes(nombre,correo,mensaje) VALUES(?,?,?)";

$stmt=$conexion->prepare($sqlInsert);

$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()){
    header("Location:index.php?estadophp=exito");
}else{
    header("Location:index.php?estadophp=error");
}