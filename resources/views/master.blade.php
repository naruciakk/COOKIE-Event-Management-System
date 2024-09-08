<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Robert von Oliva">
    <title>Nazwa eventu</title>
    <link href="{{ URL::asset('layout/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('layout/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Skrót eventu
                    </a>
                </li>
                <li>
                    <a href="/#about_segment">O wydarzeniu</a>
                    <a href="/events">Program</a>
                    <a href="/panel">Panel uczestnika</a>
                    <a href="/auth/register"><strong>Zapisz się</strong></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <a href="#menu-toggle" class="btn btn-default menu-b" id="menu-toggle">Menu</a>

    </div>
    <!-- /#wrapper -->

    <script src="{{ URL::asset('layout/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('layout/js/bootstrap.min.js') }}"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>
