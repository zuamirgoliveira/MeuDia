<?php 
include 'conexao.php';

$idUsuario = $_SESSION['idusuario']; 

$stmt = $conexao->query("select * from usuario where id='$idUsuario'");
    $contagem = $stmt->rowCount();
    if($contagem == 1){

		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
        
		echo"
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
		<input id='hsonoinicio' name='hsonoinicio' type='time' placeholder='' value='".$linha['h_sono_inicio']."' class='form-control input-md'>
	</div>
</div>

<!-- hsonofim input-->
<div class='form-group'>
	<label class='col-md-4 control-label' for='hsonofim'>Horário de descanço (Fim)</label>  
	<div class='col-md-1'>
		<input id='hsonofim' name='hsonofim' type='time' placeholder='' value='".$linha['h_sono_fim']."' class='form-control input-md'>
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