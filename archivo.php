<?php 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
session_start();
$user = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null ;

if($user == ''){
	header('Location: http://localhost/SISFASS/index.php?error=2');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Archivo</title>
<link rel="stylesheet" type="text/css" href="css/general.css" />
</head>     
<body>
    <a href="main.php">
      <img src="images/logo.png" alt="Logo">
    </a>

<div class="general">
<div class="titulo">
  <h2 >Banco de datos</h2>
  </div>
<h1 class="sisfass r">sisfass </h1>
 <div class="botones">
  <button class="btnmostrar" onclick="mostrarP()">Pacientes</button>
  <button class="btnmostrar" onclick="mostrarA()">Analisis</button>
  <button class="btnmostrar" onclick="mostrarM()">Medicos</button>
  <button class="btnmostrar" onclick="mostrarC()">Consultas</button>
 </div>
<div class="resultados">

		<table class="tPacientes scroll-2">
			<tr>
        <caption>Pacientes registrados</caption>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cedula</th>
				<th>Telefono</th>
				<th>Direccion</th>
			</tr>

      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT nombre, apellido, cedula, telefono, direccion 
                  FROM pacientes ORDER BY nombre";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>

			<tr>
				<td><?php echo $ver['nombre'] ?></td>
				<td><?php echo $ver['apellido'] ?></td>
				<td><?php echo $ver['cedula'] ?></td>
        <td><?php echo $ver['telefono'] ?></td>
        <td><?php echo $ver['direccion'] ?></td>
      </tr><?php }?>
    </table>    
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>

    <table class="tAnalisis scroll-2">
			<tr>
        <caption>Analisis registrados</caption>
         	 	 	
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Valor Normal</th>
				<th>Precio</th>
			</tr>

      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM analisis";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>

			<tr>
				<td><?php echo $ver['codigoAnalisis'] ?></td>
				<td><?php echo $ver['nombre'] ?></td>
        <td><?php echo $ver['valorNormal'] ?></td>
        <td><?php echo $ver['precio'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>

    <table class="tMedicos scroll-2">
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

    <table class="tConsultas scroll-2">
			<tr>
        <caption>Consultas registradas</caption>
				<th>Descripcion</th>
				<th>Precio</th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT descripcion, precio 
          FROM consultas ORDER BY descripcion";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
				<td><?php echo $ver['descripcion'] ?></td>
        <td><?php echo $ver['precio'] ?></td>
      </tr><?php }?>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>

</div>
</div>
<!-- Scripts hide/Show -->
<script src="js/jquery.js"></script>
<script>
$(".tPacientes").hide();
$(".tAnalisis").hide();
$(".tMedicos").hide();
$(".tConsultas").hide();

function mostrarP(){
    $(".tAnalisis").hide();
    $(".tMedicos").hide();
    $(".tConsultas").hide();
    $(".tPacientes").show();
}
function mostrarA(){
    $(".tPacientes").hide();
    $(".tMedicos").hide();
    $(".tConsultas").hide();
    $(".tAnalisis").show();
}
function mostrarM(){
    $(".tPacientes").hide();
    $(".tAnalisis").hide();
    $(".tConsultas").hide();
    $(".tMedicos").show();
}
function mostrarC(){
    $(".tPacientes").hide();
    $(".tAnalisis").hide();
    $(".tMedicos").hide();
    $(".tConsultas").show();

}

</script>

</body>
</html>
