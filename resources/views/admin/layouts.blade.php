<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('sbadmin2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('sbadmin2/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('sbadmin2/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('sbadmin2/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('sbadmin2/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('sbadmin2/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.menu')

        @yield('content')

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('sbadmin2/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('sbadmin2/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('sbadmin2/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('sbadmin2/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('sbadmin2/dist/js/sb-admin-2.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
