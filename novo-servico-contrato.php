<?php

session_start();
include_once("conexao.php");

$newservico = filter_input(INPUT_POST,'newservico', FILTER_SANITIZE_STRING);
$status = 'Ativo';


$inserir_servico = "INSERT INTO servicos (servicos, modo ,created) VALUES ('$newservico', '$status', NOW())"; 
$executar_servico = mysqli_query($conn, $inserir_servico);

if(mysqli_insert_id($conn)){
    header("Location: add_contrato.php");
}else{
    header("Location: add_contrato.php");
}

?>