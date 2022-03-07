<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_POST['btn_editar_empresa'])){

        $sql_edita_empresa = "UPDATE `empresas` SET `razao_social`='".$_POST['razao_social_edit']."',`cnpj`='".$_POST['cnpj_edit']."',`telefone`='".$_POST['telefone_edit']."',`email`='".$_POST['email_edit']."',`endereco`='".$_POST['endereco_edit']."',`modified`='".date('Y-m-d H:i:s')."' WHERE `id_empresa` = ".$_POST['id'];
        $sql_edita_query   = mysqli_query($conn,$sql_edita_empresa);

        if(mysqli_affected_rows($conn) > 0){

            $msg = "Empresa editada com sucesso!"; 
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