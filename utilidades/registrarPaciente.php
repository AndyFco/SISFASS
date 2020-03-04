
<?php
include 'conection.php';
$nombre =$_POST["nombre"];
$apellido =$_POST["apellido"];
$cedula =$_POST["cedula"];
$telefono =$_POST["telefono"];
$direccion =$_POST["direccion"];

$insertar= 'INSERT INTO pacientes'
."(nombre, apellido, cedula, telefono, direccion) 
VALUES ("."'".$nombre."'," 
         ."'".$apellido."'," 
         ."'".$cedula. "'," 
         ."'".$telefono. "'," 
         ."'".$direccion."'  "
         .	 ");";

try{
    require_once("conection.php");
    $resultado =$con->query($insertar);

    }catch(\Exception $e){echo $e->getMessage();}
mysqli_close($con);
?>
<script> 

window.location.replace("../consulta.php"); 

</script>