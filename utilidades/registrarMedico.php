<?php
include 'conection.php';
$codigo =$_POST["codigoD"];
$nombre =$_POST["nombreD"];
$especialidad =$_POST["especialidad"];
$cedula =$_POST["cedulaD"];


$insertar= 'INSERT INTO medicos'
."(codigoMedico, nombre, cedula, especialidad ) 
VALUES ("."'".$codigo."',"
        ."'".$nombre."'," 
        ."'".$cedula. "'," 
        ."'".$especialidad. "' " 
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