$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
  
  function openModal(json) {
    $('#titulo').val(json.titulo);
    $('#subtitulo').val(json.subtitulo);
    $('#descricao').val(json.descricao);
    if(json.h_inicio != '') {
      $('#hInicio').val(json.h_inicio);
      $('#hFim').val(json.h_fim);
    } else {
      $('#hInicio').val('--:--');
      $('#hFim').val('--:--');
    }
    $('#dataTarefa').val(json.data_tarefa);
    $('#tipoTarefa').text(json.tipo_tarefa);

    switch (json.nemotecnico) {
    case 'CRITICA':
      $("#modalHeader").css("background-color", "#D97373");
      break;
    case 'ALTA':
      $("#modalHeader").css("background-color", "#F0EE8D");
      break;
    case 'MEDIA':
      $("#modalHeader").css("background-color", "#5AA0CC");
      break;
    case 'BAIXA':
      $("#modalHeader").css("background-color", "#4CD9AC");
      break;
  }
    $('#myModal').modal('show');
  }

  function confirmDelete(json) {
    let flag = confirm('Tem certeza que deseja excluir a tarefa "' + json.titulo + '"?');
    if (flag) {
      location.href = "../php/excluirTarefa.php?id="+json.id;
    }
  }