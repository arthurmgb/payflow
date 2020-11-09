<?php

include_once("conexao.php");
session_start();

$id_contrato = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_contrato)){

    $deletar_contrato = "DELETE FROM contratos WHERE id='$id_contrato'";
    $exec_delete = mysqli_query($conn, $deletar_contrato);

    if(mysqli_affected_rows($conn)){
        header("Location: contratos.php");
        $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
        Contrato apagado com sucesso.
        </div>";
    }else{
        header("Location: contratos.php");
    }

}else{
    header("Location: 404.php");
}
