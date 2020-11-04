<?php
include_once("conexao.php");
$id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
$servicos = filter_input(INPUT_POST,'servicos', FILTER_SANITIZE_STRING);

if(isset($_POST['status'])){
    $status = $POST['status'];
}else{
    $status = 'Inativo';
}

$update_servicos = "UPDATE  servicos SET modo='$status', servicos='$servicos'";

$update_servicos_query = mysqli_query($conn, $update_servicos);

if(mysqli_affected_rows($conn)){
    header("Location: servicos.php");
}else{
    header("Location: 404.php");
}