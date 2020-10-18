<?php 
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$idTipoTarefa = $_GET['id'];

$stmt = $conexao->query("
						SELECT
						  * 	
						FROM
						  tipo_tarefa 
						WHERE
						  usuario = '$idUsuario' 
						  AND id = '$idTipoTarefa'");
    $contagem = $stmt->rowCount();
    if($contagem == 1){

		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
        
			echo"<form class='form-horizontal' action='../php/submitAlterarTipoTarefa.php?id=".$linha['id']."' method='POST'>
<fieldset>
<!-- Descricao -->
	<div class'form-group'>
		<label class='col-md-4 control-label' for='titulo'>Tipo de Tarefa</label>  
			<div class='col-md-4'>
				<input id='descricao' name='descricao' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números' onchange='try{setCustomValidity('')}catch(e){}' placeholder='' value='".$linha['descricao']."' class='form-control input-md' maxlength='30' required=''>
	</div>
</div>
	<div class='form-group'>
		<label class='col-md-3 control-label' for='titulo'>Período do Tipo tarefa</label>  
			<div class='col-md-2'>
				<label class='col-md-3 control-label' for='titulo'>Início</label> 
					<input id='h_inicio' name='h_inicio' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' value='".$linha['h_inicio']."' class='form-control input-md' required=''>
				<label class='col-md-3 control-label' for='titulo'>Fim</label>
					<input id='h_fim' name='h_fim' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' value='".$linha['h_fim']."' class='form-control input-md' required=''>
			</div>
	</div>
<!-- Registrar -->
	<div class='form-group'>
		<div class='col-md-4'>
		    <a href='tipoTarefas.php' class='btn btn-info'>Voltar</a>
			<button id='singlebutton' name='singlebutton' class='btn btn-success'>Alterar</button>
		</div>
	</div>
</fieldset>
</form>
</main>";
	}
}
?>	