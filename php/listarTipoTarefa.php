<?php

include 'conexao.php';

echo "<table class='table table-striped'>
       <thead>
			<tr class='bg-dark text-white'>
				<th><center>Descrição</center></th>
				<th><center style='margin-right: 8px'>Ações</center></th>
				<center> <a class='btn' style='margin-left: 95%; background: #5AA0CC;' href='registrarTipoTarefa.php'><i style='color: white;' class='fa fa-plus'></i></a></center>
			</tr>
        </thead>
        <tbody>";

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("
						SELECT
						  *
						FROM
						  tipo_tarefa 
						WHERE
						  usuario = '$idUsuario'");						  
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();

foreach($resultado as $linha){
	$linha['json'] = json_encode($linha);    
        echo "<tr>
                <td><center>".$linha['descricao']."</center></td>
                
                ";
                                
                echo"
					<td> 
						<center>
						<div id='console-event'></div>
							<a href='#' id='btModal' onclick='openModal(".$linha['json'].")' style='margin-right: 3px;'><img src='../css/img/icons8-search.svg' style='width: 30px; height: 30px;'></a>
							<a href='alterarTipoTarefa.php?id=".$linha['id']."' style='margin-right: 3px;'><img src='../css/img/icons8-edit.svg' style='width: 30px; height: 30px;'></a>
							<a href='../php/excluirTipoTarefa.php?id=".$linha['id']."' style='margin-right: 3px;'><img src='../css/img/icons8-trash.svg' style='width: 30px; height: 30px;'></a>";
							if ($linha['liga_desliga'] == 0) {
								echo"<button id='btn-on-".$linha['id']."' type='button' style='background: #4CD9AC; color: white;' class='btn' data-toggle='button' aria-pressed='false' autocomplete='off' onclick='ligDesl(".$linha['id'].",".$linha['liga_desliga'].")'>On</button>";
							} else {
								echo"<button id='btn-on-".$linha['id']."' type='button' style='background: #D97373;' class='btn' data-toggle='button' aria-pressed='false' autocomplete='off' onclick='ligDesl(".$linha['id'].",".$linha['liga_desliga'].")'>Off</button>";
							}
						echo"</center>
					</td>
					</tr>";
	}
		echo"</tbody>
			 </table>";

			 echo" <!-- Modal -->
          <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
              <div class='modal-content'>
                <div id='modalHeader' class='modal-header'>
                  <label for='titulo' style='font-size: 24px; font-weight: bold;' id='descricao'></label>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  <div>
                    <div style='display: flex;'>
                      <div style='width: 50%; padding-top: 10px; margin: 10px;'>
                        <label for='hInicio' style='font-weight: bold; display: block; text-align: center;'>Hora Início</label>
                        <input type='hInicio' class='form-control' id='hInicio' style='text-align: center;' readonly>
                      </div>
                      <div style='width: 50%; padding-top: 10px; margin: 10px;'>
                        <label for='hFim' style='font-weight: bold; display: block; text-align: center;'>Hora Fim</label>
                        <input type='hFim' class='form-control' id='hFim' style='text-align: center;' readonly>
                      </div>
                    </div>

                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                </div>
              </div>
            </div>
          </div>";
}

?>