<!DOCTYPE html>
<html>
<head>
<title>Ayuda</title>
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
<div class="botones">
<button onclick="mostrarC()">Total Consultas</button>
<button>Total Analisis</button>
</div>

<div class="tablas">
<table class="tConsultas">
			<tr>
        <caption>Consultas totales del dia</caption>
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
</div>
<script src="js/jquery.js"></script>
<script>
$(".tAnalisis").hide();
$(".tConsultas").hide();

function mostrarC(){
    $(".tAnalisis").hide();
    $(".tConsultas").show();

}
</script>
</body>

</html>