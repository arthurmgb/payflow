<?php
include_once("conexao.php");
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){

    $delet_servicos= "DELETE FROM servicos WHERE id='$id'";
    $delet_servicos_query = mysqli_query($conn, $delet_servicos);

    if(mysqli_affected_rows($conn)){
        header("Location: servicos.php");
    }else{
        header("Location: 404.php");
    }
}else{
    header("Location: usuario.php");
}
