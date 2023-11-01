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

                        echo "La lista de productos es la siguiente<br><br>" ;
                        echo "<table border='1' align='center'>";
                            echo "<tr>";
                                echo "<td>ID</td>";
                                echo "<td>Producto</td>";
                                echo "<td>Codigo</td>";
                                echo "<td>Cantidad</td>";
                                echo "<td>Proveedor</td>";
                                echo "<td>Fecha</td>";
                            echo "</tr>";

                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["producto"] . "</td>";
                                echo "<td>" . $row["codigo"] . "</td>";
                                echo "<td>" . $row["cantidad"] . "</td>";
                                echo "<td>" . $row["proveedor"] . "</td>";
                                echo "<td>" . $row["fecha"] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";

                    ?>
                </td>
            </tr>

        </table>

</body>