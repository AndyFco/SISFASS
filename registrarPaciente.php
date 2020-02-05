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
   <img src="images/logo.png" alt="Logo">
  </a>
    
  <div class="formulario" >
     <form action="main.php" method="POST">
        <h1>Nuevo Pacente</h1>
        <input type="text" placeholder="Nombre " name="nombre" required>
        <input type="text" placeholder="Apellido " name="apellido" required><br>
        <input type="textShort" placeholder="Cedula " name="cedula" required>
        <input type="textShort" placeholder="Telefono " name="telefono" required>
        <input type="text" placeholder="Direccion " name="direccion" required>
        <br>
        <button type="submit" class="savebtn" formaction="main.php"><b> Guardar</b></button>
        <button type="reset" class="savebtn cancelbtn" ><b>Cancelar</b></button>
     </form>
   </div>
        
    

</body>
</html>
