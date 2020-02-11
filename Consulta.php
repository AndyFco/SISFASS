<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consulta</title>
<link rel="stylesheet" href="css/calendar.css" media="screen">

  <style type="text/css">
  
  .footer{margin-top:100px;text-align:center;
  color:#666;font:bold 14px Arial}
  .footer a{color:#999;text-decoration:none}
  #wrapper{padding: 50px 0 0 325px;}
  #calendar{margin:25px auto; width: 370px;}
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
  background-image: url('images/black.jpg');
  width:960px;margin:0 auto
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
h2{
    color: #fff;
}
img{
  position: fixed;
  left: 100px;
  top: 400px;
}
table {
  border-collapse: collapse;
  width: 100%;
  color: #ffffff;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

</style>
</head>     
<body>
    <a href="main.php">
       <img src="images/logo.png" alt="Logo">
    </a>
  <h2>Coloque los datos de la Consulta</h2>

  <form name="buscar_p" >
    <div  style="width:300px;">
        <input  type="text" name="cedula" id= "cedula" placeholder="Cedula Paciente" required>
     </div>
      <input type="submit"  id="buscarPaciente" value="buscar">
  </form>  <br><br>

  <form autocomplete="off" >
  <div class="autocomplete" style="width:300px;">
    <input id="consulta" type="text" name="analisis" placeholder="Consulta">
  </div>
  <div class="autocomplete" style="width:300px;">
    <input id="doctor" type="text" name="doctor" placeholder="Doctor">
  </div>

  <input type="submit" formaction="main.php" value="Imprimir">
</form> <br>
<div class="tabla">
  <table class="datos_paciente"> 
   <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Cedula</th>
   </tr>
   <tr>
     <td id="nombre">Nombre</td>
     <td id="apellido">Apellido</td>
     <td id="cedula">Cedula</td>
    </tr> 
 </table>

</div>
<div id="calendar"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery-ui-datepicker.min.js"></script>
<script src="js/autocomplete.js"></script>
<script>
	$('#calendar').datepicker({
		inline: true,
		firstDay: 1,
		showOtherMonths: true,
		dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
	});
</script>
<script src="js/buscar.js"></script>
</body>
</html>
