<?php
require_once __DIR__ . '/vendor/autoload.php';

$nombre='';
$consulta='';
$precio='';
$doctor='';
if(isset($_POST['cedula'])) 
{
    $cedula= $_POST['cedula'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT nombre, apellido, cedula
    FROM pacientes  WHERE cedula='".$cedula."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
    $nombre=$ver['nombre'].$ver['apellido'] ;} 
    // -----------------------------------------
    $codigo= $_POST['codigoC'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT descripcion, precio
    FROM consultas  WHERE codigoConsulta='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){    
        $consulta= $ver['descripcion']; 
        $precio= number_format($ver['precio']); 
      }
    // ----------------------------------------------    
    $codigo= $_POST['codigoM'];       
    require_once("utilidades/conection.php");
    $sql = "SELECT nombre, especialidad
    FROM medicos  WHERE codigoMedico='".$codigo."'";
    $resultado =$con->query($sql);
    if($ver=$resultado->fetch_assoc()){  
        $doctor=  $ver['nombre']; 
    }    

    $fecha= date("d-m-Y");
    $mpdf = new \Mpdf\Mpdf(['debug' => true]);
    $datos='';
    $datos.="<strong>------------------------------------------------</strong><br>";
    $datos.="<h1>SISFASS</h1>";
    $datos.="<h2>Detalles de la Consulta </h2>";
    $datos.="<strong>------------------------------------------------</strong><br><br>";
    $datos.="<strong>Fecha:</strong> ".$fecha.'<br>';
    $datos.="<strong>Paciente:</strong> ".$nombre.'<br>';
    $datos.="<strong>Consulta:</strong> ".$consulta.'<br>';
    $datos.="<strong>Precio:</strong> ".$precio.'<br>';
    $datos.="<strong>Doctor:</strong> ".$doctor.'<br>';
    $datos.="<strong>------------------------------------------------</strong><br><br>";
    $datos.="La salud es Primero. ";
    $mpdf->WriteHTML($datos);
    $mpdf->Output('consulta.pdf','D'); 
}