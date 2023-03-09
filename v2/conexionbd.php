<?php

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "proyectomejora";

    $conexion= mysqli_connect($servidor, $usuario, $clave, $bd);
    $conexion->set_charset("utf-8");    

?>