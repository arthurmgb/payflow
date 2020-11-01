<?php

$query_user = "SELECT * FROM usuarios WHERE id={$_SESSION['id']}";
$exec_user = mysqli_query($conn, $query_user);
while($row_usuario = mysqli_fetch_assoc($exec_user)){

  $user_id = $row_usuario['id'];
  $user_foto = $row_usuario['foto'];
  $user_name = $row_usuario['nome'];
  $user_empresa = $row_usuario['empresa'];
  $user_email = $row_usuario['email'];
  $user_nascimento = $row_usuario['nascimento'];
  $user_exp = $row_usuario['exp'];
  $user_celular = $row_usuario['celular'];
  $user_formacao = $row_usuario['formacao'];
  $user_local = $row_usuario['localizacao'];
  $user_habilidades =$row_usuario['habilidades'];
  $user_info = $row_usuario['info'];
  $user_senha = $row_usuario['senha'];

}
?>