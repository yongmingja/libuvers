<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ url('assets/images/favicon-32x32.png') }}" type="image/png" />
        <!-- loader-->
        <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet">
        <title>{{ env('APP_NAME') }}</title>
    </head>

    <body class="bg-login">
        <!--end wrapper-->
        <div class="wrapper">
            @yield('wrapper')
            @include('sweetalert::alert')
        </div>
        <!--plugins-->
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script>
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        </script>
    </body>
</html>
