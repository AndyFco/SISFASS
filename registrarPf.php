
<?php 
$err = isset($_GET['error']) ? $_GET['error'] : null ;
session_start();
$user = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : null ;

if($user == ''){
	header('Location: http://localhost/SISFASS/index.php?error=2');
}
?>
  
     <form action="utilidades/registrarPaciente.php" method="POST">
        <h1>Registrar Pacente</h1>
        <input type="text"      placeholder="Nombre"    name="nombre"    id="nombre" required>
        <input type="text"      placeholder="Apellido"  name="apellido"  id="apellido" required><br>
        <input type="number" placeholder="Cedula"    name="cedula"    id="cedula" required>
        <input type="number" placeholder="Telefono"  name="telefono"  id="telefono" required>
        <input type="text"      placeholder="Direccion" name="direccion" id="direccion" required>
        <br>
        <button type="submit" class="savebtn" ><b> Guardar</b></button>
        <button type="reset" class="savebtn cancelbtn"  ><b>Limpiar</b></button>
     </form>

