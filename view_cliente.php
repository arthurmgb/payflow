<?php
  include_once("conexao.php");
  session_start();
  if(!empty($_SESSION['id'])){
      
  }
  else{
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PayFlow | Clientes</title>
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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php 
      require_once("info-perfil.php");
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-cog color-fas"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="drop-name dropdown-item dropdown-header"><?= $user_name ?></span>
          <div class="dropdown-divider"></div> 
            <div class="user-panel">
              <!-- Painel -->
            <?php 
            if((isset($user_foto) AND !empty($user_foto))){
              echo"
              <img src='usuarios/$user_id/$user_foto' class='img-circle elevation-2 my-4 mx-auto d-block user-edit' alt='User Image'>
              ";
            }else{
              echo"
              <img src='dist/img/avatar5.png' class='img-circle elevation-2 my-4 mx-auto d-block user-edit' alt='User Image'>
              ";
            }
            ?>
            <!-- Fim Painel -->
            </div>
          <div class="dropdown-divider"></div>
          <a href="usuario.php" class="btn btn-info float-left my-2 mx-2" role="button"><i class="mg-button fas fa-user-edit"></i> Perfil</a>
          <a href="sair.php" class="btn btn-danger float-right my-2 mx-2" role="button">Sair <i class="mg-button fas fa-sign-out-alt"></i></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/favicon.png" alt="PayFlow" class="brand-margin brand-image rounded d-block">
      <span class="brand-text d-block fredoka">PayFlow</span>
    </a>

    <!-- Info Perfil -->

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php 
            if((isset($user_foto) AND !empty($user_foto))){
              echo"
              <img src='usuarios/$user_id/$user_foto' class='img-circle elevation-2' alt='User Image'>
              ";
            }else{
              echo"
              <img src='dist/img/avatar5.png' class='img-circle elevation-2' alt='User Image'>
              ";
            }
          ?>
          
        </div>
        <div class="info">
          <a href="usuario.php" class="d-block"><?= $user_name ?></a>
        </div>
      </div>

    <!-- Fim de Info Perfil -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="fas fa-chart-bar nav-icon"></i>
              <p>
                Painel Corporativo  
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contratos.php" class="nav-link">
              <i class="fas fa-file-signature nav-icon"></i>
              <p>
                Contratos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="clientes.php" class="nav-link active">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="mensalidades.php" class="nav-link">
              <i class="far fa-money-bill-alt nav-icon"></i>
              <p>
                Mensalidades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="servicos.php" class="nav-link">
              <i class="fas fa-tasks nav-icon"></i>
              <p>
                Serviços
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="saldo.php" class="nav-link">
              <i class="fas fa-cash-register nav-icon"></i>
              <p>
                Saldo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="relatorios.php" class="nav-link">
              <i class="fas fa-file-invoice-dollar nav-icon"></i>
              <p> 
                Relatórios
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php
      $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
      $viewCliente = "SELECT * FROM clientes WHERE id='$id'";
      $exec_view = mysqli_query($conn, $viewCliente);
      while($dados = mysqli_fetch_assoc($exec_view)){

          $idCliente = $dados['id'];
          $nomeCliente = $dados['nome'];
          $createdCliente = $dados['created'];
          $tipoCliente = $dados['tipo_cliente'];
          $nascCliente = $dados['nascimento'];
          $cpfCliente = $dados['cpf'];
          $rgCliente = $dados['rg'];
          $cepCliente = $dados['cep'];
          $bairroCliente = $dados['bairro'];
          $enderecoCliente = $dados['endereco'];
          $numCliente = $dados['numero'];
          $cidadeCliente = $dados['cidade'];
          $estadoCliente = $dados['estado'];
          $paisCliente = $dados['pais'];
          $telCliente = $dados['telefone'];
          $celCliente = $dados['celular'];
          $emailCliente = $dados['email'];
          $comercialCliente = $dados['comercial'];
          $pessoalCliente = $dados['pessoal'];
          $statusCliente = $dados['modo'];
          $formatCreated = date("d/m/Y",strtotime($createdCliente));
          $formatNasc = date("d/m/Y",strtotime($nascCliente));
      }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cliente: <?= $nomeCliente ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Clientes</li>
              <li class="breadcrumb-item active">Visualizar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-3">
        <div class="col-12">  
            <div class="d-flex">
              <a href="clientes.php">
              <button type="button" class="btn btn-primary"><i class="fas fa-arrow-left mr-1"></i> Voltar</button>
              </a> 
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php 
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
              }
            ?>
            <div class="card">
              <div class="card-header card-payflow">
                <h3 class="card-title"><i class="fas fa-user-tie mr-2"></i>Perfil do Cliente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex flex-row-reverse">
                    <?php
                      $editID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                      $editCliente = "SELECT * FROM clientes WHERE id='$editID'";
                      $query_Edit = mysqli_query($conn, $editCliente);
                      while($editInfo = mysqli_fetch_assoc($query_Edit)){
                        $ClienteID = $editInfo['id'];
                      }
                    ?>
                    <a href="listar_contratos.php" class="btn btn-success ml-1"><i class="fas fa-file-signature mr-1"></i>Listar Contratos</a>
                    <a href="edit_cliente.php?id=<?=$ClienteID?>" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Editar</a>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-12">
                    <?php 
                      if($statusCliente === 'Ativo'){

                        echo"
                        <table class='table table-striped'>
                        <tbody class='table-borda'>
                            <tr>
                            <th scope='row'>ID</th>
                            <td>{$idCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Nome</th>
                            <td>{$nomeCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Criado em</th>
                            <td>{$formatCreated}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Nascimento</th>
                            <td>{$formatNasc}</td>
                            </tr>
                            <tr>
                            <th scope='row'>CPF</th>
                            <td>{$cpfCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>RG</th>
                            <td>{$rgCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>CEP</th>
                            <td>{$cepCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Bairro</th>
                            <td>{$bairroCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Endereço</th>
                            <td>{$enderecoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Número</th>
                            <td>{$numCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Cidade</th>
                            <td>{$cidadeCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Estado</th>
                            <td>{$estadoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>País</th>
                            <td>{$paisCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Telefone</th>
                            <td>{$telCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Celular</th>
                            <td>{$celCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>E-mail</th>
                            <td>{$emailCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Referência Comercial</th>
                            <td>{$comercialCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Referência Pessoal</th>
                            <td>{$pessoalCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Tipo</th>
                            <td>{$tipoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Status</th>
                            <td style='color: green; font-weight: 600;'>{$statusCliente}</td>
                            </tr>
                        </tbody>
                    </table>
                        ";

                      }else{

                        echo"
                        <table class='table table-striped'>
                        <tbody class='table-borda'>
                            <tr>
                            <th scope='row'>ID</th>
                            <td>{$idCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Nome</th>
                            <td>{$nomeCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Criado em</th>
                            <td>{$formatCreated}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Nascimento</th>
                            <td>{$formatNasc}</td>
                            </tr>
                            <tr>
                            <th scope='row'>CPF</th>
                            <td>{$cpfCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>RG</th>
                            <td>{$rgCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>CEP</th>
                            <td>{$cepCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Bairro</th>
                            <td>{$bairroCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Endereço</th>
                            <td>{$enderecoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Número</th>
                            <td>{$numCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Cidade</th>
                            <td>{$cidadeCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Estado</th>
                            <td>{$estadoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>País</th>
                            <td>{$paisCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Telefone</th>
                            <td>{$telCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Celular</th>
                            <td>{$celCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>E-mail</th>
                            <td>{$emailCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Referência Comercial</th>
                            <td>{$comercialCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Referência Pessoal</th>
                            <td>{$pessoalCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Tipo</th>
                            <td>{$tipoCliente}</td>
                            </tr>
                            <tr>
                            <th scope='row'>Status</th>
                            <td style='color: red; font-weight: 600;'>{$statusCliente}</td>
                            </tr>
                        </tbody>
                    </table>
                        ";

                      }
                    ?>
                    </div>
                </div>
              </div>
        </div>
      </div>
      </div>
      </div>
    </section>
    </div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y')?> <a href="index.php">PayFlow</a>.</strong>
    Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>