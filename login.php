<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PayFlow | Login</title>
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
    <img src="dist/img/login.png" alt="Payflow">
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Faça login para acessar o painel</p>
      <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset ($_SESSION['msg']);
        }
        if(isset($_SESSION['msgcad'])){
          echo $_SESSION['msgcad'];
          unset ($_SESSION['msgcad']);
        }
      ?>
      <form method="POST" action="valida.php">
        <div class="input-group mb-3">
          <input type="text" name="usuario" class="form-control" placeholder="Usuário">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-circle"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text" title="Ver senha">
              <a type="button" id="senhalog" style="color: #777;" onclick="show()"><i id="iconlog" class="fas fa-eye"></i></a>
            </div>
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="btnLogin" value="Acessar" class="btn btn-success btn-block">Acessar</button>
          </div>
        </div>
      </form>
      <div class="social-auth-links text-center mt-3">
        <p>Ainda não é cadastrado?</p>
        <a href="cadastro.php" class="btn btn-block btn-primary">
        Cadastre-se
        </a>
      </div>
    </div>
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script>
  function show(){
    var tipo = document.getElementById("senha");
    var cor = document.getElementById("senhalog");
    var icon = document.getElementById("iconlog");
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
<script>
  setTimeout(function(){ 
  var msg = document.getElementById("logout");
  msg.parentNode.removeChild(msg);   
  }, 3000);
</script>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
