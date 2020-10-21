<?php include '../php/conexao.php';
$idUsuario = $_SESSION['idusuario'];
$sql = "SELECT tip.descricao ,COUNT(tar.id)FROM tarefa tar,tipo_tarefa tip WHERE tar.tipo_tarefa = tip.id and tar.data_tarefa = CURDATE() and tar.usuario = '$idUsuario' GROUP BY tip.descricao";

$stmt = $conexao->query($sql);
$contagem = $stmt->rowCount();
if($contagem >= 1){
$resultado = $stmt->fetchAll();




?>

<script type="text/javascript">
 





var arr = new Array();


 

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 	
 	

        var data = google.visualization.arrayToDataTable(<?php 


  echo "[['Tipos de Tarefas','Quantidades']";
foreach ($resultado as $value) {
 
	echo ",['".$value[0]."',".$value[1]."]";
	
}

	echo ']';



	?>);

        var options = {
          title: 'Quantidades de tarefas por Tipo',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }



    





    </script>


    <center><div id="donutchart" style="width: 900px; height: 500px;" class="border shadow p-3 mb-5 bg-white rounded"></div></center>

    <?php } ?>