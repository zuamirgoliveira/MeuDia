<!DOCTYPE html>
<html>
<head>
    

<?php 
session_start(); 
include '../import/tarefas.html';
?>

<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
  
  function openModal(json) {
    $('#titulo').val(json.titulo);
    console.log(json)
    $('#descricao').val(json.descricao);
    $('#hInicio').val(json.h_inicio);
    $('#hFim').val(json.h_fim);

    switch (json.nemotecnico) {
    case 'CRITICA':
      $("#modalHeader").removeClass().addClass('modal-header btn-danger');
      break;
    case 'ALTA':
      $("#modalHeader").removeClass().addClass('modal-header btn-warning');
      break;
    case 'MEDIA':
      $("#modalHeader").removeClass().addClass('modal-header btn-primary');
      break;
    case 'BAIXA':
      $("#modalHeader").removeClass().addClass('modal-header btn-success');
      break;
  }
    $('#myModal').modal('show');
  }
</script>


<title>Tarefas</title>

</head>
<body>

<!-- Menu-->
<?php include 'menu.php';?>
<main class="page-content">
    <div class="container-fluid">
		<div class="container">
			
			<!--tabela-->
			<?php include '../php/listarTarefa.php';?>
		</div>
	</div>
</main>
</body>
</html>