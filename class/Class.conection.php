<?php

if($_SERVER['HTTP_HOST'] == 'localhost:8080'){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "u76543_w2o_db";
    $url  = "http://localhost:8080/w2o/";
    $dominio = 'localhost';
    
    $conn = mysqli_connect($host, $user, $pass, $db);
     
    if (!$conn) {
        header('Location: ../');
    }
}else{
    header('Location: ../');
}


