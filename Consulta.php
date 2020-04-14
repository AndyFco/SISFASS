
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
<title>Consulta</title>
<link rel="stylesheet" href="css/general.css" media="screen">
<script src="js/sweetalert2.min.js"></script>
<link rel="stylesheet" href="css/sweetalert2.min.css">
</head>     
<body>		
    <a href="main.php">
       <img src="images/logo.png" alt="Logo">
    </a>
    <div class="general">
    <div class="titulo">
  <h2 >Coloque los datos de la Consulta</h2>
  </div>
  <!-- <h1 class="sisfass">sisfass </h1> -->
  <div class="buscar" >
      <form class="busqueda" name="buscar_p" method="POST">
        <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
        <input  type="text" name="codigoC" id= "codigoC" placeholder="Codigo de la Consulta" required>
        <input  type="text" name="codigoM" id= "codigoM" placeholder="Codigo del Medico" required>
        <br>
        <input type="submit" id="buscarMedico" value="Enviar">
      </form>   
  </div>
  <!-- tablas de apoyo -->
  <div class="resultados-2" >
    <div class="consultas scroll">
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
    </div>
    <div class="medicos scroll">
    <table class="tMedicos ">
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
          <p>Datos Enviados:</p>
         <p> Paciente: <?php echo $ver['nombre'] ?> &nbsp;<?php echo $ver['apellido'] ?>  </p>
          <?php 
      } else{ $conf=false; ?>  
          <h1>Paciente no registrado</h1><br>
          <div class="botones">
            <button onclick="mostrarR()">Registrar</button>
          </div> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
      <!-- busqueda de consultas -->
      <?php
 if(isset($_POST['codigoC'])&&($conf==true)) 
{
  try{
    $codigo= $_POST['codigoC'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT descripcion, precio
    FROM consultas  WHERE codigoConsulta='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        ?>
        <p>Consulta: <?php echo $ver['descripcion'] ?> &nbsp; &nbsp;   Precio: <?php echo number_format($ver['precio']); ?></p>
        <?php 
      } else{?>  
          <h1>Consulta no Encontrada</h1> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
      <!-- busqueda de medicos -->
      <?php
 if(isset($_POST['codigoM'])&&($conf==true)) 
{
  try{
    $codigo= $_POST['codigoM'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT nombre, especialidad
    FROM medicos  WHERE codigoMedico='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        ?>
         <p>Medico: <?php echo $ver['nombre'] ?></p><br>
         <p>Repetir Proceso Para Otra Consulta.</p>
        <?php 
      } else{?>  
          <h1>Medico no Encontrado</h1> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>
</div>
<!-- formulario de registro pacientes nuevos -->
<div class="registro" id="registro">
<?php include("registrarPf.php")?>

</div>
<!-- enviar informacion a la base de datos -->
<div class="oculto">
<?php

 if(isset($_POST['codigoM']) && isset($_POST['cedula']) && isset($_POST['codigoM'])&&($conf==true)) 
{
$codigoM= $_POST['codigoM']; 
$codigoC= $_POST['codigoC']; 
$cedula=  $_POST['cedula']; 
$fecha=   date("Y-m-d");
$usr=$_SESSION['codigo'];

  try{
      $insertar= 'INSERT INTO consultaspaciente'
      ."( cedula, codigoMedico, codigoConsulta, fecha, usuario_id) 
      VALUES ("."'".$cedula."'," 
            ."'".$codigoM."'," 
            ."'".$codigoC. "',"  
            ."'".$fecha. "'," 
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
function hide(){
;
    $(".registro").hide();
}

</script>

</body>
</html>
