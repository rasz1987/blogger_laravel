<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token()}}">
    
    <title>{{ config('app.name', 'Laravel')}}</title>
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <!--script-->
    <script src={{ asset("vendor/unisharp/laravel-ckeditor/ckeditor.js") }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"> </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    
    
       
</head>
<body>
    <header>
        @include('inc.navbar')
    </header>

    <section>
        <div id="body" class="container mt-5">
        @include('inc.messages')
        @yield('content')
        </div>
    </section>

    <footer>
        <script src="../resources/js/scripts.js"></script>
    </footer>
    
    
    
</body>
</html>