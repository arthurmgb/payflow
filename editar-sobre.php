<?php

session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$formacaoUsuario = filter_input(INPUT_POST, 'formacaoUsuario', FILTER_SANITIZE_STRING);
$localUsuario = filter_input(INPUT_POST, 'localUsuario', FILTER_SANITIZE_STRING);
$habilidadesUsuario = filter_input(INPUT_POST, 'habilidadesUsuario', FILTER_SANITIZE_STRING);
$infoUsuario = filter_input(INPUT_POST, 'infoUsuario', FILTER_SANITIZE_STRING);

$update_sobre = "UPDATE usuarios SET formacao='$formacaoUsuario', localizacao='$localUsuario', habilidades='$habilidadesUsuario', info='$infoUsuario' WHERE id='$id'";
$executar_update = mysqli_query($conn, $update_sobre);

if(mysqli_affected_rows($conn)){
    header("Location: usuario.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
    Usuário editado com sucesso.
    </div>";
}else{
    header("Location: usuario.php");
}