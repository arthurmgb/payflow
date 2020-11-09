<?php 

include_once("conexao.php");
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$cliente =  filter_input(INPUT_GET, 'cliente', FILTER_SANITIZE_NUMBER_INT);
$pago = date('Y/m/d');

if(!empty($cliente)){
    $pagar_query = "UPDATE mensalidades SET status='pago', pagamento='$pago' WHERE id='$id'";
    $exec_pagar = mysqli_query($conn, $pagar_query);
    
    if(mysqli_affected_rows($conn)){
        header("Location: listar_contratos.php?id=$cliente");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Mensalidade paga com sucesso.
        </div>";
    }
    else{
        header("Location: listar_contratos.php");
    }
}else{
    $pagar_query = "UPDATE mensalidades SET status='pago', pagamento='$pago' WHERE id='$id'";
    $exec_pagar = mysqli_query($conn, $pagar_query);
    
    if(mysqli_affected_rows($conn)){
        header("Location: mensalidades.php");
        $_SESSION['msg'] = "<div id='remove' class='alert alert-success' role='alert'>
        Mensalidade paga com sucesso.
        </div>";
    }
    else{
        header("Location: mensalidades.php");
    }
}
