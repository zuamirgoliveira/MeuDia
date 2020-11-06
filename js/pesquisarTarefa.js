$(document).ready(function(){

    $('#formPesquisa').click(function(){

        var dados = $(this).serialize();
            var dataInicio = $("#dataInicio").val();
            var dataFim = $("#dataFim").val();
            console.log(dataFim);
       if(dataInicio != null && dataFim != null){
      
        $('form').submit(function(){
            

            $.ajax({
                url: '../php/listarTarefaPorData.php',
                method: 'post',
                dataType: 'html',
                data: dados,
                success: function(data){
                	
                    $("#resultadoPesquisa").empty().html(data);
                   
                }
            });

            return false;
        });

        $('form').trigger('submit');
}
    });
});
