$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
  
  function openModal(json) {
    $('#titulo').val(json.titulo);
    $('#subtitulo').val(json.subtitulo);
    $('#descricao').val(json.descricao);
    $('#hInicio').val(json.h_inicio);
    $('#hFim').val(json.h_fim);
    $('#dataTarefa').val(json.data_tarefa);
    $('#tipoTarefa').text(json.tipo_tarefa);

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