$(document).ready(function(){
    
    // Function to setinterval and crear it.
    function dltMsg(){
        var startTime = new Date().getTime();
        var dltMsg = setInterval(function(){
            $('#msgAjax').empty();
            if (new Date().getTime() - startTime > 5000) {
                clearInterval(dltMsg);
            }
        }, 5000);
    }
    
    // Function with the values of the search form
    function frmValues(){
        return {'title': $('#myFormCreate input[name="title"]').val(), 'state': $('#myFormCreate select[name="state"]').val(), 'description': CKEDITOR.instances.description.getData()}; 
    }

    $('#myFormCreate').on('submit', function(event){
        event.preventDefault();
        // Variables
        var url = $('#myFormCreate').attr('action');
        
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
            data: frmValues(),
            url: url,
            success: function(res){
                if (res.success) {
                    $('#msgAjax').empty();
                    $('#msgAjax').append(
                        '<div class="alert alert-success col-12 text-center">' +
                            res.message +
                        '</div>'
                    );
                    dltMsg();
                    
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

