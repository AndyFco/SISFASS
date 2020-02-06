<?php
include 'conection.php';
$codigo =$_POST["codigoA"];
$nombre =$_POST["nombreA"];
$valor =$_POST["valorN"];
$precio =$_POST["precioA"];


$insertar= 'INSERT INTO analisis'
."(codigoAnalisis, nombre, valorNormal, precio ) 
VALUES ("."'".$codigo."',"
        ."'".$nombre."'," 
        ."'".$valor. "'," 
        ."'".$precio. "' " 
        .	 ");";

try{
    require_once("conection.php");
    $resultado =$con->query($insertar);
    }catch(\Exception $e){echo $e->getMessage();}
mysqli_close($con);
?>
<script> 

window.location.replace("../admin.php"); 

</script>