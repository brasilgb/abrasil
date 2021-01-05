


$(function(){
    $('#input-busca').keyup(function(){
        term = $(this).val();
        _token = $("input[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: '{{ route("clientes.autocomplete") }}',
            data: {_token: _token, term: term}
        }).done(function(data){
            $.each(data.cliente, function(i,index){

            $('.autocomplete').show();
            $('.autocomplete > ul').append('<li id="cliente'+index.id_cliente+'"><a>' + index.cliente + '</a></li>');
            $('#cliente'+index.id_cliente+' > a').bind("click", function(){
                $("#term").val(index.cliente);
                $('.autocomplete').hide();
                $('.autocomplete').empty();
            });
        });
        });
        });
    });
});
