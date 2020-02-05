<?php 
    $con = new mysqli("localhost","root","","sisfass_db");
    if($con->connect_error){
        echo $error -> $con->connect_error;
    }

    $con->set_charset('utf8'); 
?>