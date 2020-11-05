<?php

include_once("conexao.php");

$clienteId = filter_input(INPUT_POST, 'clienteId', FILTER_SANITIZE_NUMBER_INT);

$query_selecao = "SELECT * FROM clientes WHERE id='$clienteId'";
$exec_selecao = mysqli_query($conn, $query_selecao);