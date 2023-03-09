<?php

    if(!empty($_POST["Ingresar"]))
    {
        if (empty($_POST["rutEmp"]))
        {
            echo "Necesita el RUT del empleado";
        }
        else
        {
            include("conexionbd.php");
            $empleado = $_POST["rutEmp"];
            $sql = $conexion ->query("SELECT nombre, apellido, rut FROM empleadosad WHERE rut = '$empleado'");

            if ($datos=$sql->fetch_object())
            {
                header("location:formulario.php");
            }
            else
            {
                echo "<div align='center'>Empleado no existe</div>";
                echo "<div align='center'><a href='login.php'>Volver al inicio</a></div>";
            }
            
        }
        
    }

?>