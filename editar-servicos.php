<?php
session_start();
include_once("conexao.php");

$servicos = filter_input(INPUT_POST,'servicos', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['modo'])){
    $status = $_POST['modo'];
}
else{
$status = 'Inativo';
}

$udpate_servicos = "UPDATE servicos SET servicos='$servicos', modo='$status'  WHERE id='$id'";
$udpate_servicos_query = mysqli_query($conn, $udpate_servicos);

if(mysqli_affected_rows($conn)){
    header("Location: servicos.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>Serviço editado com sucesso.</div>";
}else{
    header("Location: servicos.php");
}
