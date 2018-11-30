$(document).ready(function(){
    var title = $('#title').val();

    /*let dados={
        "title":$('#title').val(),
    }*/

    $('#search').on('click', function(event){
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method : "POST",
            url: "http://localhost/blogger_laravel/public/Blog/search",
            data: $('#myForm').serialize(),
            success: function(res){
                alert(res);
                console.log(res);
            },
            error: function(re){
                alert(re);
                
            }
        });
    });
});

