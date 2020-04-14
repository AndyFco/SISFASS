
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
<link rel="stylesheet" href="css/general.css" media="screen">
<script src="js/sweetalert2.min.js"></script>
<link rel="stylesheet" href="css/sweetalert2.min.css">
<title>Servicio de Enfermeria</title>
</head>     
<body>
    <a href="main.php">
        <img src="images/logo.png" alt="Logo">
    </a>
   <div class="general">
<h1>Servicios de Enfermeria</h1> <br>
<h2>Coloque los datos</h2>

<div class="buscar" >
      <form class="busqueda" name="buscar_p" method="POST">
        <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
        <textarea id="textarea" name="textarea" rows="5" cols="32" placeholder="Detalles del Servicio" required></textarea>
        <br> <br>
        <input  type="text" name="costo" id= "costo" placeholder="Costo" required>
        <input type="submit" id="Servicio" value="Enviar">
      </form>   
  </div>

<div class="mensaje">
<?php
$nombrep=""; 
$conf=true;
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
          <p>Datos Enviados:</p><br><br>
         <p> Paciente: <?php echo $ver['nombre'] ?> &nbsp;<?php echo $ver['apellido'] ?>  </p>
         <p> Descripcion: <?php echo $_POST['textarea'] ?> </p>
         <p> Costo: <?php echo number_format($_POST['costo'],2); ?> </p>
          <?php 
      } else{ $conf=false; ?>  
          <h1>Paciente no registrado</h1><br>
          <div class="botones">
            <button onclick="mostrarR()">Registrar</button>
          </div> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
      <!-- busqueda de consultas -->

 
</div>
<!-- formulario de registro pacientes nuevos -->
<div class="registro enf" id="registro">
<?php include("registrarPf.php")?>

</div>
<!-- enviar informacion a la base de datos -->
<div class="oculto">
<?php

 if (isset($_POST['cedula'])  )
{

$cedula=  $_POST['cedula']; 
$descripcion=  $_POST['textarea']; 
$precio=  $_POST['costo']; 
$fecha=   date("Y-m-d");
$usr=$_SESSION['codigo'];

  try{
   
      $insertar= 'INSERT INTO enfermeria'
      ."( descripcion, precio,fecha, pacienteId, usuarioid) 
      VALUES ("."'".$descripcion."'," 
            ."'".$precio."'," 
            ."'".$fecha. "',"  
            ."'".$cedula. "'," 
            ."'".$usr."'  "
            .	 ");";
            require_once("utilidades/conection.php");
            $resultado =$con->query($insertar);
            ?>
            <script>
              Swal.fire({
              icon: 'success',
              title: 'Se envio Correctamente',
              showConfirmButton: false,
              timer: 1500})
            </script>
            <?php
    }catch(\Exception $e){echo $e->getMessage();}}?>
</div>

</div>

<script src="js/jquery.js"></script>

<script>
$(".registro").hide();

function mostrarR(){
;
    $(".registro").show();
}

</script>

</body>
</html>
