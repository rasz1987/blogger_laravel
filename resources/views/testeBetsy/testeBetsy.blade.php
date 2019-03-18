<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <meta name="csrf-token" content="{{ csrf_token()}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script> --}}
    
    <script src="{{ asset('js/app.js') }} "></script>


</head>
<body>
    <input type="button" id="testeBetsy" value="Teste Betsy">
    <br>
    <br>
    <input type="button" id="testeSecondBetsy" value="Second Teste">

    <div id="testeBetsy1">

    </div>

    {{--  Test for datepicker with flatpickr plugin  --}}
    <div class="row">
        <div class="col-12">
            <label for="datepickr">Datepickr-Teste: </label>
            <input type="text" name="datepickr" class="datePickr-flatpickr">
        </div>
        
    </div>
</body>
<footer>
    <script src="{{asset('js/component/request.js' )}} "></script>
    <script src="{{asset('js/testeBesty/testeBetsy.js')}} "></script>
    <script src="{{ asset('js/flapickr/datePicker.js') }} "></script>  
</footer>
</html>