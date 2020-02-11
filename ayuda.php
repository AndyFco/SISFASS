<!DOCTYPE html>
<html>
<head>
<title>Ayuda</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />

</head>
<body>

	<header>
    <h1>Sistema de Facturacion de Servicios de Salud </h1>
    <a href="main.php">
      <img src="images/logo.png" alt="Logo">
    </a>
  </header>
  
  <h1>Ayuda</h1>
    <br><br><br><br><br><br><br><br><br><br><br><br>
  <h2>Test</h2>

  <?php
  try{
    require_once("utilidades/conection.php");
    $sql = "SELECT * FROM usuario";
    $resultado =$con->query($sql);
  }catch(\Exception $e){echo $e->getMessage();}
     while ( $usuarios =$resultado->fetch_assoc()) { ?>

<pre>
<?php 
  echo $usuarios['codigoEmpleado'];
  echo "<br>";
  echo $usuarios['nombre'];
     }?>
</pre>
<?php  
      $con->close();  
   ?>
</body>
</html>