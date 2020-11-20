<?php
header('content-type: text/html');
session_start();
include 'conexao.php';


$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];

	
$idUsuario = $_SESSION['idusuario'];

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
                            AND tar.usuario = '$idUsuario' 
                            AND tar.data_tarefa >= '$dataInicio' 
                            AND tar.data_tarefa <= '$dataFim'";


$stmt = $conexao->query($sql);
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();
echo "<table class='table table-striped border shadow p-3 mb-5 bg-white rounded' >
          <thead>         
          <tr class='bg-dark text-white' style='text-align:center'>

            <th>Títulos</th>
            <th>Horário Início</th>
            <th>Horário Fim</th>
            <th>Data de Cadastro</th>
            <th>Prioridade</th>
            <th>Ações</th>
            
            <a class='btn btn-primary' style='margin-left:95%; background: #5AA0CC;' href='../web/registrarTarefa.php'><i style='color: white;' class='fa fa-plus'></i></a>
          </tr>         
        </thead>
        
        <tbody>";
foreach($resultado as $linha){
     $linha['json'] = json_encode($linha);     










        echo"
			<tr style='text-align:center;'>
                <td style='white-space: nowrap; text-align:left;'>".$linha['titulo']."</td>";
                if ($linha['h_inicio'] != '') {
                  echo"<td style='white-space: nowrap;'>".$linha['h_inicio']."<img src='../css/img/icons8-clock.svg' style='margin: 0px 0px 3px 10px; width: 15px; height: 15px;'></td>
                  <td style='white-space: nowrap;'>".$linha['h_fim']."<img src='../css/img/icons8-clock.svg' style='margin: 0px 0px 3px 10px; margin-bottom: 3px; width: 15px; height: 15px;'></td>
                  <td style='white-space: nowrap;'>".$linha['data_tarefa']."</td>
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
}
		echo"
		</tbody>
        </table>";
    
   
}else{

  echo "<table class='table table-striped border shadow p-3 mb-5 bg-white rounded' >
          <thead>         
          <tr class='bg-dark text-white' style='text-align:center'>

            <th>Sem Resultados</th>
            
            
            <a class='btn btn-primary' style='margin-left:95%; background: #5AA0CC;' href='../web/registrarTarefa.php'><i style='color: white;' class='fa fa-plus'></i></a>
          </tr>         
        </thead>
        
        <tbody>
</table>
        ";
}

?>