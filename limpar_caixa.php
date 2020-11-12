<?php

include("conexao.php");

$limparCaixa = "UPDATE mensalidades SET caixa='nao' WHERE caixa='sim'";
$exec_Caixa = mysqli_query($conn, $limparCaixa);

if(mysqli_affected_rows($conn)){
    header("Location: saldo.php");
}else{
    header("Location: saldo.php");
}