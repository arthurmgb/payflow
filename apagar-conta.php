<?php

session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
    $apagar_conta = "DELETE FROM usuarios WHERE id='$id'";
    $apagar_conta_query = mysqli_query($conn, $apagar_conta);

    if(mysqli_affected_rows($conn)){
        header("Location: login.php");
        session_destroy();
    }else{
        header("Location: usuario.php");
    }
}
else{
    header("Location: usuario.php");
}