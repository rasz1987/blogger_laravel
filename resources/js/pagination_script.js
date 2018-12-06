$(document).ready(function(){
    $(document).on('click', '#pag .pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getBlogs(page);
    });

    function getBlogs(page) {

        $.ajax({
            url: 'Blog?page=' + page
        
        }).done(function(data){
            $('#table').html(data);
            location.hash=page;
            
        });
    };
});

