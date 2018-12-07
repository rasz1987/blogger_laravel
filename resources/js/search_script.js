$(document).ready(function(){
    var url = 'http://localhost/blogger_laravel/public/';
    
    
    // Function to take all the values in the form
    function state(){
        return  {"state": $('#state').val(),"title": $('#title').val(), "date":$('#date').val()};
    }

    // Function to send a get blogs info
    function getBlogs(page) {
        $.ajax({
            method: 'GET',
            url: 'search?page=' + page,
            data: state()
        }).done(function(data){
            $('#table').html(data);
        });
    };
    
    // Function to submit the form on change the select 
    $('#myFormSearch').on('change', '#state', function(event){
        event.preventDefault();
        
        $.ajax({
            method : "GET",
            url: url + 'search',
            data: state()
            //data: $('#myFormSearch').serialize()
        }).done(function(data){
            $('#table').html(data);
        });
    });

    //Function to change the page in the pagination
    $(document).on('click', '#search .pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        
        getBlogs(page);
    });

    //function to load the page when click in the input title
    $('#myFormSearch').on('click', '#title', function(){
        var url = ''
        $(location).attr('href');
    });
    
});

