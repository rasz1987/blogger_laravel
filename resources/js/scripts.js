$(document).ready(function() {
    // *************Function to set a message***********
    function msg(val) {
        $msg = $('#msgAjax').empty(); +
                $('#msgAjax').append(
                    '<div class="alert alert-success col-12 text-center">' +
                        val +
                    '</div>');
        return  $msg;
    }
    // *************Function to set a message***********
    
    // Function clear the message with a setinterval and clear it.
    function dltMsg(){
        var startTime = new Date().getTime();
        var dltMsg = setInterval(function(){
            $('#msgAjax').empty();
            if (new Date().getTime() - startTime > 5000) {
                clearInterval(dltMsg);
            }
        }, 5000);
    }
    // Function clear the message with a setinterval and clear it.
    
    // ******************SCRIPT TO DELETE*******************************
    $(document).on('click', '#listSearch > tr > td > a', function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        var url= 'Blog/' + id;
        console.log($(this).data('id'));
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
                $(this).remove();
                console.log(data);
                msg(data.success);
                dltMsg();
            }
        });
    });
    //********************** */SCRIPT TO DELETE******************************
});