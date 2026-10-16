<?php 
function consultamensajes(){
    require_once "conexion.php";
    $electMsj="SELECT * FROM mensajes";
    try{
        $rsMsj=$conexion->query($electMsj);
        mysqli_close($conexion);
        return $rsMsj;
    }catch(Exception $e){
        echo ("Algo paso al consultar los mensajes: ".$e->getMessage());
    }
}