<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Shoping Cart Admin Theme</title>
    <!-- Bootstrap Core CSS SB Admin 2 - Bootstrap Admin Theme-->
    <link href="{!! asset('public/theme/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{!! asset('public/theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('public/theme/dist/css/sb-admin-2.css') !!}" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{!! asset('public/theme/vendor/morrisjs/morris.css') !!}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{!! asset('public/theme/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{!! asset('public/theme/vendor/datatables-plugins/dataTables.bootstrap.css') !!}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{!! asset('public/theme/vendor/datatables-responsive/dataTables.responsive.css') !!}" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        @guest
        @else
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('theme.header')
            @include('theme.sidebar')
        </nav>
        @endguest
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{!! asset('public/theme/vendor/jquery/jquery.min.js') !!}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('public/theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('public/theme/vendor/metisMenu/metisMenu.min.js') !!}"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('public/theme/vendor/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('public/theme/vendor/morrisjs/morris.min.js') !!}"></script>
    <script src="{!! asset('public/theme/data/morris-data.js') !!}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('public/theme/dist/js/sb-admin-2.js') !!}"></script>
    @yield('scripts')
</body>
</html>