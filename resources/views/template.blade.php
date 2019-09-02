<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaravelApp</title>
    <link rel="stylesheet" href="{{asset('bootstrap-4-3-1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-4-3-1/css/bootswatch.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
</head>
<body>
    <div class="container">
        @include('navbar')
        @yield('main')
    </div>

    @yield('footer')
    <script src="{{asset('bootstrap-4-3-1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>