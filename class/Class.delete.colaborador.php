<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_GET['colaborador'])){

        $id = $_GET['colaborador'];

        $sql_edita_empresa = "DELETE FROM `colaboradores` WHERE `id_colaborador` =  $id";
        $sql_edita_query   = mysqli_query($conn,$sql_edita_empresa);

        if(mysqli_affected_rows($conn) > 0){

            $msg = "Colaborador deletado com sucesso!"; 
            $_SESSION['msg'] = $msg;
            header('Location: ../colaborador.php');
        }else{
            header('Location: ../');    
        }

    }else{
        header('Location: ../');
    }
}else{
    header('Location: ../');
}