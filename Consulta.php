<!DOCTYPE html>
<html>
<head>
<title>Consulta</title>
<style type="text/css">
* {
  box-sizing: border-box;
}
body {
  font: 16px Arial;  
  background-image: url('images/black.jpg');
  width:960px;margin:0 auto
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 50%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
h1,h2,h3,pre{
    color: #fff;
}
pre{
  font-size: 18px;
  font-weight: bold;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
 }
img{
  position: fixed;
  left: 0px;
  top: 100px;
}
table {
  border-collapse: collapse;
  width: 100%;
  color: #ffffff;
}

th, td {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid #ddd;
}
th,caption{
  padding-top: 12px;
  text-align: center;
  color: white;
  font-weight: bold;
}
#volver{
  text-decoration: none;
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
  padding: 10px;
}
.buscar{
  float: left;
  width: 50%;
}
.resultados{
  width: 30%;
  float: right;
  border:2px solid #fff;
}
.tabla{
  width: 50%;
  float: left;
  margin-top: 30px;
}
.medicos{
  margin-top: 30px;
}
.busqueda{
  margin-bottom:  30px;
}
</style>

</head>     
<body>
    <a href="main.php">
       <img src="images/logo.png" alt="Logo">
    </a>
  <h2>Coloque los datos de la Consulta</h2>
  <div class="general">
  <div class="buscar" >
      <form class="busqueda" name="buscar_p" method="POST">
        <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
        <input  type="text" name="codigoC" id= "codigoC" placeholder="Codigo de la Consulta" required>
        <input  type="text" name="codigoM" id= "codigoM" placeholder="Codigo del Medico" required>
        <br>
        <input type="submit" id="buscarMedico" value="Buscar">
      </form>   
  </div>
  <!-- tablas de apoyo -->
  <div class="resultados" >
  <table class="tConsultas">
			<tr>
        <caption>Consultas registradas</caption>
        <th>Codigo</th>
				<th>Descripcion</th>
				<th>Precio</th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM consultas";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['codigoConsulta'] ?></td>
				<td><?php echo $ver['descripcion'] ?></td>
        <td><?php echo $ver['precio'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    <div class="medicos">
    <table class="tMedicos">
			<tr>
        <caption>Medicos registrados</caption>
        <th>Codigo</th>
				<th>Nombre </th>
				<th>Especialidad</th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM medicos";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['codigoMedico'] ?></td>
				<td><?php echo $ver['nombre'] ?></td>
        <td><?php echo $ver['especialidad'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    </div>
<!-- busqueda de pacientes -->
<div class="tabla">
<?php
$nombrep=""; 
 if(isset($_POST['cedula'])) 
{
  try{
    $cedula= $_POST['cedula'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT nombre, apellido, cedula
    FROM pacientes  WHERE cedula='".$cedula."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        ?>
         <pre>Datos del Paciente
  Nombre: <?php echo $ver['nombre'] ?>   Apellido: <?php echo $ver['apellido'] ?>  Cedula: <?php echo $ver['cedula'] ?></pre>
        
        <?php 
        $nombrep=$ver['nombre'];
      } else{?>  
          <h1>Paciente no registrado</h1>
          <a id="volver" href="registrarPaciente.php">Registrar</a> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
      <!-- busqueda de consultas -->
      <?php
 if(isset($_POST['codigoC'])) 
{
  try{
    $codigo= $_POST['codigoC'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT descripcion, precio
    FROM consultas  WHERE codigoConsulta='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        ?>
        <pre>Datos de Consulta
  Tipo: <?php echo $ver['descripcion'] ?>    Precio: <?php echo $ver['precio'] ?></pre>
        <?php 
      } else{?>  
          <h1>Consulta no Encontrada</h1> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
      <!-- busqueda de medicos -->
      <?php
 if(isset($_POST['codigoM'])) 
{
  try{
    $codigo= $_POST['codigoM'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT nombre, especialidad
    FROM medicos  WHERE codigoMedico='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        ?>
         <pre>
  Medico: <?php echo $ver['nombre'] ?>    Especialidad: <?php echo $ver['especialidad'] ?></pre>
        <?php 
      } else{?>  
          <h1>Medico no Encontrado</h1> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
</div>
</div>

<script src="js/jquery.js"></script>

</body>
</html>
