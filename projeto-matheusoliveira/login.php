<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login - </title>
	<meta name="UniTorrent é um site de torrent focado em download de filmes que possui uma enorme diversidade" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/carousel.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/v4-shims.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="fundo-login">

	<div class="card" id="tela-login">
		<div class="container">
			<div class="titulo-login">
				<h5>Login</h5>
			</div>
			<div class="card-body">
				<form method="post" action="validation/valida_login.php">
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Senha</label>
						<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Sua senha" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Entrar</button>
				</form>

				<?php
				if(isset($_SESSION['loginErro'])){
					echo $_SESSION['loginErro'];
					unset($_SESSION['loginErro']);
				}?>

				<?php
				if(isset($_SESSION['logindeslogado'])){
					echo $_SESSION['logindeslogado'];
					unset($_SESSION['logindeslogado']);
				}?>

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/46a40cdd8f.js" crossorigin="anonymous"></script>

</body>
</html>