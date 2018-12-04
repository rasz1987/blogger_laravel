$(document).ready(function(){
    $('#listSearch > tr > td ').on('click', 'a[href="#"]', function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(this).next().submit();
    });
});

