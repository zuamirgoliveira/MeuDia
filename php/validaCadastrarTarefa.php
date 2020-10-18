<?php 
echo"<form class='form-horizontal' id='form' action='../php/cadastrarTarefa.php' method='POST'>
<fieldset>

<!-- Título-->
<div class='form-group'>
	<label class='col-md-4 control-label' for='titulo'>Título</label>  
	<div class='col-md-4'>
		<input id='titulo' name='titulo' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números.' placeholder='' class='form-control input-md' maxlength='30' required=''>
	</div>
</div>

<!-- Subtitulo -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='subtitulo'>Subtitulo</label>  
	<div class='col-md-4'>
		<input id='subtitulo' name='subtitulo' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números.' placeholder='' class='form-control input-md' maxlength='50' required=''>
	</div>
</div>

<!-- Descrição -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='descricao'>descricao</label>
	<div class='col-md-4'>                     
		<textarea class='form-control' id='descricao' name='descricao' title='Apenas letras e números.' maxlength='300'></textarea>
	</div>
</div>

<!-- Horário de Início-->
<div class='form-group'>
	<label class='col-md-4 control-label' for='hinicio'>Horário de Início</label>  
	<div class='col-md-1'>
		<input id='hinicio' name='hinicio' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' class='form-control input-md' required=''>
	</div>
</div>

<!-- Horário de Termino -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='hfim'>Horário de Termino</label>  
	<div class='col-md-1'>
		<input id='hfim' name='hfim' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' class='form-control input-md'>
	</div>
</div>

<!-- Tipo de Tarefa -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='tipotarefa'>Tipo de Tarefa</label>
	<div class='col-md-3'>
		<select id='tipotarefa' name='tipotarefa' class='form-control'>";
		include '../php/selectTipoTarefa.php';
	echo"</select>
	</div>
</div>

<!-- Prioridade -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='prioridade'>Prioridade</label>
	<div class='col-md-3'>
		<select id='prioridade' name='prioridade' class='form-control'>";
		include '../php/selectPrioridade.php';
	echo"</select>
	</div>
</div>

<!-- Registrar -->
<div class='form-group'>
	<div class='col-md-4'>
	    <a href='tarefas.php' class='btn btn-info'>Voltar</a>
		<button id='singlebutton' name='singlebutton' class='btn btn-success'>Cadastrar</button>
	</div>
</div>
</fieldset>
</form>";
?>