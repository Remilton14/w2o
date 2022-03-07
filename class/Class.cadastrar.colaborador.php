<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_POST['btn_cadastrar_colaborador'])){

        $sql_cadastra_empresa = "INSERT INTO `colaboradores`(`nome_colaborador`, `telefone_colaborador`, `email_colaborador`, `empresa_id`, `datecreate`) VALUES ('".$_POST['nome']."','".$_POST['telefone']."','".$_POST['email']."','".$_POST['empresa']."','".date('Y-m-d H:i:s')."')";
        $sql_cadastra_query   = mysqli_query($conn, $sql_cadastra_empresa);

        if(mysqli_insert_id($conn) > 0){

            $msg = "Colaborador(a) cadastrado(a) com sucesso!"; 
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