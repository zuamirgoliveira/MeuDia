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

$stmt = $conexao->query("select t.id,t.titulo,t.descricao,t.h_inicio,t.h_fim,p.descricao as prioridade,p.nemotecnico as nemotecnico from tarefa t inner join  prioridade  p  on p.id = t.prioridade where usuario='$idUsuario'");
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();

foreach($resultado as $linha){
        
        echo"
			<tr style='text-align:center;'>
                <td style='white-space: nowrap; text-align:left;'>".$linha['titulo']."</td>
                <td style='white-space: nowrap;'>".$linha['h_inicio']."<i class='fa fa-clock'></td>
                <td style='white-space: nowrap;'>".$linha['h_fim']."<i class='fa fa-clock'></td>
                ";
                
                switch ($linha['nemotecnico']) {
                  case "CRITICA":
                    echo "<td class='bg-danger'><strong>".$linha['prioridade']."</strong></td>";
                    break;
                  case "ALTA":
                    echo "<td class='bg-warning'><strong>".$linha['prioridade']."</strong></td>";
                    break;
                  case "MEDIA":
                    echo "<td class='bg-primary'><strong>".$linha['prioridade']."</strong></td>";
                    break;
                  case "BAIXA":
                    echo "<td class='bg-success'><strong>".$linha['prioridade']."</strong></td>";
					break; 
					
                  default:
                    echo "<td class=''><strong>".$linha['prioridade']."</strong></td>";
                    break;
                }

                echo"
                <td style='white-space: nowrap;'>
                  <center>
                    <button class='btn btn-primary' style='margin-left: 8px' style='margin-right: 15px;'><i class='fa fa-search'></i></button>
                    <a class='btn btn-primary' style='margin-left: 8px' style='margin-right: 10px;' href='alterarTarefa.php?id=".$linha['id']."'><div class='fa fa-edit'></div></a>
                    <button class='btn btn-danger' style='margin-left: 8px' style='margin-right: 10px;'><a class='fa fa-trash' href='../php/excluirTarefa.php?id=".$linha['id']."'></a></button>
                  </center>
                  </td>
            </tr>"; 
}
		echo"
		</tbody>
        </table>";
}
?>