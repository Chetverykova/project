$(function() {

    alert(11111);

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#submit').click(function(){

        alert(22222);

        $.post('/search/transaction', $('#form').serialize(), function (data) {

            console.log(data);

        }, 'json');

    });

});