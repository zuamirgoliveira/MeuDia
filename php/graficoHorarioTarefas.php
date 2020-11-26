<?php include '../php/conexao.php';
$idUsuario = $_SESSION['idusuario'];
$sql1 = "SELECT CASE WHEN count(id) IS NOT NULL THEN COUNT(id) ELSE 0 END AS QUANTIDADE from tarefa where ((h_inicio >= '00:00' and h_inicio <= '11:59') or (h_fim >='00:00' and h_fim <= '11:59')) and usuario = '$idUsuario'";

$stmt = $conexao->query($sql1);

$resultado1 = $stmt->fetchAll();

$sql2 = "SELECT CASE WHEN count(id) IS NOT NULL THEN COUNT(id) ELSE 0 END  from tarefa where ((h_inicio >= '12:00' and h_inicio <= '17:59') or (h_fim >='12:00' and h_fim <= '17:59')) and usuario = '$idUsuario'";

$stmt = $conexao->query($sql2);

$resultado2 = $stmt->fetchAll();

$sql3 = "SELECT CASE WHEN count(id) IS NOT NULL THEN COUNT(id) ELSE 0 END from tarefa where ((h_inicio >= '18:00' and h_inicio <= '23:59') or (h_fim >='18:00' and h_fim <= '23:59')) and usuario = '$idUsuario'";

$stmt = $conexao->query($sql3);

$resultado3 = $stmt->fetchAll();

?>

<script type="text/javascript">
 





var arr1 = new Array();


 

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 	
 	

        var data = google.visualization.arrayToDataTable(<?php 


  echo "[['Período','Quantidade']";

 
	echo ",['Manhã',".$resultado1[0][0]."]";
	echo ",['Tarde',".$resultado2[0][0]."]";
  echo ",['Noite',".$resultado3[0][0]."]";


	echo ']';



	?>);

        var options1 = {
          title: 'Quantidades de tarefas por Horário',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options1);
      }



    





    </script>


    <center><div id="donutchart1" style="width: 900px; height: 500px;" class="border shadow p-3 mb-5 bg-white rounded"></div></center>

   