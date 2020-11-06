$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
  
  function openModal(json) {
    console.log(json);
    $('#descricao').text(json.descricao);

    if (json.liga_desliga == '0') {
      $("#modalHeader").css("background-color", "#4CD9AC");
    } else {
      $("#modalHeader").css("background-color", "#D97373");
    }


    if(json.h_inicio != '') {
      $('#hInicio').val(json.h_inicio);
      $('#hFim').val(json.h_fim);
    } else {
      $('#hInicio').val('--:--');
      $('#hFim').val('--:--');
    }

    $('#myModal').modal('show');
  }

  function confirmDelete(json) {
    let flag = confirm('Tem certeza que deseja excluir a tipo tarefa "' + json.descricao + '"?');
    if (flag) {
      location.href = "../php/excluirTipoTarefa.php?id="+json.id;
    }
  }