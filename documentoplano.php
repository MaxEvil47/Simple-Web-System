<body>

    <br>

        <table border="0" align="center">
            
            <tr>
                <td align="left" style="width:650px;"><img src="Placeholder Logo.jpg"></td>
                <td align="right"><img src="Placeholder Logo.jpg"></td>
            </tr>

        </table>

        <table border="0" align="center">
            
            <tr>
                <td align="center"><b><u><h3>Solicitud de Feriado</h3></u></b></td>
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
                            $html = printf('El presente documento deja constancia y autoriza al empleado/a %s %s con rut %s el uso de 5 dias feriados, contando desde el dia ' . date('d-m-Y', strtotime('now')) . ' 
                            hasta el termino de ' . date('d-m-Y', strtotime($date. '+ 5 days')) . '.<br>La jefatura, al firmar el presente documento, acepta haber leido y comprendido el contenido de este, aceptando sin observaciones y en su
                            totalidad la solicitud de dias feriados.', $row['nombre'], $row['apellido'], $row['rut']);
                        }

                    ?>
                </td>
            </tr>

        </table>
        <br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br>

        <table border="0" align="center">
            
            <tr>
                <td align="center" style="text-decoration:overline"><b><h4>Firma Jefatura</h4></b></td>
            </tr>

        </table>

</body>