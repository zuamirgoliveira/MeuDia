
<?php 
include 'conexao.php';

$idUsuario = $_SESSION['idusuario']; 

$stmt = $conexao->query("select * from usuario where id='$idUsuario'");
    $contagem = $stmt->rowCount();
    if($contagem == 1){

		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
	if(($linha["h_sono_inicio"] == '00:00:00') and ($linha["h_sono_fim"] == '00:00:00') ){	
	echo "<div class='alert alert-warning alert-dismissible'>								
			<strong>Atenção!</strong> Preencha Seu Horário Inicial e Final de Descanço para Poder <strong> Cadastrar uma Tarefa </strong>. 
	</div>";
	}
	elseif(is_null($linha["h_sono_inicio"]) and is_null($linha["h_sono_fim"])){	
	echo "<div class='alert alert-warning alert-dismissible'>								
			<strong>Atenção!</strong> Preencha Seu Horário Inicial e Final de Descanço para Poder <strong> Cadastrar uma Tarefa </strong>. 
	</div>";
	}
	echo"
	<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
		<img src='".$linha['url_imagem']."' alt='Meudia' width='150px' height='150px' style='margin-bottom: 30px; border-radius: 50%'>
		<button type='submit' style='border: none;
		outline: none;
		background: none;
		cursor: pointer;
		color: #0000EE;
		padding: 0;
		text-decoration: underline;
		font-family: inherit;
		font-size: inherit;'><img src='../css/img/icons8-add-camera-96.png' alt='Meudia' width='50px' height='50px' style='margin-top: 90px; margin-left: -50px;'></button>
	</form>

<form class='form-horizontal' action='../php/submitPerfil.php' method='POST'>
<fieldset>
<!-- nome input-->
	<div class='form-group'>
		<label class='col-md-4 control-label' for='nome'>Nome</label>  
		<div class='col-md-4'>
		<input id='nome' name='nome' type='text' placeholder='' value='".$linha['nome']."' class='form-control input-md' required=''>
	</div>
</div>
<!-- Select sexo -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='sexo'>Sexo</label>
	<div class='col-md-4'>";
	if(is_null($linha['sexo'])){
			echo"<select id='sexo' name='sexo' class='form-control'>
				<option value='Prefiro não informar'>Prefiro não informar</option>
				<option value='Masculino'>Masculino</option>
				<option value='Feminino'>Feminino</option>";
		} else {
			echo"<select id='sexo' name='sexo' class='form-control'>
				<option value='".$linha['sexo']."'>".$linha['sexo']."</option>
				<option value='Prefiro não informar'>Prefiro não informar</option>
				<option value='Masculino'>Masculino</option>
				<option value='Feminino'>Feminino</option>";
		}
		
		echo"
		</select>
	</div>
</div>
<!-- hsonoinicio input-->
<div class='form-group'>
	<label class='col-md-4 control-label' for='hsonoinicio'>Horário de descanço (Início)</label>  
	<div class='col-md-1'>
		<input id='hsonoinicio' name='hsonoinicio' type='time' placeholder='' value='".$linha['h_sono_inicio']."' class='form-control input-md' style='min-width: 150px;'>
	</div>
</div>
<!-- hsonofim input-->
<div class='form-group'>
	<label class='col-md-4 control-label' for='hsonofim'>Horário de descanço (Fim)</label>  
	<div class='col-md-1'>
		<input id='hsonofim' name='hsonofim' type='time' placeholder='' value='".$linha['h_sono_fim']."' class='form-control input-md' style='min-width: 150px;'>
	</div>
</div>
<!-- Button -->
<div class='form-group'>
	<label class='col-md-4 control-label' for='confirmar'></label>
	<div class='col-md-4'>
		<button id='confirmar' name='confirmar' class='btn btn-success'>Confirmar</button>
	</div>
</div>
</fieldset>
</form>";
		}
	}
?>
