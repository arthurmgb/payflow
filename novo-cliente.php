<?php

session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$comercial = filter_input(INPUT_POST, 'comercial', FILTER_SANITIZE_STRING);
$pessoal = filter_input(INPUT_POST, 'pessoal', FILTER_SANITIZE_STRING);
$tipo = $_POST['tipo'];

if(isset($_POST['status'])){
    $status = $_POST['status'];
}
else{
    $status = 'Inativo';
}

$inserir_cliente = "INSERT INTO clientes (created, tipo_cliente, nome, nascimento, cpf, rg, cep, bairro, endereco, numero, cidade, estado, pais, telefone, celular, email, comercial, pessoal, modo) VALUES (NOW(), '$tipo','$nome','$nascimento','$cpf','$rg','$cep','$bairro','$endereco','$numero','$cidade','$estado','$pais','$telefone','$celular','$email','$comercial','$pessoal', '$status')";

$executar_cliente = mysqli_query($conn, $inserir_cliente);

if(mysqli_insert_id($conn)){
    header("Location: clientes.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
    Cliente cadastrado com sucesso.
    </div>";
}else{
    header("Location: clientes.php");
}