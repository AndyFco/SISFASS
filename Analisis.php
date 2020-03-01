<!DOCTYPE html>
<html>
<head>
<title>Envio de Analisis</title>
<link rel="stylesheet" href="css/general.css" media="screen">
<style>
  .btn span::before {
  
  content: "Agregar"
}
  
.agregado {
  
  background-color: DodgerBlue; 
  
}
.agregado span::before {
  
  content: "Agregado"
}
.barra{
 border:solid 2px gray;
  width:25%
}
</style>
</head>     
<body>
    <a href="main.php">
       <img src="images/logo.png" alt="Logo">
     </a>
 <div class="general">
 <div class="titulo">
  <h2 >Coloque los datos del Analisis</h2>
  </div>
 <h1 class="sisfass">sisfass </h1>
<div class="buscar">
  <form class="busqueda" name="buscar_p" method="POST">
    <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
    <input type="hidden" id="arreglo" name="arreglo" >
    <input type="hidden" id="detalles" name="detalles" >
    <input type="hidden" id="monto" name="monto" >
   <br>
    <input type="submit" >
</form>
</div>
<div class="enviado">
<table class="tAnalisis">
			<tr>
        <caption>Analisis registrados</caption>
				<th>Nombre</th>
        <th>Precio</th>
        <th></th>
			</tr>
      <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT * FROM analisis";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
			<tr>
        <td style="display:none;" id="seleccionado"><?php echo $ver['codigoAnalisis'] ?></td>
				<td id="detalle"><?php echo $ver['nombre'] ?></td>
        <td id="precio"><?php echo $ver['precio'] ?></td>
        <td><button id="btnAgregar"class="btn" ><span></span></button></td>
      </tr><?php }?>
      <tr>
				<th>Total</th>
        <th><span id="total"></span></th>
        <th></th>
			</tr>
    </table>
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
</div>
<div class="tabla">
<!-- busqueda de pacientes -->

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
        ?><P>&nbsp;&nbsp;&nbsp;&nbsp;Datos Enviados</P>
        <hr class="barra">
         <p> Paciente: <?php echo $ver['nombre'] ?> &nbsp;<?php echo $ver['apellido'] ?></p>
         <p> Detalles: &nbsp;<span > <?php echo $_POST["detalles"];?></span></p>
          <?php 
      } else{$conf=false;?>  
           
          <h1>Paciente no registrado</h1>
          <br>
          <a id="volver" href="registrarPaciente.php">Registrar</a> <?php } ?>
      </table>
      <?php   }catch(\Exception $e){echo $e->getMessage();}}?>

</div>
<!-- enviar informacion a la base de datos -->
<div class="oculto">
<?php
$id;
try{
  require_once("utilidades/conection.php");
  $sql="SELECT numeroSolicitud FROM  solicitudana 
  order by numeroSolicitud DESC LIMIT 1;";
  $resultado =$con->query($sql);
  while($ver=$resultado->fetch_assoc()){ 
     $id= $ver['numeroSolicitud'];}
}catch(\Exception $e){echo $e->getMessage();}
$id+=1;
 if( isset($_POST['cedula']) ) 
{
$texto= $_POST['arreglo']; 
$cedula=  $_POST['cedula']; 
$fecha=   date("Y-m-d");
$ana=explode(',', $texto);

  try{
      $insertar= 'INSERT INTO solicitudana'
      ."( numeroSolicitud,	cedula,	fecha) 
      VALUES ("."'".$id."'," 
            ."'".$cedula."'," 
            ."'".$fecha."'  "
            .	 ");";
           
        require_once("utilidades/conection.php");
        $resultado =$con->query($insertar);
        $l= count($ana);
       
      for ($i=0; $i<$l; $i++) { 
        $insertar_2= "CALL anadetalle("."'".$id."'," 
                     ."'".$ana[$i]."' " .");";
        require_once("utilidades/conection.php");
         $resultado =$con->query($insertar_2);
      }   
    }catch(\Exception $e){echo $e->getMessage();}}?>
    
</div>
</div>

</body>
<script src="js/jquery.js"></script>
<script>

var lista=[];
var total=0;
var detalle=[];
$(document).ready(function(){
$(".btn").click(function(){
var valores="";
// Encontrar el id del analisis
$(this).parents("tr").find("#seleccionado").each(function(){
  lista.push($(this).html());
});
$(this).parents("tr").find("#detalle").each(function(){
  detalle.push($(this).html());
});
// calculo total de precios a enviar
$(this).parents("tr").find("#precio").each(function(){
  total+=parseInt($(this).html());
});
var uniqs = lista.filter(function(item, index, array) {
  return array.indexOf(item) === index;
})

$("#total").text(total);
$("#arreglo").val(uniqs);
$("#detalles").val(detalle);
$("#monto").text(total);
$(this).addClass("agregado");

});
});
</script>

</html>
