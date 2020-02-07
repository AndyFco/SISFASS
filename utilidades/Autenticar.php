<?php
include 'conection.php';
     
    $usr = $_POST['user'];
    $pass = $_POST['pass'];

     try{
        $stmt = $con->prepare("SELECT nombre, pass FROM usuario WHERE nombre = ?");
        $stmt->bind_param('s', $usr);
        $stmt->execute();
        $stmt->bind_result($nombre_usuario,  $pass_usuario);
        $stmt->fetch();
        if($nombre_usuario)
        {   // El usuario existe, verificar el password
            if(password_verify($pass,$pass_usuario ))
            { // Iniciar la sesion
                session_start();
                ?>
                <script> window.location.replace("../main.php"); 
                </script>
                <?php
            }else{echo "error password invalido";}
        }else  { echo "error usuario invalido";  }
        $stmt->close();
        $con->close();
        
    } catch(Exception $e) 
    {
        $respuesta = array( 'pass' => $e->getMessage());
    }