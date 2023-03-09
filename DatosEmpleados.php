<?php

   $nombreEmp = $_POST["nombreEmp"];
   $apellidoEmp = $_POST["apellidoEmp"];
   $rutEmp = $_POST["rutEmp"];
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

   if($nombreEmp!='' && $apellidoEmp!='' && $rutEmp!='') 
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
            $query = "INSERT INTO empleadosad(nombre, apellido, rut, fecha) VALUES ('$nombreEmp','$apellidoEmp','$rutEmp', curdate())";
            $result = $mysqli->query($query);

            if($result===TRUE)
            {
               echo "<br><center>Empleado registrado exitosamente!</center><br>";
               echo "<center><a href='./formulario.html'>Haga clic aqui para regresar<a></center>"; 
            }
         }
         $mysqli->close();
      }
   }
   else if($rutEmp != '')
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
            $query = "SELECT nombre, apellido, rut, fecha FROM empleadosad where rut='". $rutEmp ."'";
            $result = $mysqli->query($query);

            echo "<table border='2' align='center'>";
            echo "<caption>Empleado consultado</caption>";
            while($row = $result->fetch_assoc())
            {
               echo "<tr><td align='center'>Nombre</td><td align='center'>Apellidos</td><td align='center'>RUT</td><td align='center'>Fecha inicio</td></tr>";
               printf("<tr><td align='center'>%s</td><td align='center'>%s</td><td align='center'>%s</td><td align='center'>%s</td></tr>",$row["nombre"],$row["apellido"],$row["rut"],$row["fecha"]);
               $exito=1;
            }
            echo "</table>";

            if($exito==0)
            {
               echo "<br><center>Empleado no registrado</center><br>";
               echo "<br/><center><a href='./formulario.html'>Haga clic aqui para regresar<a></center>";
            }
            else
            {
               echo "<br><center>Consulta exitosa!</center><br>";
               echo "<br/><center><a href='./formulario.html'>Haga clic aqui para regresar<a></center>";
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
  