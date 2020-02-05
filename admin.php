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
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
h2{
    color: #fff;
}
/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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
</style>
</head>
<body>

<h2>Administracion </h2>

<a href="main.php">
    <img src="images/logo.png" alt="Logo">
</a>
<button class="open-button" onclick="openUsuario()">Nuevo Usuario</button>

<div class="form-popup" id="usuario">
  <form action="/action_page.php" class="form-container">
    <h1>Usuario</h1>
    <input type="text" placeholder="Codigo Empleado" name="codigo" required>
    <input type="text" placeholder="Nombre de Usuario" name="nombre" required>
    <input type="text" placeholder="Cedula" name="cedula" required>
    <input type="radio" name="gender" value="Basico" checked> Basico 
    <input type="radio" name="gender" value="Admin"> Admin
    <input type="password" placeholder=" Password" name="pass" required>
    <button type="submit" class="btn" formaction="main.php">Guardar</button>
    <button type="button" class="btn cancel" onclick="closeUsuario()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openMedico()">Nuevo Medico</button>
<div class="form-popup" id="medico">
  <form action="/action_page.php" class="form-container">
    <h1>Medico</h1>
    <input type="text" placeholder="Codigo Empleado" name="codigo" required>
    <input type="text" placeholder="Especialidad" name="especialidad" required>
    <input type="text" placeholder="Cedula" name="cedula" required>
    <button type="submit" class="btn"formaction="main.php">Guardar</button>
    <button type="button" class="btn cancel" onclick="closeMedico()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openConsulta()">Nueva Consulta</button>
<div class="form-popup" id="cons">
  <form action="/action_page.php" class="form-container">
    <h1>Consulta</h1>
    <input type="text" placeholder="Codigo Consulta" name="codigo_c" required>
    <input type="text" placeholder="Codigo Empleado" name="codigo_e" required>
    <input type="text" placeholder="Precio" name="precio" required>
    <input type="text" placeholder="Descripcion" name="descripcion" required>
    <button type="submit" class="btn"formaction="main.php">Guardar</button>
    <button type="button" class="btn cancel" onclick="closeConsulta()">Cancelar</button>
  </form>
</div>
<br>

<button class="open-button" onclick="openAna()">Nuevo Analisis</button>
<div class="form-popup" id="ana">
  <form action="/action_page.php" class="form-container">
    <h1>Analisis</h1>
    <input type="text" placeholder="Codigo Analisis" name="codigo" required>
    <input type="text" placeholder="Nombre " name="nombre" required>
    <input type="text" placeholder="Precio" name="precio" required>
    <input type="text" placeholder="Valor Normal" name="valor" required>
    <button type="submit" class="btn"formaction="main.php">Guardar</button>
    <button type="button" class="btn cancel" onclick="closeAna()">Cancelar</button>
  </form>
</div>

<script>
function openUsuario() {
  document.getElementById("usuario").style.display = "block";
}
function closeUsuario() {
  document.getElementById("usuario").style.display = "none";
}

function openMedico() {
  document.getElementById("medico").style.display = "block";
}
function closeMedico() {
  document.getElementById("medico").style.display = "none";
}

function openConsulta() {
  document.getElementById("cons").style.display = "block";
}
function closeConsulta() {
  document.getElementById("cons").style.display = "none";
}

function openAna() {
  document.getElementById("ana").style.display = "block";
}
function closeAna() {
  document.getElementById("ana").style.display = "none";
}
</script>

</body>
</html>