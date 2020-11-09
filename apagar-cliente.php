<?php

session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $apagar_cliente = "DELETE FROM clientes WHERE id='$id'";
    $apagar_cliente_query = mysqli_query($conn, $apagar_cliente);

    if(mysqli_affected_rows($conn)){
        header("Location: clientes.php");
        $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
        Cliente apagado com sucesso.
        </div>";
    }else{
        header("Location: clientes.php");
    }
}
else{
    header("Location: 404.php");
}