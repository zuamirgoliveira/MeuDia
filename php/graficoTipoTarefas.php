<?php include '../php/conexao.php';

$sql = "SELECT tip.descricao ,COUNT(tar.id)FROM tarefa tar,tipo_tarefa tip WHERE tar.tipo_tarefa = tip.id and tar.data_tarefa = CURDATE() GROUP BY tip.descricao";

$stmt = $conexao->query($sql);

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


    <div id="donutchart" style="width: 900px; height: 500px;"></div>

    <div id="donutchart1" style="width: 900px; height: 500px;"></div>