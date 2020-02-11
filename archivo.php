<!DOCTYPE html>
<html>
<head>
<title>Archivo</title>
<style>
* {
  margin: 0;
  padding: 0;

}
.general{
  margin: auto;
  margin-top: 50px;
  width: 1200px;
  height: 1000px;
 
}
.botones{
  float: left;
width: 20%;

}
.resultados {
  width: 80%;

float: right;

}
body {
  font: 16px Arial;  
  background-image: url('images/black.jpg');
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

img{
  position: fixed;
  left: 100px;
  top:400px;
}
h1,h2,h3{
  color: #fff;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 100%;
  color: #ffffff;
}
th,caption{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #404040;
  color: white;
  font-weight: bold;
}
th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
.botones button{
  background-color: #808080; 
  color: white; 
  padding: 15px 15px; 
  cursor: pointer; 
  width: 80%; 
  display: block; 
  font-size: 15px;
  font-weight: bold;
  margin: .5em;
  
}
.botones button:hover {
  background-color: #999999;
}

</style>
</head>     
<body>
    <a href="main.php">
      <img src="images/logo.png" alt="Logo">
    </a>
<h1>Archivos </h1>
<div class="general">
 <div class="botones">
  <button class="btnmostrar" onclick="mostrarP()">Pacientes</button>
  <button class="btnmostrar" onclick="mostrarA()">Analisis</button>
  <button class="btnmostrar" onclick="mostrarM()">Medicos</button>
  <button class="btnmostrar" onclick="mostrarC()">Consultas</button>
 </div>
<div class="resultados">

		<table class="tPacientes">
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
                  FROM pacientes";
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

    <table class="tAnalisis">
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
<!-- Scripts hide/Show -->
<script src="js/jquery.js"></script>
<script>
$(".tPacientes").hide();
$(".tAnalisis").hide();
$(".tMedicos").hide();

function mostrarP(){
    $(".tAnalisis").hide();
    $(".tMedicos").hide();
    $(".tPacientes").show();
}
function mostrarA(){
    $(".tPacientes").hide();
    $(".tMedicos").hide();
    $(".tAnalisis").show();
}
function mostrarM(){
    $(".tPacientes").hide();
    $(".tAnalisis").hide();
    $(".tMedicos").show();
}

</script>

</body>
</html>
