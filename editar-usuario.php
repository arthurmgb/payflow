<?php

session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_STRING);
$nomeEmpresa = filter_input(INPUT_POST, 'nomeEmpresa', FILTER_SANITIZE_STRING);
$emailUsuario = filter_input(INPUT_POST, 'emailUsuario', FILTER_SANITIZE_EMAIL);
$nascUsuario = filter_input(INPUT_POST, 'nascUsuario', FILTER_SANITIZE_STRING);
$expUsuario = filter_input(INPUT_POST, 'expUsuario', FILTER_SANITIZE_STRING);
$celUsuario = filter_input(INPUT_POST, 'celUsuario', FILTER_SANITIZE_STRING);
$imagem = $_FILES['img']['name'];

if($imagem == ""){
    
    $update_usuario = "UPDATE usuarios SET nome='$nomeUsuario', empresa='$nomeEmpresa', email='$emailUsuario', nascimento='$nascUsuario', exp='$expUsuario', celular='$celUsuario' WHERE id='$id'";
    $executar_update = mysqli_query($conn, $update_usuario);

    if(mysqli_affected_rows($conn)){
        header("Location: usuario.php");
        $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
        Usuário editado com sucesso.
        </div>";
    }else{
        header("Location: usuario.php");
    }
}else{

    $update_usuario = "UPDATE usuarios SET foto='$imagem', nome='$nomeUsuario', empresa='$nomeEmpresa', email='$emailUsuario', nascimento='$nascUsuario', exp='$expUsuario', celular='$celUsuario' WHERE id='$id'";
    $executar_update = mysqli_query($conn, $update_usuario);
    
    $_UP['pasta'] = 'usuarios/'.$id.'/';
    array_map('unlink', glob("usuarios/$id/*.*"));
    move_uploaded_file($_FILES['img']['tmp_name'], $_UP['pasta'].$imagem);
    
    if(mysqli_affected_rows($conn)){
        header("Location: usuario.php");
        $_SESSION['msg'] = "<div id='cliente_cad' class='alert alert-success' role='alert'>
        Usuário editado com sucesso.
        </div>";
    }else{
        header("Location: usuario.php");
    }
}