function deleteRegistroPaginacao(rotaUrl, idRegistro){
    if( confirm('Deseja excluir o Registro?') ){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: idRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 2000,
                });
            },

        }).done(function(data){
            $.unblockUI();
            console.log(data);
            if( data.success ){
                window.location.reload();
            }else{
                alert('FALHA.. Desculpe. Nao foi possivel excluir.');
            }

        }).fail(function(data){
            $.unblockUI();
            alert('ERROR.. Desculpe. Tente Novamente se quiser.');
        });
    }
}