<?php

session_start();
include_once("conexao.php");

$vencimento = filter_input(INPUT_POST, 'vencimento', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
$meses = filter_input(INPUT_POST, 'meses', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);

$inserir_contrato = "INSERT INTO contratos (created, vencimento, valor, meses, observacoes) VALUES (NOW(), '$vencimento', '$valor', '$meses', '$observacoes')";
$executar_contrato = mysqli_query($conn, $inserir_contrato);

if(mysqli_insert_id($conn)){
    header("Location: contratos.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
    Novo contrato cadastrado com sucesso.
    </div>";
}else{
    header("Location: contratos.php");
}