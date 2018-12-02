$(document).ready(function(){
    var title = $('#title').val();

    /*let dados={
        "title":$('#title').val(),
    }*/

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
                if(res.failed){
                    alert(res.message);
                }else{
                    console.log($.each(res, function(key , value ) {
                        <tr> +    
                            <td scope="row"><a href="{{ asset("Blog/" value.id )}}"> {{ value.title }}</a> </td> +
                            '<td>{{date_format (new DateTime(' +value.created_at+ '), "d-m-Y") }}</td> \n' +
                            '<td>{{' +value.description+ '}}</td> \n' + 
                        '</tr> \n'
                    }))
                    /*
                    $('#listSearch').empty();
                    $('#listSearch').prepend(
                        '<tbody> \n' + 
                            
                            $.each(res, function(key , value ) {
                                '<tr> \n' +    
                                    '<td scope="row "><a href="{{ asset("Blog/"' + value.id +')}} "> {{' + value.title + '}}</a> </td> \n' +
                                    '<td>{{date_format (new DateTime(' +value.created_at+ '), "d-m-Y") }}</td> \n' +
                                    '<td>{{' +value.description+ '}}</td> \n' + 
                                '</tr> \n'
                            }),
                                
                        '</tbody>'
                    )
                    */
                }
                
                
                /**/
                
                
            },
            error: function(re){
                alert(re);
                console.log(re);
                
            }
        });
    });

    
});

