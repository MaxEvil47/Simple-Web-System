<?php

    require "vendor/autoload.php";

    use Spipu\Html2Pdf\Html2Pdf;

    if(isset($_POST['imprimirInv']))
    {
        ob_start();
        require_once("documentoInventario v2.php");
        $html = ob_get_clean();
    
        $documento = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
        $documento->writeHTML($html);
        $documento->output('Documento Feriado ' . $rutEmp . " " . $date . '.pdf');
    }

?>

<br><br>

<div align="center">

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
            $html = '<div align="center">' . printf("%s %s %s %s %s %s <br>" , $row["id"], $row["producto"], $row["codigo"], $row["cantidad"], $row["proveedor"], $row["fecha"]) . '</div>';
        }
                
    ?>

</div>

<br><br>

<div align="center">

    <form action="" method="post">
        <table border="2" align="center">

            <caption >¿Generar documento?<br></caption>

                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="imprimirInv" value="Generar Documento">
                        </td>
                    </tr>

                </table>

    </form>

</div>