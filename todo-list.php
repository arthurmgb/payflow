<?php 

include_once("conexao.php");
$tarefa = filter_input(INPUT_POST,'tarefa', FILTER_SANITIZE_STRING);

$insert_tarefa = "INSERT INTO tarefas (tarefa, created) VALUES ('$tarefa', NOW())";
$return_tarefa = mysqli_query($conn, $insert_tarefa);

if(mysqli_insert_id($conn)){
    header("Location: index.php#task-list");
}else{
    header("Location: index.php");
}

