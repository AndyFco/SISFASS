<!DOCTYPE html>
<html>
<head>
<title>Envio de Analisis</title>
<link rel="stylesheet" href="css/general.css" media="screen">

</head>     
<body>
    <a href="main.php">
       <img src="images/logo.png" alt="Logo">
     </a>
<h2>Coloque los datos del analisis</h2>
 <div class="general">

<div class="buscar">
 <form>

    <input id="paciente" type="text" name="paciente" placeholder="Paciente">
    <label class="lbtn" onclick="showCheckboxes()">Analisis</label>
   <br>
    <input type="submit" >
    <div id="checkboxes">

    <?php 
      try{
          require_once("utilidades/conection.php");
          $sql = "SELECT nombre FROM analisis";
          $resultado =$con->query($sql);
			  	while($ver=$resultado->fetch_assoc()){ 
      ?>
	     <label class="container"><?php echo $ver['nombre'] ?>
       <input type="checkbox">
       <span class="checkmark"></span>
       </label>
    <?php }?>
    
    <?php   }catch(\Exception $e){echo $e->getMessage();}?>
    </div>
</form>
</div>

<div class="enviado">
<h2>La vaina esa</h2>

</div>
</div>
</body>
<script>
    var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
</html>
