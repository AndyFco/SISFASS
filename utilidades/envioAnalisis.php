<?php
include 'conection.php';
$codigo =$_POST["codigoC"];
$precio =$_POST["precioC"];
$descripcion =$_POST["descripcionC"];



$insertar= 'INSERT INTO consultas'
."(codigoConsulta,  descripcion, precio ) 
VALUES ("."'".$codigo."',"
        ."'".$descripcion."'," 
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