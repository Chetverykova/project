$(function() {

    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#submit').click(function(){

        alert('111');

        $.post('/search/transaction', $('#form').serialize(), function (data) {



        }, 'json');

    });

});