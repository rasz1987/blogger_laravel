$(document).ready(function(){
    $('#myFormSearch').on('submit', function(event){
        event.preventDefault();
        
        $.ajax({
            method : "GET",
            url: "http://localhost/blogger_laravel/public/search",
            data: $('#myFormSearch').serialize()
        }).done(function(data){
            $('#table').html(data);
        });
    
    $(document).on('click', '#search .pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        console.log($(this).attr('href'));
        
        getBlogs(page);
    });

    function getBlogs(page) {
        $.ajax({
            method: 'GET',
            url: 'search?page=' + page
        }).done(function(data){
            console.log(data);
        });
    };


    
    /*var title = $('#title').val();
    

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
        */
    });

    
});

