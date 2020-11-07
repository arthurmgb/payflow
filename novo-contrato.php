<?php

session_start();
include_once("conexao.php");

$vencimento = filter_input(INPUT_POST, 'vencimento', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
$meses = filter_input(INPUT_POST, 'meses', FILTER_SANITIZE_NUMBER_INT);
$observacoes = filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING);
$cliente_Id = filter_input(INPUT_POST, 'cliente_id', FILTER_SANITIZE_NUMBER_INT);
$servico_Id = filter_input(INPUT_POST, 'servico_id', FILTER_SANITIZE_NUMBER_INT);

$inserir_contrato = "INSERT INTO contratos (created, vencimento, valor, meses, observacoes, id_servico, id_cliente) VALUES (NOW(), '$vencimento', '$valor', '$meses', '$observacoes', '$servico_Id', '$cliente_Id')";
$executar_contrato = mysqli_query($conn, $inserir_contrato);

$contrato_id = mysqli_insert_id($conn);

for($i = 0; $i < $meses; $i++){
    $inserir_mensalidades = "INSERT INTO mensalidades (id_cliente, id_servico, id_contrato, vencimento, pagamento, status, valor) VALUES ('$cliente_Id', '$servico_Id', '$contrato_id', '$vencimento', '0000-00-00', 'pendente', '$valor')";
    $exec_mensal = mysqli_query($conn, $inserir_mensalidades);
    $vencimento = date('Y-m-d', strtotime('+1 month', strtotime($vencimento)));
}

if(mysqli_insert_id($conn)){
    header("Location: contratos.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
    Novo contrato cadastrado com sucesso.
    </div>";
}else{
    header("Location: contratos.php");
}