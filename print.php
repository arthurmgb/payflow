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
       
    </style>

  </head>
  <body>
    
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <button class="btn btn-lg btn-block btn-primary"><i class="fas fa-print mr-2"></i>Imprimir</button>
            </div>
        </div>
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
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 float-right">Valor: <b>R$ 600.00<b></h5>
                        <h5 class="card-title border border-dark h3 pr-3 pl-3 p-2 mr-3 float-right">Nº.: 15</h5>
                   
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
                            <input value="PayFlow - Sistema de Gerenciamento de Mensalidades" type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input value="000.000.000-00" type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Recebi (emos) de</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">a quantia de</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="quantia form-control">
                        </div>                           
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Correspondente a</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">e para clareza firmo (amos) o presente.</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="color: transparent; font-weight: 500; font-size: 1.2em;">a</label>
                            <input type="date" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Nome</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Endereço</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Assinatura</label>
                            <input type="text" class="form-control">
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
        <div class="row">
            <div class="col-12 mt-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                        <img src="dist\img\logo-min-payflow.png" class="rounded mx-auto d-block">
                        </div>
                        <div class="col-10 pl-0">
                        <h5 class="card-title h2 float-left"><i class="fas fa-receipt mr-2"></i>RECIBO - 2ª via</h5>
                        <h5 class="card-title h3 float-right">Valor: <b>R$ 600.00<b></h5>
                        <h5 class="card-title h3 mr-5 float-right">Nº.: 15</h5>
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
                            <input value="PayFlow - Sistema de Gerenciamento de Mensalidades" type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input value="000.000.000-00" type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Recebi (emos) de</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">a quantia de</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="quantia form-control">
                        </div>                           
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Correspondente a</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-6">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">e para clareza firmo (amos) o presente.</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-6">
                        <label class="float-left" style="color: transparent; font-weight: 500; font-size: 1.2em;">a</label>
                            <input type="date" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-8">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Nome</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-4">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">CPF/RG</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Endereço</label>
                            <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-12">
                        <label class="float-left" style="font-weight: 500; font-size: 1.2em;">Assinatura</label>
                            <input type="text" class="form-control">
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>