<?php 
if(!empty($_GET['erroCadastrarTipoTarefa'])){
  unset($_GET['erroCadastrarTipoTarefa']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Verifique se todos os campos foram preenchidos.
  </div>";
}
if(!empty($_GET['erroCadastrarTipoTarefaStr'])){
  unset($_GET['erroCadastrarTipoTarefaStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> O campo <strong>Descrição</strong> deve possuir no máximo 300 caracteres.
  </div>";
}
if(!empty($_GET['erroCadastrarTipoTarefaNoStr'])){
  unset($_GET['erroCadastrarTipoTarefaNoStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    Não deve-se informar caracteres especiais.
  </div>";
}
?>