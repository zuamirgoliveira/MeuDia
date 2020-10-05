<?php
include 'conexao.php';

$idUsuario = $_SESSION['idusuario'];
$idTarefa = $_GET['id'];

$stmt = $conexao->query("SELECT tar.id,
								tar.titulo,
								tar.subtitulo,
								tar.descricao,
								tar.h_inicio,
								tar.h_fim,
								tar.tipo_tarefa,
								tip.descricao AS tipo_tarefa,
								pri.descricao AS prioridade,
								pri.nemotecnico 
						   FROM tarefa tar,
								prioridade pri,
								tipo_tarefa tip
					      WHERE pri.id = tar.prioridade
							AND tar.tipo_tarefa = tip.id
							AND tar.usuario = '$idUsuario'
							AND tar.id = '$idTarefa'");

    $contagem = $stmt->rowCount();
    if($contagem == 1){

		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
        
		echo"
		<form class='form-horizontal' action='../php/submitAlterarTarefa.php?id=".$linha['id']."' method='POST'>
		<fieldset>

		<!-- Título-->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='titulo'>Título</label>  
			<div class='col-md-4'>
				<input id='titulo' name='titulo' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números.' placeholder='' value='".$linha['titulo']."' class='form-control input-md' maxlength='30' required=''>
			</div>
		</div>

		<!-- Subtitulo -->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='subtitulo'>Subtitulo</label>  
			<div class='col-md-4'>
				<input id='subtitulo' name='subtitulo' type='text' pattern='^[a-z A-Z 0-9 Á-ú]+$' title='Apenas letras e números.' placeholder='' value='".$linha['subtitulo']."' class='form-control input-md' maxlength='50' required=''>
			</div>
		</div>

		<!-- Descrição -->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='descricao'>descricao</label>
			<div class='col-md-4'>                     
				<textarea class='form-control' id='descricao' name='descricao' maxlength='30'>".$linha['descricao']."</textarea>
			</div>
		</div>

		<!-- Horário de Início-->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='hinicio'>Horário de Início</label>  
			<div class='col-md-1'>
				<input id='hinicio' name='hinicio' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' value='".$linha['h_inicio']."' class='form-control input-md' required=''>
			</div>
		</div>

		<!-- Horário de Termino -->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='hfim'>Horário de Termino</label>
			<div class='col-md-1'>
				<input id='hfim' name='hfim' type='time' pattern='^[0-9]+$' title='Apenas números.' placeholder='' value='".$linha['h_fim']."' class='form-control input-md'>
			</div>
		</div>

		<!-- Tipo de Tarefa -->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='tipotarefa'>Tipo de Tarefa</label>
			<div class='col-md-3'>
				<select id='tipotarefa' name='tipotarefa' class='form-control'>";
					include '../php/selectTipoTarefa.php';
			echo"
				</select>
			</div>
		</div>

		<!-- Prioridade -->
		<div class='form-group'>
		<label class='col-md-4 control-label' for='prioridade'>Prioridade</label>
			<div class='col-md-3'>
				<select id='prioridade' name='prioridade' class='form-control'>";
					include '../php/selectPrioridade.php';
			echo"
				</select>
			</div>
		</div>

		<!-- Alterar registros -->
		<div class='form-group'>
			<div class='col-md-4'>
				<button id='singlebutton' name='singlebutton' class='btn btn-success'>Alterar</button>
			</div>
		</div>
		</fieldset>
		</form>";
		}
	}
?>