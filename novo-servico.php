<?php

	session_start();
	include_once("conexao.php");

	$servicos = filter_input(INPUT_POST,'servicos', FILTER_SANITIZE_STRING);

	if(isset($_POST['modo'])){
   	 	$status = $_POST['modo'];
	}
	else{
    	$status = 'Inativo';
	}
	
	$inserir_servico = "INSERT INTO serviços (servicos, modo ,created) VALUES ('$servicos', '$status', NOW())"; 
	$executar_servico = mysqli_query($conn, $inserir_servico);


	if(mysqli_insert_id($conn)){
    header("Location: servicos.php");
    $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>Novo serviço cadastrado com sucesso. </div>";
	}else{
   	 header("Location: servicos.php");
	}


?>