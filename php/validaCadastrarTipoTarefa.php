<?php 
echo"<form class='form-horizontal' action='../php/cadastrarTipoTarefa.php' method='POST'>
<fieldset>

<!-- Descricao -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='titulo'>Tipo de Tarefa</label>  
	<div class='col-md-4'>
		<input id='descricao' name='descricao' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números.' placeholder='' class='form-control input-md' required=''>
	</div>
</div>

<!-- Label -->
<div class='form-group'>
	<label class='col-md-3 control-label' for='titulo'>Período do Tipo tarefa</label>  
	<div class='col-md-2'>
		<label class='col-md-3 control-label' for='titulo'>Início</label> 
			<input id='h_inicio' name='h_inicio' type='time' pattern='^[0-9]+$' title='Apenas números.'  placeholder='' class='form-control input-md' required=''>
		<label class='col-md-3 control-label' for='titulo'>Fim</label>
			<input id='h_fim' name='h_fim' type='time' pattern='^[0-9]+$' title='Apenas números.'  placeholder='' class='form-control input-md' required=''>
	</div>
</div>

<!-- Registrar -->
<div class='form-group'>
	<div class='col-md-4'>
		<button id='singlebutton' name='singlebutton' class='btn btn-success'>Cadastrar</button>
	</div>
</div>
</fieldset>
</form>";
 ?>