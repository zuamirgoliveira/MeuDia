<?php 
if(!empty($_GET['erroLogin'])){
  unset($_GET['erroLogin']);
 echo"<div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Erro!</strong> Verifique seu <strong>Login</strong> e <strong>Senha</strong>.
  </div>";
}
if(!empty($_GET['erroLoginPreencher'])){
  unset($_GET['erroLoginPreencher']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Preencha seu <strong>Login</strong> e <strong>Senha</strong>.
  </div>";
}
if(!empty($_GET['registro'])){
  unset($_GET['registro']);
 echo"<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    Registrado com sucesso!.
  </div>";
}


?>