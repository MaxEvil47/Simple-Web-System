<body>

    <br>

        <table border="0" align="center">
            
            <tr>
                <td align="left" style="width:650px;"><img src="Placeholder Logo.jpg"></td>
                <td align="right"><img src="Placeholder Logo.jpg"></td>
            </tr>

        </table>

        <br><br>
        <br><br>

        <table border="0" align="center">

            <tr>
                <td align="center">
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
                            $html = printf('El empleado %s %s con rut %s tiene 5 dias libres, contando desde hoy ' . date('d-m-Y', strtotime('now')) . ' 
                            hasta el termino de ' . date('d-m-Y', strtotime($date. '+ 5 days')) . '.', $row['nombre'], $row['apellido'], $row['rut']);
                        }

                    ?>
                </td>
            </tr>

        </table>

</body>