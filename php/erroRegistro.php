<?php 
if(!empty($_GET['erroRegistro'])){
  unset($_GET['erroRegistro']);
 echo"<div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Já existe um usuário cadastrado com o Login informado.
  </div>";
}
if(!empty($_GET['erroRegistroPreencher'])){
  unset($_GET['erroRegistroPreencher']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Preencha os campos: <strong>Login</strong>, <strong>Senha</strong> e <strong>Nome</strong>.
  </div>";
}


?>