<?php
    session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new usuarios();
    $datos = array(
        $_POST['usuario'],
         $_POST['password']
    );
    

    echo $obj->loginUser($datos); 
?>