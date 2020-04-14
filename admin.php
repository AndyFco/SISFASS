<?php 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
session_start();
$user = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null ;
$rol= $_SESSION['rol'];
if($user == ''){
	header('Location: http://localhost/SISFASS/index.php?error=2');
}
if($rol!="admin"){
  header('Location: http://localhost/SISFASS/main.php?error=3');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administracion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
  background-image: url('images/admin.jpg' );}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  display: block;
  position: float;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  left: 400px;
  top: 100px;
  
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: rgba(250, 248, 248,  0.3);
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
h1,h2{
    color: #fff;
}
/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
.resultados-2{
    width: 30%;
    float: right;
  
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
    background-color: gray;
    color: white;
    font-weight: bold;
  }
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid gray;
  }
.boton{
  float: left;
  top: 20%;
}
.logo{
  position: absolute;
  top: 400px;
  left:700px;
  
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

.container {

position: relative;
padding-left: 35px;
margin-bottom: 12px;
cursor: pointer;
font-size: 16px;
color: #fff;
text-shadow: 2px 2px #000;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

/* Hide the browser's default radio button */
.container input {
position: absolute;
opacity: 0;
cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
position: absolute;
top: 0;
left: 0;
height: 15px;
width: 15px;
background-color: #eee;
border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
background-color: #2196F3;
}

</style>
</head>
<body>
<div class="general">
<h2>Administracion </h2>

<a href="main.php">
    <img class="logo" src="images/logo.png" alt="Logo">
</a>
<div class="boton">
<button class="open-button" onclick="openUsuario() ">Nuevo Usuario</button>
<div class="form-popup" id="usuario" >
  <form action="utilidades/Registrar.php" class="form-container" method="post">
    <h1>Usuario</h1>
    <input type="text" placeholder="Codigo Empleado" name="codigo" id ="codigo" required>
    <input type="text" placeholder="Nombre de Usuario" name="user" id="user" required>
    <input type="text" placeholder="Cedula" name="cedula" id="cedula" required>
    <label class="container">basico
    <input type="radio" checked="checked" name="tipo"  value="basico">
    <span class="checkmark"></span>
    </label>
    <label class="container">Admin
    <input type="radio" checked="checked" name="tipo"  value="admin">
    <span class="checkmark"></span>
    </label>
    <input type="password" placeholder=" Password" name="pass" id ="pass" required>
    <button type="submit" class="btn" >Guardar</button>
    <button type="reset" class="btn cancel" onclick="closeUsuario()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openMedico()">Nuevo Medico</button>
<div class="form-popup" id="medico">
  <form action="utilidades/registrarMedico.php" class="form-container" method="post">
    <h1>Medico</h1>
    <input type="text" placeholder="Codigo Empleado" name="codigoD" id="codigoD" required>
    <input type="text" placeholder="Nombre" name="nombreD" id="nombreD" required>
    <input type="text" placeholder="Cedula" name="cedulaD" id="cedulaD" required>
    <input type="text" placeholder="Especialidad" name="especialidad" id="especialidad" required>
    <button type="submit" class="btn">Guardar</button>
    <button type="reset" class="btn cancel" onclick="closeMedico()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openConsulta()">Nueva Consulta</button>
<div class="form-popup" id="cons">
  <form action="utilidades/registrarConsultas.php" class="form-container" method="post">
    <h1>Consulta</h1>
    <input type="text" placeholder="Codigo Consulta" name="codigoC"      id="codigoC" required>
    <input type="text" placeholder="Precio"          name="precioC"      id="precioC" required>
    <input type="text" placeholder="Descripcion"     name="descripcionC" id="descripcionC" required>
    <button type="submit" class="btn">Guardar</button>
    <button type="reset" class="btn cancel" onclick="closeConsulta()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openAna()">Nuevo Analisis</button>
<div class="form-popup" id="ana">
  <form action="utilidades/registrarAnalisis.php" class="form-container" method="post">
    <h1>Analisis</h1>
    <input type="text" placeholder="Codigo Analisis" name="codigoA" id="codigoA"  required>
    <input type="text" placeholder="Nombre " name="nombreA" id="nombreA" required>
    <input type="text" placeholder="Precio" name="precioA" id="precioA" required>
    <button type="submit" class="btn">Guardar</button>
    <button type="reset" class="btn cancel" onclick="closeAna()">Cancelar</button>
  </form>
</div>
</div>
<div class="resultados-2" >
<div class="tConsultas scroll-2">
    <table >
			<tr>
        <caption>Analisis Por Usuario</caption>
				<th>Usuario</th>
        <th>Total</th>
			</tr>
      <?php 
      try{
          $total=0; 
          $fecha=   date("Y-m-d");
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM  usuario_analisis 
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['Usuario']  ?></td>
        <td><?php echo number_format($ver['Monto']) ?></td>
        <?php $total+=$ver['Monto'];?>
      </tr><?php }?>
      <th>Total General</th>
			<th> <?php echo number_format($total); ?></th>
      
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    <hr>
    <div class="tConsultas scroll-2">
    <table >
			<tr>
        <caption>Consultas Por Usuario</caption>
				<th>Usuario</th>
        <th>Total</th>
			</tr>
      <?php 
      try{
          $total=0; 
          $fecha=   date("Y-m-d");
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM  usuario_consulta 
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['Usuario']  ?></td>
        <td><?php echo number_format($ver['Monto']) ?></td>
        <?php 
        $total+=$ver['Monto'];?>
      </tr><?php }?>
      <th>Total General</th>
				<th> <?php echo number_format($total); ?></th>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    <hr>
    <div class="tConsultas scroll-2">
    <table >
			<tr>
        <caption>Servicios de Enfermeria </caption>
				<th>Usuario</th>
        <th>Monto</th>
			</tr>
      <?php 
      try{
          $fecha=   date("Y-m-d");
          $total=0;
          require_once("utilidades/conection.php");
          $sql = "SELECT  Monto, Usuario FROM usuario_enfermeria
           WHERE  fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
      <td><?php echo $ver['Usuario'] ?></td>
        <td><?php echo number_format($ver['Monto']); ?></td>
        <?php $total+=$ver['Monto'];?>
      </tr><?php }?>
      <th>Total General</th>
      <th> <?php echo number_format($total);; ?></th>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    </div>
</div>
<script>
function openUsuario() {
  document.getElementById("usuario").style.display = "block";
  document.getElementById("medico").style.display = "none";
  document.getElementById("cons").style.display = "none";
  document.getElementById("ana").style.display = "none";
}
function closeUsuario() {
  document.getElementById("usuario").style.display = "none";
}

function openMedico() {
  document.getElementById("medico").style.display = "block";
  document.getElementById("cons").style.display = "none";
  document.getElementById("ana").style.display = "none";
  document.getElementById("usuario").style.display = "none";
}
function closeMedico() {
  document.getElementById("medico").style.display = "none";
}

function openConsulta() {
  document.getElementById("usuario").style.display = "none";
  document.getElementById("medico").style.display = "none";
  document.getElementById("cons").style.display = "block";
  document.getElementById("ana").style.display = "none";
}
function closeConsulta() {
  document.getElementById("cons").style.display = "none";
}

function openAna() {
  document.getElementById("ana").style.display = "block";
  document.getElementById("usuario").style.display = "none";
  document.getElementById("medico").style.display = "none";
  document.getElementById("cons").style.display = "none";
}
function closeAna() {
  document.getElementById("ana").style.display = "none";
}
</script>

</body>
</html>
