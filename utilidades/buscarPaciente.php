<?php

  try{
    $cedula= $_POST['cedula'];       
    require_once("conection.php");
    $stmt = $con->prepare("SELECT nombre, apellido, cedula FROM pacientes WHERE cedula = ?");
        $stmt->bind_param('s', $cedula);
        $stmt->execute();
        $stmt->bind_result($nombre_p, $apellido_p,  $cedula_p);
        $stmt->fetch();
        if($cedula_p)
        {   // El paciente existe. 
           $resultado =array (
            "nombre"   =>  $nombre_p , 
            "apellido" => $apellido_p,
            "cedula"   =>  $cedula_p );
        }else{echo "No existen registros";}
        
        $stmt->close();
        $con->close();
        
    } catch(Exception $e) 
    {
        $respuesta = array( 'pass' => $e->getMessage());
    }
   echo json_encode($resultado);
