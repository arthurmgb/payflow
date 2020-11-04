<?php

session_start();
include_once("conexao.php");

$idUser = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$newUser = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$newPass =  filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

password_hash($newPass, PASSWORD_DEFAULT);
$newPass = password_hash($newPass, PASSWORD_DEFAULT);

$update_conta = "UPDATE usuarios SET usuario='$newUser', senha='$newPass' WHERE id='$idUser'";
$executar_conta = mysqli_query($conn, $update_conta);

if(mysqli_affected_rows($conn)){
    header("Location: usuario.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
    Informações da conta atualizadas com sucesso.
    </div>";
}else{
    header("Location: usuario.php");
}