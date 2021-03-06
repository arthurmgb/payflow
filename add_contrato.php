<?php 
  include_once("conexao.php");
  include_once("selecionar-cliente.php");
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
  <title>PayFlow | Adicionar Contrato</title>
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
            <a href="contratos.php" class="nav-link active">
              <i class="fas fa-file-signature nav-icon"></i>
              <p>
                Contratos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="clientes.php" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adicionar Contrato</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contratos</li>
              <li class="breadcrumb-item active">Adicionar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
      <!-- Main content -->
      <section class="content">
    <div class="container-fluid">
    <div class="card border-top">
      <form method="POST" action="novo-contrato.php" class="sec-pad">
      <div class="form-row">
          <div class="form-group col-md-12">
        <button data-toggle="modal" data-target="#selecionar_cliente" type="button" class="btn btn-primary btn-block"><i class="fas fa-user-plus mr-1"></i> Selecionar Cliente</button>
        </div>
      </div>
      <?php
        while($row_cliente = mysqli_fetch_assoc($exec_selecao)){
          echo"
          <input type='hidden' name='cliente_id' value='{$row_cliente['id']}'>
          <div class='card selec-cliente' style='width: 18rem;'>
            <div class='card-body text-center'>
              <a title='Remover cliente' href='add_contrato.php'><i class='fas fa-trash trash-color trash-position'></i></a>
              <h5 class='card-text'>{$row_cliente['nome']}</h5>
              <h6 class='card-text'>{$row_cliente['email']}</h6>
            </div>
          </div>
          <h1></h1>
          <h1></h1>
          ";
          }
      ?>
      <div class="form-row">
        <div class="form-group col-md-12 mt-2">
          <label for="nome" class="font-weight-bold ml-2">Primeiro vencimento</label>
          <input name="vencimento" type="date" class="form-control">
        </div>
        <div class="form-group col-md-12 mt-2">
          <label for="nascimento" class="font-weight-bold ml-2">Valor</label>
          <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">R$</span>
          </div>
          <input name="valor" type="text" class="form-control">   
          </div>  
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-8">
    					<label class="font-weight-bold ml-2">Serviços</label>
	    					<select name="servico_id" class="form-control">
                    <?php 
                    $query_servicos = "SELECT * FROM servicos";
                    $exec_servicos = mysqli_query($conn, $query_servicos);
                    while($row_servico = mysqli_fetch_assoc($exec_servicos)){
          
                      $idServico = $row_servico['id'];
                      $nomeServico = $row_servico['servicos'];
                      $modoServico = $row_servico['modo'];

                      if($modoServico === 'Ativo'){

                        echo"
                        <option value='$idServico'>$nomeServico</option> 
                      ";

                      }
                      
                    }
                    ?>
	    					</select>
            </div>
            <div class="form-group col-md-4">
            <label class="font-weight-bold ml-2">Criar novo serviço</label>
        <button data-toggle="modal" data-target="#newservico" type="button" class="btn btn-success btn-block"><i class="fas fa-plus mr-1"></i> Novo Serviço</button>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="meses" class="font-weight-bold ml-2">Meses</label>
          <input name="meses" value="12" type="number" class="form-control">
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-12">
    <label class="font-weight-bold ml-2" for="exampleFormControlTextarea1">Observações</label>
    <textarea name="observacoes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      </div>
      <div class="d-flex justify-content-end">
      <button class="btn btn-success save-btn" value="cad-contrato" type="submit">Salvar</button>
      </div>
      </div>
      </div>
      </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
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
<!-- Button trigger modal -->

<!-- Modal Cliente-->
<div class="modal fade" id="selecionar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action='' method='POST'>
      <div class="modal-header card-payflow">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-users mr-2"></i>Selecionar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i aria-hidden="true" class="fas fa-times-circle"></i>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-12">
      <div class="d-flex flex-row-reverse">
      <a href="add_cliente.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Novo Cliente</a>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-12">
      <table class="table table-bordered text-center">
      <thead>                  
            <tr>
              <th><i class="fas fa-user-plus"></i></th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Cidade</th>
              <th>Bairro</th>
            </tr>
         </thead>
         <tbody>
         
        <?php 
          $query_clientes = "SELECT * FROM clientes WHERE modo='Ativo'";
          $exec_query = mysqli_query($conn, $query_clientes);
          while($row_cliente = mysqli_fetch_assoc($exec_query)){

            $idCliente = $row_cliente['id'];
            $nomeCliente = $row_cliente['nome'];
            $emailCliente = $row_cliente['email'];
            $cidadeCliente = $row_cliente['cidade'];
            $bairroCliente = $row_cliente['bairro'];

            echo"
              <tr>
                <td><div class='form-group form-check'>
                <input type='radio' name='clienteId' value=".$idCliente." class='form-check-input check-cliente' id='exampleCheck1' required>
              </div></td>
                <td>{$nomeCliente}</td>
                <td>{$emailCliente}</td>
                <td>{$cidadeCliente}</td>
                <td>{$bairroCliente}</td>
              </tr>
              ";
          }
        ?>
        </tbody>
        </table>
        </div>
      </div>
      </div>
      <div style="background-color: #f7f7f7" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-plus mr-1"></i>Adicionar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Serviço -->
<div class="modal fade" id="newservico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header card-payflow">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-tasks mr-2"></i>Adicionar Serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i aria-hidden="true" class="fas fa-times-circle"></i>
        </button>
      </div>
      <div class="modal-body">
      <form action="novo-servico-contrato.php" method="POST">
      <label for="newservico" class="font-weight-bold ml-2">Nome do Serviço</label>
      <input name="newservico" class="form-control" type="text" required>
      </div>
      <div style="background-color: #f7f7f7" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-plus mr-1"></i>Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- jQuery mask -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
