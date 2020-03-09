<!DOCTYPE html>
<html>
<head>
<title>Nuevo Paciente</title>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
	<header>
		<h1>Sistema de Facturacion de Servicios de Salud </h1>
  </header>
  <a href="main.php">
   <img src="images/logo.png" alt="Logo"></a>
<div class="general">
  <div class="formulario" >
     <form action="utilidades/registrarPaciente.php" method="POST">
        <h1>Nuevo Pacente</h1>
        <input type="text"      placeholder="Nombre"    name="nombre"    id="nombre" required>
        <input type="text"      placeholder="Apellido"  name="apellido"  id="apellido" required><br>
        <input type="number" placeholder="Cedula"    name="cedula"    id="cedula" required>
        <input type="number" placeholder="Telefono"  name="telefono"  id="telefono" required>
        <input type="text"      placeholder="Direccion" name="direccion" id="direccion" required>
        <br>
        <button type="submit" class="savebtn" ><b> Guardar</b></button>
        <button type="reset" class="savebtn cancelbtn" ><b>Cancelar</b></button>
     </form>
   </div>
   </div>
</body>
</html>

