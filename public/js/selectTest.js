$(document).on('change', '#selectTest', function() {
    var value = $(this).val();

    $.ajax({
        method: 'GET',
        url: 'selectTest/' + value,
        data: value,
        dataType: 'json',
        success: function(data) {
            $('#otherTest').parent().replaceWith(data);
                 
    }})
})