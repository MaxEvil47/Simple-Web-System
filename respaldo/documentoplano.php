<?php

    require "vendor/autoload.php";

    use Spipu\Html2Pdf\Html2Pdf;

    if(isset($_POST['feriado']))
    {
        ob_start();
        require_once 'datosdocumento.php';
        $html = ob_get_clean();
    
        $documento = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
        $documento->writeHTML($html);
        $documento->output('Documento Feriado ' . $rutEmp . '.pdf');
    }

?>