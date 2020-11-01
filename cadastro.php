<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
  include_once'conexao.php';
  $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  $erro = false;
  $dados_st = array_map('strip_tags', $dados_rc);
  $dados = array_map('trim', $dados_st);
  if(in_array('',$dados)){
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>É necessário preencher todos os campos.</div>";
  }
  elseif((strlen($dados['senha'])) < 6){
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>A senha deve ter no mínimo 6 caracteres.</div>";
  }
  elseif(stristr($dados['senha'], "'")){
    $erro = true;
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>A senha possui caracter inválido.</div>";
  }
  else{
    $result_usuario = "SELECT id FROM usuarios WHERE usuario='".$dados['usuario']."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Este usuário já foi cadastrado.
    </div>";
    }
    $result_usuario = "SELECT id FROM usuarios WHERE email='".$dados['email']."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
      $erro = true;
      $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Este e-mail já foi cadastrado.
    </div>";
    }
  }

  if(!$erro){
    //var_dump($dados);
    password_hash($dados['senha'], PASSWORD_DEFAULT);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
    '".$dados['nome']."',
    '".$dados['email']."',
    '".$dados['usuario']."',
    '".$dados['senha']."'
    )";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    $ultimo_id = mysqli_insert_id($conn);

    //Pasta onde vai ser salvo
    $_UP['pasta'] = 'usuarios/'.$ultimo_id.'/';

    //Criar pasta de imovel
    mkdir($_UP['pasta'], 0777);

    if(mysqli_insert_id($conn)){
    $_SESSION['msgcad'] = "<div class='alert alert-success' role='alert'>
    Cadastro realizado com sucesso.
  </div>";
    header("Location: login.php");
    }
    else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Erro ao cadastrar o usuário.
  </div>";
    }
  }
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PayFlow | Cadastro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Favicons-->
  <link rel="apple-touch-icon" sizes="180x180" href="dist/favicon/">
  <link rel="icon" type="image/png" sizes="32x32" href="dist/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="dist/favicon/favicon-16x16.png">
  <link rel="manifest" href="dist/favicon/site.webmanifest">
  <link rel="mask-icon" href="dist/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/login.png" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Faça seu cadastro no PayFlow</p>
      <?php
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
          }
      ?>
      <form action="" method="POST">
      <div class="input-group mb-3">
          <input type="text" name="nome" class="form-control" placeholder="Nome completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="E-mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="usuario" class="form-control" placeholder="Usuário">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-circle"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
          <div class="input-group-text" title="Ver senha">
              <a type="button" id="senhaico" style="color: #777;" onclick="show()"><i id="iconpass" class="fas fa-eye"></i></a> 
            </div>
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" required>
              <label for="remember">
                Eu concordo com os <a href="termos.php">termos</a> 
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-primary btn-block">Cadastrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="login.php">Já sou cadastrado</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script>
  function show(){
    var tipo = document.getElementById("senha");
    var cor = document.getElementById("senhaico");
    var icon = document.getElementById("iconpass");
    if(tipo.type == "password"){
      tipo.type = "text";
      cor.style.color = "#007BFF";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }else{
      tipo.type = "password";
      cor.style.color = "#777";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
