<?php 
  include_once("conexao.php");
  session_start();
  if(!empty($_SESSION['id'])){
      
  }
  else{
    header("Location: login.php");
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="dist/favicon/">
    <link rel="icon" type="image/png" sizes="32x32" href="dist/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/favicon/favicon-16x16.png">
    <link rel="manifest" href="dist/favicon/site.webmanifest">
    <link rel="mask-icon" href="dist/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>PayFlow | Imprimir Recibo</title>

    <style>

        body{
            user-select: none;
        }
        .card{
            border: 1px solid #000;
        }
        input[type=text], input[type=date]{
            border: 0;
            border-bottom: 2px solid #555555;
            border-radius: 0;
        }
        .input-group-text{
            border: 0;
            border-bottom: 2px solid #555555;
            border-radius: 0;
            background-color: transparent;
        }

        @media print {
        body * {
            visibility: hidden;
        }
        #print, #print * {
            visibility: visible;
        }
    }
    
    </style>

  </head>
  <body>
    <?php 
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $cliente = filter_input(INPUT_GET, 'cliente', FILTER_SANITIZE_NUMBER_INT);

        //Buscando informações da tabela mensalidades

        $query_recibo = "SELECT * FROM mensalidades WHERE id='$id'";
        $exec_recibo = mysqli_query($conn, $query_recibo);
        $recibo = mysqli_fetch_assoc($exec_recibo);

        $valor = $recibo['valor'];
        $id_cliente = $recibo['id_cliente'];
        $id_servico = $recibo['id_servico'];
        $vencimento = $recibo['vencimento'];

        //Formatando vencimento

        $format_venc = date('d/m/Y', strtotime($vencimento));

        //Buscando Serviço

        $query_servico = "SELECT servicos FROM servicos WHERE id='$id_servico'";
        $exec_servico = mysqli_query($conn, $query_servico);
        $info_servico = mysqli_fetch_assoc($exec_servico);

        $nome_servico = $info_servico['servicos']; 

        //Buscando informações do cliente

        $query_cliente = "SELECT * FROM clientes WHERE id='$id_cliente'";
        $exec_cliente = mysqli_query($conn, $query_cliente);
        $info_cliente = mysqli_fetch_assoc($exec_cliente);

        $nome_cliente = $info_cliente['nome'];
        $cpf_cliente = $info_cliente['cpf'];
        $local_cliente = $info_cliente['endereco'];
        $num_cliente = $info_cliente['numero'];
        $bairro_cliente = $info_cliente['bairro'];
        
        //Data Atual

        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');

    ?>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-2">
                <a href="listar_contratos.php?id=<?= $cliente ?>" class="btn btn-lg btn-block btn-success"><i class="fas fa-arrow-left mr-2"></i>Voltar</a>
            </div>
            <div class="col-10">
                <button onclick="print()" class="btn btn-lg btn-block btn-primary"><i class="fas fa-print mr-2"></i>Imprimir</button>
            </div>
        </div>
        <div id="print">
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                        <img src="dist\img\logo-min-payflow.png" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-10 pl-0">
                        <h5 class="card-title h2 float-left"><i class="fas fa-receipt mr-2"></i>RECIBO - 1ª via</h5>
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 float-right">Valor: <b>R$ <?= $valor ?><b></h5>
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 mr-3 float-right">Nº.: <?= $id ?></h5>
                   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-2 pr-0">

                        </div>
                        <div class="col-10 pl-0">
                        <form>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Emitente</label>
                            <input value="PayFlow - Sistema de Gerenciamento de Mensalidades" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input value="000.000.000-00" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Recebi (emos) de</label>
                            <input value="<?= $nome_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">a quantia de</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" value="<?= $valor ?>" class="quantia form-control" readonly>
                        </div>                           
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Correspondente a</label>
                            <input value="<?= $nome_servico ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Vencimento</label>
                            <input value="<?= $format_venc ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">e para clareza firmo (amos) o presente.</label>
                            <input value="Patos de Minas - MG" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="color: transparent; font-weight: 500; font-size: 1.2em;">a</label>
                            <input value="<?= $data ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Nome</label>
                            <input value="<?= $nome_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF</label>
                            <input value="<?= $cpf_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Endereço</label>
                            <input value="<?= $local_cliente?>, <?= $num_cliente ?> - <?= $bairro_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Assinatura</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted">
                    <div class="d-flex justify-content-center mt-3 mb-0">
                    <p class="mr-1" style="font-weight: 400;">Recibo gerado automaticamente por<p> 
                    <a class="" style="text-decoration: none;" href="">PayFlow&trade;<a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 mt-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                        <img src="dist\img\logo-min-payflow.png" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-10 pl-0">
                        <h5 class="card-title h2 float-left"><i class="fas fa-receipt mr-2"></i>RECIBO - 2ª via</h5>
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 float-right">Valor: <b>R$ <?= $valor ?><b></h5>
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 mr-3 float-right">Nº.: <?= $id ?></h5>
                   
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-2 pr-0">

                        </div>
                        <div class="col-10 pl-0">
                        <form>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Emitente</label>
                            <input value="PayFlow - Sistema de Gerenciamento de Mensalidades" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input value="000.000.000-00" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Recebi (emos) de</label>
                            <input value="<?= $nome_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">a quantia de</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" value="<?= $valor ?>" class="quantia form-control" readonly>
                        </div>                           
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Correspondente a</label>
                            <input value="<?= $nome_servico ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Vencimento</label>
                            <input value="<?= $format_venc ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">e para clareza firmo (amos) o presente.</label>
                            <input value="Patos de Minas - MG" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="color: transparent; font-weight: 500; font-size: 1.2em;">a</label>
                            <input value="<?= $data ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Nome</label>
                            <input value="<?= $nome_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF</label>
                            <input value="<?= $cpf_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Endereço</label>
                            <input value="<?= $local_cliente?>, <?= $num_cliente ?> - <?= $bairro_cliente ?>" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Assinatura</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted">
                    <div class="d-flex justify-content-center mt-3 mb-0">
                    <p class="mr-1" style="font-weight: 400;">Recibo gerado automaticamente por<p> 
                    <a class="" style="text-decoration: none;" href="">PayFlow&trade;<a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>

        function print(){

            var recibo = document.getElementById('print').innerHTML,

            tela_impressao.document.write(recibo);
            tela_impressao.window.print();
            tela_impressao.window.close();

        }

</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>