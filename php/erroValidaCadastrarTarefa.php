<?php 
if(!empty($_GET['erroCadastrarTarefa'])){
  unset($_GET['erroCadastrarTarefa']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Verifique se todos os campos foram preenchidos.
  </div>";
}
if(!empty($_GET['erroCadastrarTarefaStr'])){
  unset($_GET['erroCadastrarTarefaStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> O campo <strong>Descrição</strong> deve possuir no máximo 300 caracteres.
  </div>";
}
if(!empty($_GET['erroCadastrarTarefaNoStr'])){
  unset($_GET['erroCadastrarTarefaNoStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    Não deve-se informar caracteres especiais.
  </div>";
}
?>