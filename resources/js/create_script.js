$(document).ready(function(){
    $('#myFormCreate').on('submit', function(event){
        var url = $('#myFormCreate').attr('action');
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method : "POST",
            dataType: 'json',
            url: url,
            data: $('#myFormCreate').serialize(),
            success: function(res){
                alert(res);
                console.log(res);
            },
            error: function(res){
                function showErrorr(){
                    $.each(res.responseJSON['errors'], function(key, value){
                        alert(value[0]);
                    });
                };
                return showError();

            }
        });
    });

    
});

