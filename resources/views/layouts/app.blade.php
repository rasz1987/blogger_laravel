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
    
    <!--script-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src={{ asset("vendor/unisharp/laravel-ckeditor/ckeditor.js") }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <header>
        @include('inc.navbar')
    </header>

    <section>
        <div class="container mt-5">
        @include('inc.messages')
        @yield('content')
        </div>
    </section>

    <footer>

    </footer>
</body>
</html>