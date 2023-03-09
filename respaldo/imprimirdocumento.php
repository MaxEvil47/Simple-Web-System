<?php

    $rutEmp = $_POST["rutEmp"];
    $user="root";
    $password='';
    $bd="proyectomejora";
    $host="localhost";
    $result=NULL;
    $exito=0;
    $date = date('d-m-Y');

    $mysqli = new mysqli($host, $user, $password, $bd);

    $query = "SELECT nombre, apellido, rut FROM empleadosad where rut='$rutEmp'";
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc())
        {
            $html = '<div align="center">' . printf( "El empleado %s %s con rut %s tiene 5 dias libres, contando desde hoy " . date('d-m-Y', strtotime('now')) . " 
            hasta el termino de " . date('d-m-Y', strtotime($date. '+ 5 days')) . ".", $row["nombre"], $row["apellido"], $row["rut"]) . '</div>';
        }

?>

<div align="center">

    <form action="documentoplano.php" method="post">
        <table border="2">
            <tr>
                <td>Confirme el RUT</td>
                <td><input type="text" name="rutEmp" size="40" maxlength="25" placeholder="Sin puntos y con guion"></td>
            </tr>
        </table>

        <input type="submit" value="Vacaciones" name="feriado">

    </form>

</div>