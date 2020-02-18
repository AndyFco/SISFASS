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
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
h1,h2,h3{
    color: #fff;
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
  text-align: left;
  border-bottom: 1px solid #ddd;
}
th,caption{
  padding-top: 12px;
  padding-bottom: 12px;
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
  width: 30%;
}
.resultados{
  width: 40%;
  float: right;
}
.tabla{
  width: 40%;
  margin-top: 30px;
}
.medicos{
  margin-top: 30px;
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
        <form name="buscar_p" method="POST">
        <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
        <input type="submit" onclick="mostrarP()" id="buscarPaciente" value="buscar">
  </form>  <br><br>
  </div>
 
  <div class="resultados" >
  <table class="tConsultas">
			<tr>
        <caption>Consultas registradas</caption>
				<th>Descripcion</th>
				<th>Precio</th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT descripcion, precio FROM consultas";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
				<td><?php echo $ver['descripcion'] ?></td>
        <td><?php echo $ver['precio'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    <div class="medicos">
    <table class="tMedicos">
			<tr>
        <caption>Medicos registrados</caption>
				<th>Nombre</th>
				<th>Especialidad</th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT nombre, especialidad FROM medicos";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
				<td><?php echo $ver['nombre'] ?></td>
        <td><?php echo $ver['especialidad'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    </div>

<div class="tabla">
<?php
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
          <table class="tPacientes"> 
        <tr>
            <caption>Datos del Paciente</caption>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
        </tr>
        <tr>
          <td><?php echo $ver['nombre'] ?></td>
          <td><?php echo $ver['apellido'] ?></td>
          <td><?php echo $ver['cedula'] ?></td>
        </tr><?php } else{?>  
          <h1>Paciente no registrado</h1>
          <a id="volver" href="registrarPaciente.php">Registrar</a> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>

</div>
</div>

<script src="js/jquery.js"></script>


</body>
</html>
