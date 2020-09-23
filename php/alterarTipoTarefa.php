<?php 
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("select * from tipo_tarefa where id='$idUsuario'");
    $contagem = $stmt->rowCount();
    if($contagem == 1){

		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
        
			echo"<form class='form-horizontal' action='../php/submitAlterarTipoTarefa.php' method='POST'>
<fieldset>
<!-- Descricao -->
	<div class'form-group'>
		<label class='col-md-4 control-label' for='titulo'>Tipo de Tarefa</label>  
			<div class='col-md-4'>
				<input id='descricao' name='descricao' type='text' placeholder='' value='".$linha['descricao']."' class='form-control input-md' required=''>
	</div>
</div>
	<div class='form-group'>
		<label class='col-md-3 control-label' for='titulo'>Período do Tipo tarefa</label>  
			<div class='col-md-2'>
				<label class='col-md-3 control-label' for='titulo'>Início</label> 
					<input id='h_inicio' name='h_inicio' type='time' placeholder='' value='".$linha['h_inicio']."' class='form-control input-md' required=''>
				<label class='col-md-3 control-label' for='titulo'>Fim</label>
					<input id='h_fim' name='h_fim' type='time' placeholder='' value='".$linha['h_fim']."' class='form-control input-md' required=''>
			</div>
	</div>
<!-- Registrar -->
	<div class='form-group'>
		<div class='col-md-4'>
			<button id='singlebutton' name='singlebutton' class='btn btn-success'>Alterar</button>
		</div>
	</div>
</fieldset>
</form>
</main>";
	}
}
?>	