<?php

include_once("conexao.php");
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$cliente =  filter_input(INPUT_GET, 'cliente', FILTER_SANITIZE_NUMBER_INT);


if(!empty($cliente)){
    $deletar_query = "UPDATE mensalidades SET status='deletado' WHERE id='$id'";
    $exec_deletar = mysqli_query($conn, $deletar_query);
    
    if(mysqli_affected_rows($conn)){
        header("Location: listar_contratos.php?id=$cliente");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Mensalidade excluída com sucesso.
        </div>";
    }
    else{
        header("Location: listar_contratos.php");
    }
}else{
    $deletar_query = "UPDATE mensalidades SET status='deletado' WHERE id='$id'";
    $exec_deletar = mysqli_query($conn, $deletar_query);
    
    if(mysqli_affected_rows($conn)){
        header("Location: mensalidades.php");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Mensalidade excluída com sucesso.
        </div>";
    }
    else{
        header("Location: mensalidades.php");
    }    
}
