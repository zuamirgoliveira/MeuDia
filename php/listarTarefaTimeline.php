<?php
include 'conexao.php';

echo "<div class='container timeline-completa'>

<div class='row'>
				<div class='col-md-12'>
					
					<div style='display:inline-block;width:100%;overflow-y:auto;'>
					<ul class='timeline timeline-horizontal'>";

$idUsuario = $_SESSION['idusuario'];

$stmt = $conexao->query("select t.id,t.titulo,t.subtitulo,t.descricao,t.h_inicio,t.h_fim,p.descricao as prioridade,p.nemotecnico as nemotecnico from tarefa t inner join  prioridade  p  on p.id = t.prioridade where usuario='$idUsuario'");
$contagem = $stmt->rowCount();

if($contagem >= 1){

$resultado = $stmt->fetchAll();



foreach($resultado as $linha){
        
        echo "<li class='timeline-item'>";
                
                switch ($linha['nemotecnico']) {
                  case "CRITICA":
                    echo "<div class='timeline-badge danger'><i class='glyphicon glyphicon-check'></i></div>";
                    break;
                  case "ALTA":
                    echo "<div class='timeline-badge warning'><i class='glyphicon glyphicon-check'></i></div>";
                    break;
                  case "MEDIA":
                    echo "<div class='timeline-badge primary'><i class='glyphicon glyphicon-check'></i></div>";
                    break;
                  case "BAIXA":
                    echo "<div class='timeline-badge success'><i class='glyphicon glyphicon-check'></i></div>";
                  break;    
                  
                  default:
                    echo "<div class='timeline-badge '><i class='glyphicon glyphicon-check'></i></div>";
                    break;
                }

echo "							
							<div class='timeline-panel'>
								<div class='timeline-heading'>
									<h4 class='timeline-title'>".$linha['titulo']."</h4>
									<p><small class='text-muted'><i class='glyphicon glyphicon-time'></i>".$linha['subtitulo']."</small></p>
								</div>
								<div class='timeline-body'>
									".$linha['descricao']."
								</div>
							</div>
						</li>";
              

      }

      
}



?>    	
     