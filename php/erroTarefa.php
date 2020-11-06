<?php 
if(!empty($_GET['excluirTarefaOk'])){
  unset($_GET['excluirTarefaOk']);
 echo"<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Tarefa Excluida com sucesso</strong>
  </div>";
}else{
      if(!empty($_GET['erroTipoTarefaUsuario'])){
        unset($_GET['erroTipoTarefaUsuario']);
       echo"<div class='alert alert-warning alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Atenção!</strong> Não foi possível excluir o <strong>TIPO DE TAREFA</strong> selecionado.
        </div>";
      }else{
          if(!empty($_GET['TipoTarefaOk'])){
            unset($_GET['TipoTarefaOk']);
           echo"<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              O Tipo de Tarefa foi excluido com sucesso!.
            </div>";
          }
        }
}

?>