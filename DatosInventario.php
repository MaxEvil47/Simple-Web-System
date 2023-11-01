<?php

    require "vendor/autoload.php";

    use Spipu\Html2Pdf\Html2Pdf;

    if(isset($_POST['feriado']))
    {
        ob_start();
        require_once("documentoplano.php");
        $html = ob_get_clean();
    
        $documento = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
        $documento->writeHTML($html);
        $documento->output('Documento Feriado ' . $rutEmp . " " . $date . '.pdf');
    }

?>

<?php

    $nombrePro = $_POST["nombrePro"];
    $codigoPro = $_POST["codigoPro"];
    $cantidadPro = $_POST["cantidadPro"];
    $proveedorPro = $_POST["proveedorPro"];
    $date = date('d-m-Y');

    if(isset($_POST['Ingresar']))
    {
        $ingresar=$_POST['Ingresar'];
    }
    else
    {
        $ingresar='';
    }

    if(isset($_POST['Consultar']))
    {
        $consultar=$_POST['Consultar'];
    }
    else
    {
        $consultar='';
    }

    if($nombrePro!='' && $codigoPro!='' && $cantidadPro!='' && $proveedorPro!='') 
    {
        $user="root";
        $password='';
        $bd="proyectomejora";
        $host="localhost";
        $result=NULL;
        $exito=0;

        $mysqli = new mysqli($host, $user, $password, $bd);

        if($mysqli!=NULL)
        { 
            if($ingresar == 'Ingresar')
            {
                $query = "INSERT INTO inventarioad(producto, codigo, cantidad, proveedor, fecha) VALUES ('$nombrePro','$codigoPro','$cantidadPro', '$proveedorPro', curdate())";
                $result = $mysqli->query($query);

                if($result===TRUE)
                {
                    echo "<br><center>Producto registrado exitosamente!</center><br>";
                    echo "<center><a href='./inventario.html'>Haga clic aqui para regresar<a></center>"; 
                }
            }
            $mysqli->close();
        }
    }
    else if($nombrePro ='todo' OR $codigoPro ='todo' OR $cantidadPro ='todo' OR $proveedorPro='todo')
    {
        $user="root";
        $password='';
        $bd="proyectomejora";
        $host="localhost";
        $result=NULL;
        $exito=0;

        $mysqli = new mysqli($host, $user, $password, $bd);

        if($mysqli!=NULL)
        {
            if($consultar == 'Consultar')
            {
                $query = "SELECT id, producto, codigo, cantidad, proveedor, fecha FROM inventarioad";
                $result = $mysqli->query($query);

                while($row = $result->fetch_assoc())
                {
                    $html = 'invalido';
                }
            }
        }
        $mysqli->close();
    }
    else
    {
        echo "Debe ingresar todos los datos para ingresar un nuevo empleado.<br/>";
        echo "Para consultar solo debe ingresar el rut del empleado.<br/>";
        echo "<br/><a href='./formulario.html'>Haga clic aqui para regresar<a>";
    }
?>
  