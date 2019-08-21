<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soho - Chat and Discussion Platform</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dist/media/img/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Soho css -->
    <link rel="stylesheet" href="{{ asset('dist/css/soho.min.css') }}">


    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

</head>

<body class="form-membership">
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dist/js/soho.min.js') }}"></script>
    <script src="{{ asset('dist/js/examples.js') }}"></script>
    <script>
        $("body").on('DOMSubtreeModified', "#app", function() {
            var current_path = window.location.pathname;
            var check_path = ["/register", "/login", "/reset"];
            var result = (check_path.indexOf(current_path) > -1);
            if (result == false) {
                if ($("body").hasClass("form-membership")) {
                    $("body").removeClass("form-membership")
                }
            }
            if (result == true) {
                if (!$("body").hasClass("form-membership")) {
                    $("body").addClass("form-membership")
                }
            }
        });
    </script>
</body>

</html>