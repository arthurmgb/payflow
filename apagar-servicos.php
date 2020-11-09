<?php

include_once("conexao.php");
session_start();

$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $delet_servicos = "DELETE FROM servicos WHERE id='$id'";
    $delet_servicos_query = mysqli_query($conn, $delet_servicos);

    if(mysqli_affected_rows($conn)){
        header("Location: servicos.php");
        $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
        Serviço apagado com sucesso.
        </div>";
    }else{
        header("Location: servicos.php");
    }
}else{
    header("Location: 404.php");
}
