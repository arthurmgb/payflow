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
  <title>PayFlow | Contratos</title>
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
            <h1 class="m-0 text-dark">Contratos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contratos</li>
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
        <div class="d-flex flex-row-reverse">
          <form class="form-inline" method="GET" action="contratos-search.php">
              <div class="form-group">
              <input type="number" name="pesquisar"  min="1" class="form-control form-payflow" placeholder="Pesquisar por ID..">
                  <button class="btn btn-edit" type="submit"><i class="fas fa-search"></i></button>
              </div>
              <a class="ml-2" href="add_contrato.php">
              <button type="button" class="btn btn-success"><i class="fas fa-plus"></i> Novo Contrato</button>
            </a>
          </form>
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
                <h3 class="card-title"><i class="fas fa-file-signature mr-2"></i>Lista de Contratos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered text-center">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Cliente</th>
                      <th>Criado</th>
                      <th>Vencimento</th>
                      <th>Valor</th>
                      <th>Meses</th>
                      <th>Serviço</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>                  
                  <?php
                  $valor_pesquisa = $_GET['pesquisar'];

                  $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                  $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                  $qtd_result = 10;
                  $start = ($qtd_result * $pagina) - $qtd_result;

                   $query_contratos = "SELECT * FROM contratos WHERE  id LIKE '%$valor_pesquisa%' LIMIT $start, $qtd_result";    
                   $exec_contratos = mysqli_query($conn, $query_contratos);
                   $reg_contratos = mysqli_num_rows($exec_contratos);
                   while($row_contrato = mysqli_fetch_assoc($exec_contratos)){

                    $c_id = $row_contrato['id'];
                    $c_created = $row_contrato['created'];
                    $c_vencimento = $row_contrato['vencimento'];
                    $c_valor = $row_contrato['valor'];
                    $c_meses = $row_contrato['meses'];
                    $c_obs = $row_contrato['observacoes'];
                    $c_ativo = $row_contrato['ativo'];
                    $format_created = date('d/m/Y', strtotime($c_created)); 
                    $format_vencimento = date('d/m/Y', strtotime($c_vencimento)); 
                    $key_cliente = $row_contrato['id_cliente'];
                    $key_servico = $row_contrato['id_servico'];
                    

                    //Chamada nome do Cliente
                    $foreign_cliente = "SELECT * FROM clientes WHERE id='$key_cliente'";
                    $exec_foreign_cliente = mysqli_query($conn, $foreign_cliente);
                    while($row_Fcliente =  mysqli_fetch_assoc($exec_foreign_cliente)){
                      $fNome = $row_Fcliente['nome'];
                    }
                    //Chamada nome do Serviço
                    $foreign_servico = "SELECT * FROM servicos WHERE id='$key_servico'";
                    $exec_foreign_servico = mysqli_query($conn, $foreign_servico);
                    while($row_Fservico =  mysqli_fetch_assoc($exec_foreign_servico)){
                      $fServico = $row_Fservico['servicos'];
                    }

                    //Chamada fim do contrato
                    $venc_query =  "SELECT * FROM mensalidades WHERE id_contrato='$c_id' ORDER BY vencimento DESC LIMIT 1";
                    $venc_exec = mysqli_query($conn, $venc_query);
                    $venc_final = mysqli_fetch_assoc($venc_exec);
                    $fim_contrato = $venc_final['vencimento'];
 
                    $fim_contrato_format = date('d/m/Y', strtotime($fim_contrato));
                    
                    if($c_ativo === '1'){

                      echo "
                      <tr>
                       <td>{$c_id}</td>
                       <td>{$fNome}</td>
                       <td style='color: green;'>{$format_created}</td>
                       <td style='color: red;'>{$fim_contrato_format}</td>
                       <td style='color: green; font-weight: 600;'>R$ {$c_valor}</td>
                       <td>{$c_meses}</td>
                       <td>{$fServico}</td>
                       <td style='color: green; font-weight: 600;'>Ativo</td>
                       <td>
                         <a href='view-contrato.php?id={$c_id}' class='btn btn-primary btn-xs mr-1' title='Vizualizar'><i class='fas fa-eye'></i></a>
                         <a href='' data-toggle='modal' data-target='#desativar{$c_id}' class='btn btn-secondary btn-xs mr-1' title='Desativar'><i class='fas fa-ban'></i></a>
                         <a href='' data-toggle='modal' data-target='#apagar{$c_id}' class='btn btn-danger btn-xs mr-1' title='Excluir'><i class='fas fa-trash'></i></a>
                       </td>
                     </tr>
                     <div class='modal fade' id='apagar{$c_id}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                          <div class='modal-content'>
                          <div class='modal-header cor-header'>
                              <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-trash-alt mr-2'></i>Apagar contrato</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <i class='fas fa-times-circle'></i>
                              </button>
                          </div>
                          <div class='modal-body'>
                              <p class='h5'>Deseja realmente apagar esse contrato?</p>
                          </div>
                          <div class='modal-footer cor-footer'>
                              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                              <a href='apagar-contrato.php?id={$c_id}' class='btn btn-danger'>Apagar</a>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class='modal fade' id='desativar{$c_id}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                          <div class='modal-content'>
                          <div class='modal-header bg-secondary'>
                              <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-ban mr-2'></i>Desativar contrato</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <i class='fas fa-times-circle'></i>
                              </button>
                          </div>
                          <div class='modal-body'>
                              <p class='h5'>Deseja realmente desativar esse contrato?</p>
                          </div>
                          <div class='modal-footer cor-footer'>
                              <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Cancelar</button>
                              <a href='desativar-contrato.php?id={$c_id}' class='btn btn-secondary'><i class='fas fa-ban mr-1'></i>Desativar</a>
                          </div>
                          </div>
                        </div>
                      </div>
                      ";

                    }else{
                      echo "
                      <tr>
                       <td>{$c_id}</td>
                       <td>{$fNome}</td>
                       <td style='color: green;'>{$format_created}</td>
                       <td style='color: red;'>{$fim_contrato_format}</td>
                       <td style='color: green; font-weight: 600;'>R$ {$c_valor}</td>
                       <td>{$c_meses}</td>
                       <td>{$fServico}</td>
                       <td style='color: red; font-weight: 600;'>Inativo</td>
                       <td>
                         <a href='view-contrato.php?id={$c_id}' class='btn btn-primary btn-xs mr-1' title='Vizualizar'><i class='fas fa-eye'></i></a>
                         <a href='' data-toggle='modal' data-target='#ativar{$c_id}' class='btn btn-success btn-xs mr-1' title='Ativar'><i class='fas fa-check'></i></a>
                         <a href='' data-toggle='modal' data-target='#apagar{$c_id}' class='btn btn-danger btn-xs mr-1' title='Excluir'><i class='fas fa-trash'></i></a>
                       </td>
                     </tr>
                     <div class='modal fade' id='apagar{$c_id}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                          <div class='modal-content'>
                          <div class='modal-header cor-header'>
                              <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-trash-alt mr-2'></i>Apagar contrato</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <i class='fas fa-times-circle'></i>
                              </button>
                          </div>
                          <div class='modal-body'>
                              <p class='h5'>Deseja realmente apagar esse contrato?</p>
                          </div>
                          <div class='modal-footer cor-footer'>
                              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                              <a href='apagar-contrato.php?id={$c_id}' class='btn btn-danger'>Apagar</a>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class='modal fade' id='ativar{$c_id}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                          <div class='modal-content'>
                          <div class='modal-header bg-success'>
                              <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-check mr-2'></i>Reativar contrato</h5>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <i class='fas fa-times-circle'></i>
                              </button>
                          </div>
                          <div class='modal-body'>
                              <p class='h5'>Deseja reativar esse contrato?</p>
                          </div>
                          <div class='modal-footer cor-footer'>
                              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                              <a href='ativar-contrato.php?id={$c_id}' class='btn btn-success'><i class='fas fa-check mr-1'></i>Ativar</a>
                          </div>
                          </div>
                        </div>
                      </div>
                      ";
                    }
                   }
                        $result_pg = "SELECT COUNT(id) AS num_result FROM contratos";
                        $resultado_pg = mysqli_query($conn, $result_pg);
                        $row_pg = mysqli_fetch_assoc($resultado_pg);
                        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result);
                        $max_links = 1;

                  ?> 
                  </tbody>
                </table>
                <?php 
                  if($reg_contratos === 0){
                    echo "<div class='alert alert-registro'>Nenhum registro encontrado.</div>";
                  }
                ?>
              </div>
              <?php    
                echo "<div class='card-footer clearfix'>
                <ul class='pagination pagination-sm m-0 float-right'>
                  <li class='page-item'><a class='page-link' href='contratos.php?pagina=1'>&laquo;</a></li>";

                  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        echo "<li class='page-item'><a class='page-link' href='contratos.php?pagina=$pag_ant'>$pag_ant</a></li>";
                    }
                }
                echo"<li class='page-item'><a style='background-color: #E9ECEF;' class='page-link'>$pagina</a></li>";

                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                    echo "<li class='page-item'><a class='page-link' href='contratos.php?pagina=$pag_dep'>$pag_dep</a></li>";
                }
                }
                echo"
                  <li class='page-item'><a class='page-link' href='contratos.php?pagina=$quantidade_pg'>&raquo;</a></li>
                </ul>
                </div>";
              ?>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
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
<script>
  setTimeout(function(){ 
  var msg = document.getElementById("cliente_cad");
  msg.parentNode.removeChild(msg);   
  }, 5000);
</script>
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
