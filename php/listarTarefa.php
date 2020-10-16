<?php
include 'conexao.php';

		echo"			
			<table class='table table-striped'>
			    <thead>					
					<tr class='bg-dark text-white' style='text-align:center'>
						<th>Título</th>
						<th>Horário Início</th>
						<th>Horário Fim</th>
						<th>Prioridade</th>
						<th>Ações</th>
						<a class='btn btn-primary' style='margin-left:95%' href='../web/registrarTarefa.php'><i class='fa fa-plus'></i></a>
					</tr>					
				</thead>
				<tbody>";
$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("SELECT tar.id,
                                tar.titulo,
                                tar.descricao,
                                tar.subtitulo,
                                tar.h_inicio,
                                tar.h_fim,
                                tar.data_tarefa,
                                tip.descricao AS tipo_tarefa,
                                pri.descricao AS prioridade,
                                pri.nemotecnico
                           FROM tarefa tar,
                                prioridade  pri,
                                tipo_tarefa  tip
                          WHERE pri.id = tar.prioridade
                            AND tip.id = tar.tipo_tarefa
                            AND tar.usuario = '$idUsuario'");
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();

foreach($resultado as $linha){
  $linha['json'] = json_encode($linha);        
        echo"
			<tr style='text-align:center;'>
                <td style='white-space: nowrap; text-align:left;'>".$linha['titulo']."</td>
                <td style='white-space: nowrap;'>".$linha['h_inicio']."<i class='fa fa-clock' style='padding-left: 10px;'></td>
                <td style='white-space: nowrap;'>".$linha['h_fim']."<i class='fa fa-clock' style='padding-left: 10px;'></td>
                ";
                
                switch ($linha['nemotecnico']) {
                  case "CRITICA":
                    echo "<td style='background: #D97373; text-color: #343A40;'>".$linha['prioridade']."</td>";
                    break;
                  case "ALTA":
                    echo "<td style='background: #F0EE8D; color: #343A40;'>".$linha['prioridade']."</td>";
                    break;
                  case "MEDIA":
                    echo "<td style='background: #5AA0CC;'>".$linha['prioridade']."</td>";
                    break;
                  case "BAIXA":
                    echo "<td style='background: #4CD9AC;'>".$linha['prioridade']."</td>";
					break; 
					
                  default:
                    echo "<td class=''><strong>".$linha['prioridade']."</strong></td>";
                    break;
                }

                echo"
                <td style='white-space: nowrap;'>
                  <center>
                    <button id='btModal' type='button' class='btn btn-primary' style='margin-left: 8px; margin-right: 15px;' onclick='openModal(".$linha['json'].")'><i class='fa fa-search'></i></button>
                    <a class='btn btn-primary' style='margin-left: 8px, margin-right: 10px;' href='alterarTarefa.php?id=".$linha['id']."'><div class='fa fa-edit'></div></a>
                    <button class='btn btn-danger' style='margin-left: 8px, margin-right: 10px;'><a class='fa fa-trash' href='../php/excluirTarefa.php?id=".$linha['id']."'></a></button>
                  </center>
                  </td>
            </tr>"; 
}
		echo"
		</tbody>
        </table>";
    
    echo" <!-- Modal -->
          <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
              <div class='modal-content'>
                <div id='modalHeader' class='modal-header'>
                  <label for='titulo' style='font-size: 24px; font-weight: bold;' id='tipoTarefa'></label>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>
                <div class='modal-body'>
                  <div>
                    <label for='titulo' style='font-weight: bold;'>Título</label>
                    <input type='titulo' class='form-control' id='titulo' readonly>
                    <label for='subtitulo' style='font-weight: bold; padding-top: 10px;'>Subtítulo</label>
                    <input type='subtitulo' class='form-control' id='subtitulo' readonly>
                    <label for='descricao' style='font-weight: bold; padding-top: 10px;'>Descrição</label>
                    <div class='input-group'>
                    <textarea class='form-control' id='descricao' readonly></textarea>
                    </div>
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