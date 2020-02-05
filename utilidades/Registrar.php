<?php
include 'conection.php';
$codigo =$_POST["codigo"];
$usuario =$_POST["user"];
$cedula =$_POST["cedula"];
$basico =$_POST["basico"];
//$admin =$_POST["admin"];
$pass =$_POST["pass"];

$insertar= 'INSERT INTO usuario'
."(codigoEmpleado, nombre, cedula, tipo, pass) 
VALUES ("."'".$codigo."'," 
        ."'".$usuario."'," 
        ."'".$cedula. "'," 
        ."'".$basico. "'," 
        ."'".$pass."'  "
        .	 ");";

try{
    require_once("conection.php");
    $resultado =$con->query($insertar);echo "exito";
  }catch(\Exception $e){echo $e->getMessage();}

mysqli_close($con);

