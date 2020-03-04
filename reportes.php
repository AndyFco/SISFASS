<!DOCTYPE html>
<html>
<head>
<title>Reportes</title>
<link rel="stylesheet" type="text/css" href="css/general.css" />

</head>
<body>

	<header>
    <h1>Sistema de Facturacion de Servicios de Salud </h1>
    <a href="main.php">
      <img src="images/logo.png" alt="Logo">
    </a>
  </header>
  <div class="general">
 <div class="titulo">
  <h2 >Reportes </h2>
  </div>
   <!-- <h1 class="sisfass r">sisfass </h1> -->
<div class="botones">
<button onclick="mostrarM()">Consultas Por Doctor</button>
<button onclick="mostrarT()">Consultas del Dia</button>
<button onclick="mostrarA()">Analisis del Dia</button>
<button onclick="mostrarAp()">Analisis Por Paciente</button>
</div>

<div class="tablas">
<div class="tMedicos " class="scroll-2">
<table >
			<tr>
        <caption>Consultas totales De cada Medico</caption>
				<th>Medico</th>
				<th>Total</th>
			</tr>
      <?php 
      try{
          $fecha=   date("Y-m-d");
          $total=0;
          require_once("utilidades/conection.php");
          $sql = "SELECT medico, total FROM totalmedicos
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
				<td><?php echo $ver['medico'] ?></td>
        <td><?php echo $ver['total'] ?></td>
        <?php $total+=$ver['total'];?>
      </tr><?php }?>
      <th>Total General</th>
				<th> <?php echo $total; ?></th>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    <div class="tConsultas " class="scroll-2">
    <table >
			<tr>
        <caption>Consultas totales del dia</caption>
				<th>Paciente</th>
        <th>Consulta</th>
        <th>Doctor</th>
			</tr>
      <?php 
      try{
          $fecha=   date("Y-m-d");
          $total=0;
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM consultasdetalle
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['pacienteNombre']." ".$ver['pacienteApellido']  ?></td>
        <td><?php echo $ver['consulta'] ?></td>
        <td><?php echo $ver['doctor'] ?></td>
        
      </tr><?php }?>
      
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    <div class="tAnalisis scroll-2">
    <table >
			<tr>
        <caption>Analisis De Hoy&nbsp;&nbsp;  <?php echo date("d-m-Y");?></caption>
				
        <th>Analisis</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Monto</th>
			</tr>
      <?php 
      try{
          $fecha=   date("Y-m-d");
          $total=0;
          require_once("utilidades/conection.php");
          $sql = "SELECT  * FROM montoana
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td><?php echo $ver['Analisis'] ?></td>
        <td><?php echo $ver['Precio'] ?></td>
        <td><?php echo $ver['Cantidad'] ?></td>
        <td><?php echo $ver['Monto'] ?></td>
        <?php $total+=$ver['Monto'];?>
      </tr><?php }?>
      <th>Total General</th>
				<th> <?php echo $total; ?></th>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
    <div class="tAnalisisp scroll-2">
    <table >
			<tr>
        <caption>Analisis De Hoy&nbsp;&nbsp;  <?php echo date("d-m-Y");?></caption>
				<th>Paciente</th>
        <th>Analisis</th>
			</tr>
      <?php 
      try{
          $fecha=   date("Y-m-d");
          $total=0;
          require_once("utilidades/conection.php");
          $sql = "SELECT  Paciente,Analisis FROM detalle_ana
          WHERE fecha='".$fecha."'";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
      <td><?php echo $ver['Paciente'] ?></td>
        <td><?php echo $ver['Analisis'] ?></td>
       
        
      </tr><?php }?>
    
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
</div>
</div>
<script src="js/jquery.js"></script>
<script>
$(".tAnalisis").hide();
$(".tConsultas").hide();
$(".tMedicos").hide();
$(".tAnalisisp").hide();

function mostrarM(){
    $(".tAnalisis").hide();
    $(".tConsultas").hide();
    $(".tAnalisisp").hide();
    $(".tMedicos").show();
}
function mostrarT(){
    $(".tAnalisis").hide();
    $(".tMedicos").hide();
    $(".tAnalisisp").hide();
    $(".tConsultas").show();
}
function mostrarA(){
    $(".tMedicos").hide();
    $(".tConsultas").hide();
    $(".tAnalisisp").hide();
    $(".tAnalisis").show();
}
function mostrarA(){
    $(".tMedicos").hide();
    $(".tConsultas").hide();
    $(".tAnalisisp").hide();
    $(".tAnalisis").show();
}
function mostrarAp(){
    $(".tMedicos").hide();
    $(".tConsultas").hide();
    $(".tAnalisis").hide();
    $(".tAnalisisp").show();
}
</script>
</body>

</html>