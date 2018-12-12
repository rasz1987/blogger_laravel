$(document).ready(function(){
    $(document).on('click', '#listSearch > tr > td > a', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        var url= 'Blog/' + id;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {
                'id': id,
                
            },
            success: function(data){
                console.log(data);
                $('#msgAjax').empty();
                    $('#msgAjax').append(
                        '<div class="alert alert-success col-12 text-center">' +
                            data.success +
                        '</div>'
                    );
            }
        });
    });
});

