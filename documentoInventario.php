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

                        $user="root";
                        $password='';
                        $bd="proyectomejora";
                        $host="localhost";
                        $result=NULL;
                        $exito=0;
                        $date = date('d-m-Y');

                        $mysqli = new mysqli($host, $user, $password, $bd);

                        $query = "SELECT * FROM inventarioad";
                        $result = $mysqli->query($query);

                        echo "La lista de productos es la siguiente<br>" ;
                        while($row = $result->fetch_assoc())
                        {
                            $html = '<div align="center" text-align="center">' . printf("%s %s %s %sc %s %s <br>" , $row["id"], $row["producto"], $row["codigo"], $row["cantidad"], $row["proveedor"], $row["fecha"]) . '</div>';
                        }

                    ?>
                </td>
            </tr>

        </table>

</body>