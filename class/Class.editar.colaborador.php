<?php
session_start();
include_once 'Class.conection.php';

if($dominio_pg = $_SERVER['SERVER_NAME']){
    if(isset($_POST['btn_editar_colaborador'])){

        $sql_edita_colaborador = "UPDATE `colaboradores` SET `nome_colaborador`='".$_POST['nome_edit']."',`telefone_colaborador`='".$_POST['telefone_edit']."',`email_colaborador`='".$_POST['email_edit']."',`empresa_id`='".$_POST['empresa_edit']."',`datemodified`='".date('Y-m-d H:i:s')."' WHERE `id_colaborador` = ".$_POST['id'];
        $sql_edita_query   = mysqli_query($conn,$sql_edita_colaborador);

        if(mysqli_affected_rows($conn) > 0){

            $msg = "Colaborador(a) editado(a) com sucesso!"; 
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