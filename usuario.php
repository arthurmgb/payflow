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
  <title>PayFlow | Perfil</title>
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
            <h1 class="m-0 text-dark">Perfil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perfil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
            <div class="col-12">
            <?php 
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
              }
            ?>
            </div>
          </div>
        <div class="row">
        <div class="col-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-payflow">
                <h3 class="widget-user-username"><?= $user_name ?></h3>
                <h5 class="widget-user-desc"><?= $user_empresa ?></h5>
              </div>
              <div class="widget-user-image">
                <?php 
                if((isset($user_foto) AND !empty($user_foto))){
                  echo"
                  <img class='img-circle elevation-2' src='usuarios/{$user_id}/{$user_foto}'>
                  ";
                }else{
                  echo"
                  <img class='img-circle elevation-2' src='dist/img/avatar5.png'>";                 
                }
                ?>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">0</h5>
                      <span class="description-text">SALDO</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <?php 
                    $result_clientes = "SELECT * FROM clientes";
                    $clientes_query = mysqli_query($conn, $result_clientes);
                    $reg_clientes = mysqli_num_rows($clientes_query);
                  ?>
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo "{$reg_clientes}"?></h5>
                      <span class="description-text">CLIENTES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">0</h5>
                      <span class="description-text">VENDAS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-3">
          <div class="card">
              <div class="card-header card-payflow">
                <h3 class="card-title my-2"><i class="far fa-address-card mr-2"></i>Sobre mim</h3>
                <div class="d-flex flex-row-reverse bd-highlight">
                <a class="sobre-btn" data-toggle="modal" data-target="#sobremim"><i class="fas fa-edit"></i></a>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Formação Acadêmica</strong>
                <p class="text-muted mt-2"><?= $user_formacao ?></p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                <p class="text-muted mt-2"><?= $user_local ?></p>
                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Habilidades</strong>
                <p class="text-muted mt-2"><?= $user_habilidades ?></p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Informações pessoais</strong>
                <p class="text-muted mt-2"><?= $user_info ?></p>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="sobremim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header card-payflow">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-address-card mr-2"></i>Sobre mim</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i aria-hidden="true" class="fas fa-times-circle"></i>
                  </button>
                </div>
                <div class="modal-body">
                <form action="editar-sobre.php" method="POST">
                  <input type="hidden" name="id" value="<?= $user_id ?>">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1"><i class="fas fa-book mr-2"></i>Formação Acadêmica</label>
                    <textarea name="formacaoUsuario" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $user_formacao ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea2"><i class="fas fa-map-marker-alt mr-2"></i>Localização</label>
                    <input name="localUsuario" value="<?= $user_local ?>" class="form-control" type="text">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea3"><i class="fas fa-pencil-alt mr-2"></i>Habilidades</label>
                    <textarea name="habilidadesUsuario" class="form-control" id="exampleFormControlTextarea3" rows="3"><?= $user_habilidades ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea4"><i class="far fa-file-alt mr-2"></i>Informações pessoais</label>
                    <textarea name="infoUsuario" class="form-control" id="exampleFormControlTextarea4" rows="3"><?= $user_info ?></textarea>
                  </div>
                </div>
                <div class="modal-footer" style="background-color: #F7F7F7;">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-success">Salvar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-9">
            <div class="card">
              <div class="card-header p-2">
                  <div class="d-flex flex-row-reverse bd-highlight">
                <ul class="nav nav-pills edit-margin">
                  <li class="nav-item"><a class="nav-link edit-profile" href="#settings" data-toggle="tab"><i class="fas fa-user-edit"></i> Editar</a></li>
                </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                <div class="active tab-pane">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="<?= $user_name ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmpresa" placeholder="Nome da empresa" value="<?= $user_empresa ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" value="<?= $user_email ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Data de nascimento</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName2" placeholder="00/00/0000" value="<?= $user_nascimento ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experiências</label>
                        <div class="col-sm-10">
                          <textarea readonly class="form-control" id="inputExperience" placeholder="Descreva suas experiências..."><?= $user_exp ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="(00) 0 0000-0000" readonly value="<?= $user_celular ?>">
                        </div>
                      </div>
                    </form>
                  </div>

                  <!-- Editar -->

                  <div class="tab-pane" id="settings">
                    <form action="editar-usuario.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                      <input type="hidden" name="id" value="<?= $user_id ?>">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <img id="preview" class="img-fluid d-block mb-4" style="width: 20%; height: auto;">
                          <input type="file" class="form-control-file" onchange="previewImagem()" name="img" id="imagem">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nome completo" name="nomeUsuario" value="<?= $user_name ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmpresa" placeholder="Nome da empresa" name="nomeEmpresa" value="<?= $user_empresa ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="email" name="emailUsuario" class="form-control" id="inputEmail" placeholder="E-mail" value="<?= $user_email ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Data de nascimento</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName2" placeholder="00/00/0000" name="nascUsuario" value="<?= $user_nascimento ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experiências</label>
                        <div class="col-sm-10">
                          <textarea name="expUsuario" class="form-control" id="inputExperience" placeholder="Descreva suas experiências..."><?= $user_exp ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-sm-10">
                          <input type="text" name="celUsuario" class="form-control" id="inputSkills" placeholder="(00) 0 0000-0000" value="<?= $user_celular ?>" data-mask="(00) 0 0000-0000">
                        </div>
                      </div>
                      <div class="d-flex flex-row-reverse bd-highlight">
                      <button type="submit" class="btn btn-success save-btn">Salvar</button>
                      <a href="usuario.php" class="btn btn-secondary save-btn mr-2">Cancelar</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
  }, 4000);
</script>

<!-- JQuery Mask -->
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
<script>
        function previewImagem(){
                var imagem = document.querySelector('input[name=img]').files[0];
                var preview = document.getElementById("preview");
                
                var reader = new FileReader();

                reader.onloadend = function(){
                    preview.src = reader.result;
                } 

                if(imagem){
                    reader.readAsDataURL(imagem);
                }else{
                    preview.src = "";
                }
            }
</script>
</body>
</html>
