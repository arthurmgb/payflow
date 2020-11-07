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
    $_SESSION['msgcad'] = "<div id='logout' class='alert alert-success' role='alert'>
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
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/login.png" alt="PayFlow">
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
                Eu concordo com os <a href="" data-toggle="modal" data-target="#termos">termos</a> 
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

<!-- Modal -->
<div class="modal fade" id="termos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header card-payflow">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-shield mr-2"></i>Política de Privacidade e Termos de Uso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i aria-hidden="true" class="fas fa-times-circle"></i>
        </button>
      </div>
      <div class="modal-body">
        <h2>Política de Privacidade</h2>                    <p>A sua privacidade é importante para nós. É política do PayFlow respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site <a href=www.payflow.com>PayFlow</a>, e outros sites que possuímos e operamos.</p>                    <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.                    </p>                    <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou                        modificação não autorizados.</p>                    <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p>                    <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas <b>políticas de privacidade</b>.                    </p>                    <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p>                    <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.</p>                    <h3>Mais informações</h3>                    <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site.</p>                    <p>Esta política é efetiva a partir de <strong>Novembro</strong>/<strong>2020</strong>.</p>
        <h2>1. Termos</h2>            <p>Ao acessar ao site <a href='www.payflow.com'>PayFlow</a>, concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum                desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.</p>            <h2>2. Uso de Licença</h2>            <p>É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site PayFlow , apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e,                sob esta licença, você não pode: </p>            <ol>            <li>modificar ou copiar os materiais;  </li>            <li>usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial);  </li>            <li>tentar descompilar ou fazer engenharia reversa de qualquer software contido no site PayFlow;  </li>            <li>remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; ou  </li>            <li>transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor.</li>            </ol>            <p>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser rescindida por PayFlow a qualquer momento. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais                baixados em sua posse, seja em formato eletrónico ou impresso.</p>            <h2>3. Isenção de responsabilidade</h2>            <ol>            <li>Os materiais no site da PayFlow são fornecidos 'como estão'. PayFlow não oferece garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização,            adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos. </li>            <li>Além disso, o PayFlow não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ​​ou à confiabilidade do uso dos            materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.</li>            </ol>            <h2>4. Limitações</h2>            <p>Em nenhum caso o PayFlow ou seus fornecedores serão responsáveis ​​por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em PayFlow,                mesmo que PayFlow ou um representante autorizado da PayFlow tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade                por danos conseqüentes ou incidentais, essas limitações podem não se aplicar a você.</p>            <h3>Precisão dos materiais</h3>            <p>Os materiais exibidos no site da PayFlow podem incluir erros técnicos, tipográficos ou fotográficos. PayFlow não garante que qualquer material em seu site seja preciso, completo ou atual. PayFlow pode fazer alterações nos materiais contidos em seu                site a qualquer momento, sem aviso prévio. No entanto, PayFlow não se compromete a atualizar os materiais.</p>            <h2>5. Links</h2>            <p>O PayFlow não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por PayFlow do site. O uso de qualquer site vinculado é por conta e risco do usuário.</p>            </p>            <h3>Modificações</h3>            <p>O PayFlow pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.</p>            <h3>Lei aplicável</h3>            <p>Estes termos e condições são regidos e interpretados de acordo com as leis do PayFlow e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.</p>
      </div>
      <div class="modal-footer" style="background-color: #F7F7F7;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>      
      </div>
    </div>
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
