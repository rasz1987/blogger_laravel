$(document).ready(function(){
    function dltMsg() {
        setInterval(function(){$('#msgAjax').empty();}, 5000);
    }; 
    
    $('#myFormCreate').on('submit', function(event){
        event.preventDefault();
        // Variables
        var url = $('#myFormCreate').attr('action');
        var title = $('#myFormCreate input[name="title"]').val();
        var state = $('#myFormCreate select[name="state"]').val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var description = CKEDITOR.instances.description.getData();
        dltMsg();
        
        
        //Token CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //ajax
        $.ajax({
            method : "POST",
            dataType: 'json',
            data: {title:title, state:state, description:description},
            url: url,
            success: function(res){
                if (res.success) {
                    $('#msgAjax').empty();
                    $('#msgAjax').append(
                        '<div class="alert alert-success col-12 text-center">' +
                            res.message +
                        '</div>'
                    );
                    $('#myFormCreate')[0].reset();
                }
            },
            error: function(res){
                $('#msgAjax').empty();
                $.each(res.responseJSON['errors'], function(key, value){
                    $('#msgAjax').append(
                        '<div class="alert alert-danger col-12 text-center">' +
                            value[0] +
                        '</div>'
                    );
                })
            }
        });
        
    });

    
});

