<?php
include 'conection.php';
$codigo =$_POST["codigo"];
$usuario =$_POST["user"];
$cedula =$_POST["cedula"];
$valor =$_POST["tipo"];
$pass =$_POST["pass"];
$tipo;
if($valor=="admin"){
$tipo="admin";
}else{$tipo="basico";}

$opciones =array( 'cost'=>12);
$hash_pass=password_hash($pass,PASSWORD_BCRYPT, $opciones);

$insertar= 'INSERT INTO usuario'
."(codigoEmpleado, nombre, cedula, tipo, pass) 
VALUES ("."'".$codigo."'," 
        ."'".$usuario."'," 
        ."'".$cedula. "'," 
        ."'".$tipo. "'," 
        ."'".$hash_pass."'  "
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