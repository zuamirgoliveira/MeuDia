<?php

include 'conexao.php';

echo "<table class='table table-striped'>
       <thead>
			<tr class='bg-dark text-white'>
				<th><center>Descrição</center></th>
				<th><center style='margin-right: 8px'>Ações</center></th>
				<center> <a class='btn btn-primary' style='margin-left:95%' href='registrarTipoTarefa.php'><i class='fa fa-plus'></i></a></center>
			</tr>
        </thead>
        <tbody>";

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("
						SELECT
						  id,
						  descricao 
						FROM
						  tipo_tarefa 
						WHERE
						  usuario = '$idUsuario'");						  
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();

foreach($resultado as $linha){
        
        echo "<tr>
                <td><center>".$linha['descricao']."</center></td>
                
                ";
                                
                echo"
					<td>
						<center><button class='btn btn-primary' style='margin-right: 10px;'><a class='fa fa-search'></a></button><a class='btn btn-primary' style='margin-right: 10px;' href='alterarTipoTarefa.php?id=".$linha['id']."'><div class='fa fa-edit'></div></a><button class='btn btn-danger' style='margin-right: 10px;'><a class='fa fa-trash' href='../php/excluirTipoTarefa.php?id=".$linha['id']."'></a></button></center>
					</td>
					</tr>";
	}
		echo"</tbody>
			 </table>";
}

?>    