<?php 

include_once("conexao.php");
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$cliente =  filter_input(INPUT_GET, 'cliente', FILTER_SANITIZE_NUMBER_INT);

$estornar_query = "UPDATE mensalidades SET status='pendente' WHERE id='$id'";
$exec_estornar = mysqli_query($conn, $estornar_query);

if(mysqli_affected_rows($conn)){
    header("Location: listar_contratos.php?id=$cliente");
    $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
    Pagamento estornado com sucesso.
    </div>";
}
else{
    header("Location: listar_contratos.php");
}