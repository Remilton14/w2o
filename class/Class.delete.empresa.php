<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_GET['empresa'])){

        $id = $_GET['empresa'];

        $sql_edita_empresa = "DELETE FROM `empresas` WHERE `id_empresa` = $id";
        $sql_edita_query   = mysqli_query($conn,$sql_edita_empresa);

        if(mysqli_affected_rows($conn) > 0){

            $msg = "Empresa deletada com sucesso!"; 
            $_SESSION['msg'] = $msg;
            header('Location: ../empresa.php');
        }else{
            header('Location: ../');    
        }

    }else{
        header('Location: ../');
    }
}else{
    header('Location: ../');
}