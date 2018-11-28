<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSRF Token-->
    <meta name="csrf-token" content="{{ csrf_token()}}">

    <title>{{ config('app.name', 'Laravel')}}</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--script-->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <header>
        @include('inc.navbar')
    </header>

    <section>
        <div class="container">
        @yield('content')
        </div>
    </section>

    <footer>

    </footer>
</body>
</html>