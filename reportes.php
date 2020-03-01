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
  
  <h1>Reportes</h1>
   <div class="general">
   <h1 class="sisfass r">sisfass </h1>
<div class="botones">
<button onclick="mostrarM()">Consultas Por Doctor</button>
<button onclick="mostrarT()">Consultas del Dia</button>
<button>Analisis del Dia</button>
</div>

<div class="tablas">
<table class="tMedicos">
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

    <table class="tConsultas">
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
</div>
<script src="js/jquery.js"></script>
<script>
$(".tAnalisis").hide();
$(".tConsultas").hide();
$(".tMedicos").hide();

function mostrarM(){
    $(".tAnalisis").hide();
    $(".tConsultas").hide();
    $(".tMedicos").show();
}
function mostrarT(){
    $(".tAnalisis").hide();
    $(".tMedicos").hide();
    $(".tConsultas").show();
}
</script>
</body>

</html>