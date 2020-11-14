<!DOCTYPE html>
<html>
<head>
    

<?php 
session_start(); 
include '../import/tarefas.html';

?>

<title>Tarefas</title>
<script type="text/javascript" src="../js/pesquisarTarefa.js"></script>

</head>
<body>

<!-- Menu-->
<?php include 'menu.php';?>
<main class="page-content">
    <div class="container-fluid">
		<div class="container">

			<div class='col-md-5'></div>
			<div class='col-md-7 float-left' ><form class='form-inline border shadow p-3 mb-5 bg-white rounded' method="POST" action="" id='formPesquisa' >
				  <div class='form-group mx-sm-3 mb-2'> 
				    <input type='DATE' class='form-control' id='dataInicio' required="" name='dataInicio' placeholder='Data Início'>
				  </div>
				  <div class='form-group mx-sm-3 mb-2'>
				    <input type='DATE' class='form-control' id='dataFim' required="" name='dataFim' placeholder='Data Fim'>
				  </div>
				  <input type='submit' class='btn btn-primary mb-2' id='buscarTarefasPorData' >
			</form></div>

			<?php include '../php/erroTarefa.php'; ?>

			<!--tabela-->
			<div id="resultadoPesquisa" >
			<table class='table table-striped border shadow p-3 mb-5 bg-white rounded' >
			    <thead>					
					<tr class='bg-dark text-white' style='text-align:center'>

						<th>Títulos</th>
						<th>Horário Início</th>
						<th>Horário Fim</th>
						<th>Prioridade</th>
						<th>Ações</th>
            
            <a class='btn btn-primary' style='margin-left:95%; background: #5AA0CC;' href='../web/registrarTarefa.php'><i style='color: white;' class='fa fa-plus'></i></a>
					</tr>					
				</thead>
				
				<tbody>
			<?php
include '../php/conexao.php';

			

$idUsuario = $_SESSION['idusuario'];

  $_POST['dataInicio'] = null;
  $_POST['dataFim']  = null;
$sql = "SELECT tar.id,
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
                            AND tar.usuario = ".$idUsuario;



$stmt = $conexao->query($sql);
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();

foreach($resultado as $linha){
  $linha['json'] = json_encode($linha);        
        echo"
			<tr style='text-align:center;'>
                <td style='white-space: nowrap; text-align:left;'>".$linha['titulo']."</td>";
                if ($linha['h_inicio'] != '') {
                  echo"<td style='white-space: nowrap;'>".$linha['h_inicio']."<img src='../css/img/icons8-clock.svg' style='margin: 0px 0px 3px 10px; width: 15px; height: 15px;'></td>
                  <td style='white-space: nowrap;'>".$linha['h_fim']."<img src='../css/img/icons8-clock.svg' style='margin: 0px 0px 3px 10px; margin-bottom: 3px; width: 15px; height: 15px;'></td>
                  ";
                } else {
                  echo"<td>--:--</td>
                  <td>--:--</td>";
                }
                
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
                    <a href='#' id='btModal' onclick='openModal(".$linha['json'].")' style='margin-right: 3px;'><img src='../css/img/icons8-search.svg' style='width: 30px; height: 30px;'></a>
                    <a href='alterarTarefa.php?id=".$linha['id']."' style='margin-right: 3px;'><img src='../css/img/icons8-edit.svg' style='width: 30px; height: 30px;'></a>
                    <a href='../php/excluirTarefa.php?id=".$linha['id']."' style='margin-right: 3px;'><img src='../css/img/icons8-trash.svg' style='width: 30px; height: 30px;'></a>
                  </center>
                  </td>
            </tr>"; 
}?>

<?php
		echo"

		</tbody>
        </table>";
    
   
}

echo" ";
?>




		</div>

		</div>
	</div>
</main>
<!-- Modal1 -->
          <div class='modal ' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalTitle' aria-hidden='true'>
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
         
          </div>
</div>
</div>
          
   </div>











</body>

</html>