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
      $get_name = "SELECT nome FROM clientes WHERE id='$id'";
      $exec_name = mysqli_query($conn, $get_name);
      $cliente_name = mysqli_fetch_assoc($exec_name);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Contratos: <?= $cliente_name['nome'] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Clientes</li>
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
                <h3 class="card-title"><i class="fas fa-file-signature mr-2"></i>Listagem de Contratos</h3>
              </div>
              <div class="card-body">

                <?php 
                  $select_contratos = "SELECT * FROM contratos WHERE id_cliente='$id'";
                  $query_select = mysqli_query($conn, $select_contratos);
                  $reg_lista_contratos = mysqli_num_rows($query_select);
                ?>

                <?php 
                  while($contrato = mysqli_fetch_assoc($query_select)):
                  $id_contrato = $contrato['id'];  
                  $criacao = date('d/m/Y', strtotime($contrato['created']));
                  $key_servico = $contrato['id_servico'];
                  $foreign_servico = "SELECT servicos FROM servicos WHERE id='$key_servico'";
                  $exec_foreign_servico = mysqli_query($conn, $foreign_servico);
                  $servico_name = mysqli_fetch_assoc($exec_foreign_servico);
                ?>
                
                 <?php if($contrato['ativo'] == 1): ?>
                  <div class="accordion" id="acordeao">   
                    <div class='card'>
                      <div class='card-header bg-list'>
                        <h2 class='mb-0'>

                            <button class='btn btn-link text-left' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            <i class='fas fa-angle-down mr-3'></i><?=$servico_name['servicos']?>
                            </button>

                            <button class='btn btn-link float-right' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            <?=$criacao?>
                            </button>

                            <button class='btn btn-link font-weight-bold text-success float-right' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            Ativo
                            </button>                          
                        </h2>                
                      </div>
                    </div>
                      <div id="contrato<?= $key_servico ?>" class="collapse" data-parent="#acordeao">  
                            <table class='table table-bordered text-center'>
                              <thead>                  
                                <tr>
                                  <th>Vencimento</th>
                                  <th>Pagamento</th>
                                  <th>Status</th>
                                  <th>Valor</th>
                                  <th>Valor Pago</th>
                                  <th>Serviço</th>
                                  <th>Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                               $query_mensal = "SELECT * FROM mensalidades WHERE id_contrato='$id_contrato'";
                               $exec_mensal = mysqli_query($conn, $query_mensal);
                              ?>
                              <?php while($mensalidade = mysqli_fetch_assoc($exec_mensal)):

                                $id_mensalidade = $mensalidade['id'];
                                $vencimento = $mensalidade['vencimento'];
                                $pagamento = $mensalidade['pagamento'];
                                $status_pag = $mensalidade['status'];                               
                                $valor_pag = $mensalidade['valor'];
                                $chave_servico = $mensalidade['id_servico'];
                                $chave_cliente = $mensalidade['id_cliente'];
                                //Format datas
                                $vencimento_format = date('d/m/Y', strtotime($vencimento)); 
                                $pagamento_format = date('d/m/Y', strtotime($pagamento));
                                //Buscando nome do serviço
                                $query_servico = "SELECT * FROM servicos WHERE id='$chave_servico'";
                                $exec_servico = mysqli_query($conn, $query_servico);
                                $nome_servico = mysqli_fetch_assoc($exec_servico);
                                $servico = $nome_servico['servicos'];

                              ?>
                                <?php if($status_pag === 'pendente'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'></td>
                                  <td style='color: #F39A00; font-weight: 600;'>Pendente</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                    <a href='' data-toggle='modal' data-target='#pagar<?= $id_mensalidade ?>' class='btn btn-success mr-1 my-1' title='Pagar'><i class='fas fa-dollar-sign mr-1'></i>Pagar</a>
                                    <a href='' data-toggle='modal' data-target='#editar<?= $id_mensalidade ?>' class='btn btn-warning mr-1 my-1' title='Editar'><i class='fas fa-edit mr-1'></i>Editar</a>
                                    <a href='' data-toggle='modal' data-target='#anular<?= $id_mensalidade ?>' class='btn btn-secondary mr-1 my-1' title='Anular'><i class='fas fa-ban mr-1'></i>Anular</a>
                                    <a href='' data-toggle='modal' data-target='#apagar<?= $id_mensalidade ?>' class='btn btn-danger mr-1 my-1' title='Excluir'><i class='fas fa-trash mr-1'></i>Excluir</a>
                                  </td>
                                </tr>
                                <!-- Excluir -->
                                <div class='modal fade' id='apagar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header cor-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-trash-alt mr-2'></i>Excluir mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente excluir essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='excluir-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-danger'>Excluir</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Excluir -->
                                <!-- Anular -->
                                <div class='modal fade' id='anular<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-secondary'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-ban mr-2'></i>Anular mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente anular essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='anular-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-secondary'><i class='fas fa-ban mr-1'></i>Anular</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Anular -->
                                <!-- Pagar -->
                                <div class='modal fade' id='pagar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-success'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-dollar-sign mr-2'></i>Pagar mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Confirmar pagamento?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='pagar-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-success'>Pagar</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Pagar -->
                                <!-- Editar -->
                                <div class='modal fade' id='editar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-warning'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-edit mr-2'></i>Editar mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle text-dark'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Vencimento</p>
                                        <form action="editar-mensal.php" method="POST">
                                        <div class="row mt-3">
                                          <div class="col-12">
                                          <div class="form-group">
                                            <input type="hidden" value='<?= $chave_cliente ?>' name="cliente">
                                            <input type="hidden" value='<?= $id_mensalidade ?>' name="mensalidade">
                                            <input name='newdate' type="date" class="form-control" id="editar_data" required>
                                          </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <button type='submit' class='btn btn-success'>Salvar</button>
                                        </form>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Editar -->
                                <?php endif ?>

                                <?php if($status_pag === 'pago'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'><?= $pagamento_format ?></td>
                                  <td style='color: green; font-weight: 600;'>Pago</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                    <a href='' class='btn btn-secondary mr-1 my-1 disabled' title='Pago'><i class='fas fa-dollar-sign mr-1' aria-disabled="true"></i>Pago</a>
                                    <a href='' data-toggle='modal' data-target='#estornar<?= $id_mensalidade ?>' class='btn btn-primary mr-1 my-1' title='Estornar'><i class='fas fa-dollar-sign mr-1'></i>Estornar pagamento</a>
                                  </td>
                                </tr>
                                <!-- Estornar -->
                                <div class='modal fade' id='estornar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-primary'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-dollar-sign mr-2'></i>Estornar pagamento</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente estornar esse pagamento?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='estornar-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-primary'>Estornar</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Estornar -->
                                <?php endif ?>

                                <?php if($status_pag === 'anulada'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'></td>
                                  <td style='color: gray; font-weight: 600;'>Anulada</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                    <a href='' data-toggle='modal' data-target='#reabrir<?= $id_mensalidade ?>' class='btn btn-success mr-1 my-1' title='Reabrir'><i class="fas fa-undo mr-1"></i>Reabrir</a>
                                  </td>
                                </tr>
                                <!-- Reabrir -->
                                <div class='modal fade' id='reabrir<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-success'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class="fas fa-undo mr-2"></i>Reabrir mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente reabrir essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='reabrir-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-success'>Reabrir</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Reabrir -->
                                <?php endif ?>

                              <?php endwhile ?>
                              </tbody>
                            </table>    
                      </div>
                  </div>
                  <?php endif ?>

                 <?php if($contrato['ativo'] == 0): ?>
                  <div class="accordion" id="acordeao">   
                    <div class='card'>
                      <div class='card-header bg-list'>
                        <h2 class='mb-0'>

                            <button class='btn btn-link text-left' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            <i class='fas fa-angle-down mr-3'></i><?=$servico_name['servicos']?>
                            </button>

                            <button class='btn btn-link float-right' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            <?=$criacao?>
                            </button>

                            <button class='btn btn-link font-weight-bold text-danger float-right' type='button' data-toggle='collapse' data-target='#contrato<?= $key_servico ?>' aria-expanded='false' aria-controls='contrato<?= $key_servico ?>'>
                            Inativo
                            </button>                          
                        </h2>                
                      </div>
                    </div>
                      <div id="contrato<?= $key_servico ?>" class="collapse" data-parent="#acordeao">  
                            <table class='table table-bordered text-center'>
                              <thead>                  
                                <tr>
                                  <th>Vencimento</th>
                                  <th>Pagamento</th>
                                  <th>Status</th>
                                  <th>Valor</th>
                                  <th>Valor Pago</th>
                                  <th>Serviço</th>
                                  <th>Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                               $query_mensal = "SELECT * FROM mensalidades WHERE id_contrato='$id_contrato'";
                               $exec_mensal = mysqli_query($conn, $query_mensal);
                              ?>
                              <?php while($mensalidade = mysqli_fetch_assoc($exec_mensal)):
                                
                                $id_mensalidade = $mensalidade['id'];
                                $vencimento = $mensalidade['vencimento'];
                                $pagamento = $mensalidade['pagamento'];
                                $status_pag = $mensalidade['status'];                               
                                $valor_pag = $mensalidade['valor'];
                                $chave_servico = $mensalidade['id_servico'];
                                $chave_cliente = $mensalidade['id_cliente'];
                                //Format datas
                                $vencimento_format = date('d/m/Y', strtotime($vencimento)); 
                                $pagamento_format = date('d/m/Y', strtotime($pagamento));
                                //Buscando nome do serviço
                                $query_servico = "SELECT * FROM servicos WHERE id='$chave_servico'";
                                $exec_servico = mysqli_query($conn, $query_servico);
                                $nome_servico = mysqli_fetch_assoc($exec_servico);
                                $servico = $nome_servico['servicos']; 

                              ?>
                                <?php if($status_pag === 'pendente'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'></td>
                                  <td style='color: #F39A00; font-weight: 600;'>Pendente</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                    <a href='' data-toggle='modal' data-target='#pagar<?= $id_mensalidade ?>' class='btn btn-success mr-1 my-1' title='Pagar'><i class='fas fa-dollar-sign mr-1'></i>Pagar</a>
                                    <a href='' data-toggle='modal' data-target='#editar<?= $id_mensalidade ?>' class='btn btn-warning mr-1 my-1' title='Editar'><i class='fas fa-edit mr-1'></i>Editar</a>
                                    <a href='' data-toggle='modal' data-target='#anular<?= $id_mensalidade ?>' class='btn btn-secondary mr-1 my-1' title='Anular'><i class='fas fa-ban mr-1'></i>Anular</a>
                                    <a href='' data-toggle='modal' data-target='#apagar<?= $id_mensalidade ?>' class='btn btn-danger mr-1 my-1' title='Excluir'><i class='fas fa-trash mr-1'></i>Excluir</a>
                                  </td>
                                </tr>
                                <!-- Excluir -->
                                <div class='modal fade' id='apagar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header cor-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-trash-alt mr-2'></i>Excluir mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente excluir essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='excluir-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-danger'>Excluir</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Excluir -->
                                <!-- Anular -->
                                <div class='modal fade' id='anular<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-secondary'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-ban mr-2'></i>Anular mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente anular essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='anular-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-secondary'><i class='fas fa-ban mr-1'></i>Anular</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Anular -->
                                <!-- Pagar -->
                                <div class='modal fade' id='pagar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-success'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-dollar-sign mr-2'></i>Pagar mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Confirmar pagamento?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='pagar-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-success'>Pagar</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Pagar -->
                                <!-- Editar -->
                                <div class='modal fade' id='editar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-warning'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-edit mr-2'></i>Editar mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle text-dark'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Vencimento</p>
                                        <form action="editar-mensal.php" method="POST">
                                        <div class="row mt-3">
                                          <div class="col-12">
                                          <div class="form-group">
                                            <input type="hidden" value='<?= $chave_cliente ?>' name="cliente">
                                            <input type="hidden" value='<?= $id_mensalidade ?>' name="mensalidade">
                                            <input name='newdate' type="date" class="form-control" id="editar_data" required>
                                          </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <button type='submit' class='btn btn-success'>Salvar</button>
                                        </form>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Editar -->
                                <?php endif ?>

                                <?php if($status_pag === 'pago'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'><?= $pagamento_format ?></td>
                                  <td style='color: green; font-weight: 600;'>Pago</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                    <a href='' class='btn btn-secondary mr-1 my-1 disabled' title='Pago'><i class='fas fa-dollar-sign mr-1' aria-disabled="true"></i>Pago</a>
                                    <a href='' data-toggle='modal' data-target='#estornar<?= $id_mensalidade ?>' class='btn btn-primary mr-1 my-1' title='Estornar'><i class='fas fa-dollar-sign mr-1'></i>Estornar pagamento</a>
                                  </td>
                                </tr>
                                <!-- Estornar -->
                                <div class='modal fade' id='estornar<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-primary'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class='fas fa-dollar-sign mr-2'></i>Estornar pagamento</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente estornar esse pagamento?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='estornar-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-primary'>Estornar</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Estornar -->
                                <?php endif ?>

                                <?php if($status_pag === 'anulada'): ?> 
                                <tr>
                                  <td style='color: red;'><?= $vencimento_format ?></td>
                                  <td style='color: green;'></td>
                                  <td style='color: gray; font-weight: 600;'>Anulada</td>
                                  <td style='color: green; font-weight: 600;'>R$ <?= $valor_pag ?></td>
                                  <td style='color: #007BFF; font-weight: 600;'></td>
                                  <td><?= $servico ?></td>      
                                  <td>
                                  <a href='' data-toggle='modal' data-target='#reabrir<?= $id_mensalidade ?>' class='btn btn-success mr-1 my-1' title='Reabrir'><i class="fas fa-undo mr-1"></i>Reabrir</a>
                                  </td>
                                </tr>
                                <!-- Reabrir -->
                                <div class='modal fade' id='reabrir<?= $id_mensalidade ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                  <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                    <div class='modal-header bg-success'>
                                        <h5 class='modal-title' id='exampleModalLabel'><i class="fas fa-undo mr-2"></i>Reabrir mensalidade</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <i class='fas fa-times-circle'></i>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <p class='h5'>Deseja realmente reabrir essa mensalidade?</p>
                                    </div>
                                    <div class='modal-footer cor-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <a href='reabrir-mensal.php?id=<?= $id_mensalidade ?>&cliente=<?= $chave_cliente ?>' class='btn btn-success'>Reabrir</a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Reabrir -->
                                <?php endif ?>

                              <?php endwhile ?>
                              </tbody>
                            </table>    
                      </div>
                  </div>

                  <?php endif ?>
                  <?php endwhile ?>

                <?php
                if($reg_lista_contratos === 0){
                  echo "<div class='alert alert-registro'>Nenhum registro encontrado.</div>";
                }
                ?>

              </div>
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
  var msg = document.getElementById("remove");
  msg.parentNode.removeChild(msg);   
  }, 3000);
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