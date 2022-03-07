<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_POST['btn_cadastrar_empresa'])){

        $sql_cadastra_empresa = "INSERT INTO `empresas`(`razao_social`, `cnpj`, `telefone`, `email`, `endereco`, `datecreate`) VALUES ('".$_POST['razao_social']."','".$_POST['cnpj']."','".$_POST['telefone']."','".$_POST['email']."','".$_POST['endereco']."','".date('Y-m-d H:i:s')."')";
        $sql_cadastra_query   = mysqli_query($conn, $sql_cadastra_empresa);

        if(mysqli_insert_id($conn) > 0){

            $msg = "Empresa cadastrada com sucesso!"; 
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