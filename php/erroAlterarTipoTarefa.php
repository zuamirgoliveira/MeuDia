<?php 
if(!empty($_GET['erroAlterarTarefa'])){
  unset($_GET['erroAlterarTarefa']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> Verifique se todos os campos foram preenchidos.
  </div>";
}
if(!empty($_GET['erroAlterarTarefaStr'])){
  unset($_GET['erroAlterarTarefaStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Atenção!</strong> O campo <strong>Descrição</strong> deve contar apenas 40 caracteres.
  </div>";
}
if(!empty($_GET['erroAlterarTarefaNoStr'])){
  unset($_GET['erroAlterarTarefaNoStr']);
 echo"<div class='alert alert-warning alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    Não deve-se informar caracteres especiais.
  </div>";
}


?>