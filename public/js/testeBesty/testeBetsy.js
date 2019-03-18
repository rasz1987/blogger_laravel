
$(document).on('click', '#testeBetsy', function() {
    var url = 'testeBetsyJson';
    var succescalback = function(data) {
    $('#testeBetsy1').append('<h1>' +data['teste1']+ '</h1>'); 
    console.log(data['teste1']);

   };
    
    var errorCallback = function(data) {
        $('#testeBetsy').html(data);
    };

   request.get(url, null, succescalback, errorCallback );
});

$(document).on('click', '#testeSecondBetsy', function() {
    var url = 'testeSecondBetsy';
    var succescalback = function(data) {
     $('#testeBetsy1').append('<h1>' +data['seconteste3']+ '</h1>'); 
     console.log(data['seconTeste3']);
 
    };
     
     var errorCallback = function(data) {
         $('#testeBetsy').html(data);
     };
 
    request.get(url, null, succescalback, errorCallback );
 });