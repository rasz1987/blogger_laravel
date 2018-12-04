$(document).ready(function(){
    var title = $('#title').val();
    

    $('#myFormSearch').on('submit', function(event){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method : "POST",
            dataType: 'json',
            url: "http://localhost/blogger_laravel/public/Blog/search",
            data: $('#myFormSearch').serialize(),
            success: function(res){
                if(res.message['failed']){
                    $('#listSearch').empty();
                    $('#link').empty();
                    $('#link').append(
                        '<div class= "col-6 text-center">' +
                            '<h5 class="alert alert-danger">' +res.message['message']+ '</h5>' +
                        '</div>'
                    );
                } else {
                    $('#link').empty();
                    $('#listSearch').html(res.message);
                }
            },
            error: function(re){
                alert(re);
                console.log(re);
                
            }
        });
    });

    
});

