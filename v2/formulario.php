<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Tarea Semana 6</title>
    </head>

    <body>
        <br><br>

        <form name="datosEmpleado" method="post" action="controlador.php"> <br>

            <table border="2" align="center">

                <caption>Datos del empleado</caption>
                
            
                <tr>
                    <td>Ingresa el nombre del empleado</td>
                    <td><input type="text" name="nombreEmp" size="40" maxlength="100" placeholder="Nombre del empleado"></td>

                    <?php

                        include("conexionbd.php");
                        include("controlador.php");
                        $query = "SELECT nombre, apellido, rut FROM empleadosad WHERE rut = '$empleado'";
                        $resultado = $conexion->query($query);

                        if($resultado->num_rows > 0)
                        {
                            while($row = $resultado->fetch_assoc())
                            {
                                echo $row["nombre"], $row["apellido"];
                            }
                        }
                    
                    ?>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="Ingresar" value="Ingresar">
                        <input type="submit" name="Consultar" value="Consultar">
                        <input type="submit" name="Feriado" value="Feriado">
                        <input type="reset" name="Cancelar" value="Cancelar">
                    </td>
                </tr>

            </table>

        </form>

    </body>

</html>