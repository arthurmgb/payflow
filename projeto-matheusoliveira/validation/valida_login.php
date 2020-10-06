<?php
	session_start();	
	include_once("../connection/mysqli.php");	
	
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
			
		$sql = "SELECT * FROM cadastro WHERE email = '$email' && senha = '$senha' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$resultado = mysqli_fetch_assoc($result);
		
		if(empty($resultado)){
			$_SESSION['loginErro'] = "<div class='alert alert-danger'>Email ou senha inválido</div>";
			header("Location: ../login.php");
		}elseif(isset($resultado)) {
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['apelido'] = $resultado['apelido'];
			$_SESSION['telefone'] = $resultado['telefone'];
			$_SESSION['email'] = $resultado['email'];
			$_SESSION['senha'] = $resultado['senha'];
			header("Location: ../teste.php");
		}else{	
			$_SESSION['loginErro'] = "<div class='alert alert-danger'>Email ou senha inválido</div>";
			header("Location: ../teste.php");
		}
		
	}else{
		$_SESSION['loginErro'] = "<div class='alert alert-danger'>Email ou senha inválido</div>";
		header("Location: ../login.php");
	}

?>