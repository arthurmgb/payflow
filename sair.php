<?php

session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "<div id='logout' class='alert alert-success' role='alert'>
Deslogado com sucesso.
</div>";
header("Location: login.php");