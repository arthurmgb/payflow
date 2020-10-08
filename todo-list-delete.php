<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $apagar_tarefa = "DELETE FROM tarefas WHERE id='$id'";
    $delete_tarefa = mysqli_query($conn, $apagar_tarefa);
    if(mysqli_affected_rows($conn)){
        header("Location: index.php#task-list");
    }else{
        header("Location: 404.php");
    }
}else{
    header("Location: 404.php");
}
