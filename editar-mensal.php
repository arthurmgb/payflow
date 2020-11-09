<?php

include_once("conexao.php");
session_start();

$id =  filter_input(INPUT_POST, 'mensalidade', FILTER_SANITIZE_NUMBER_INT);
$cliente =  filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_NUMBER_INT);
$data = filter_input(INPUT_POST, 'newdate', FILTER_SANITIZE_STRING);

if(!empty($cliente)){
    $editar_query = "UPDATE mensalidades SET vencimento='$data' WHERE id='$id'";
    $exec_editar = mysqli_query($conn, $editar_query);
    
    if(mysqli_affected_rows($conn)){
        header("Location: listar_contratos.php?id=$cliente");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Data de vencimento alterada com sucesso.
        </div>";
    }
    else{
        header("Location: listar_contratos.php");
    }
}else{
    $editar_query = "UPDATE mensalidades SET vencimento='$data' WHERE id='$id'";
    $exec_editar = mysqli_query($conn, $editar_query);

    if(mysqli_affected_rows($conn)){
        header("Location: mensalidades.php");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Data de vencimento alterada com sucesso.
        </div>";
    }
    else{
        header("Location: mensalidades.php");
}
}

