<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema Educativa Daniel Salamanca </title>

    <!-- Bootstrap -->
    <link href="{{ asset('gentelella') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gentelella') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('gentelella') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    @stack('links')
    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella') }}/build/css/custom.min.css" rel="stylesheet">

</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('layouts.page_templates.authh')


        <!-- /page content -->

        <!-- footer content -->

    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('gentelella') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('gentelella') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('gentelella') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('gentelella') }}/vendors/nprogress/nprogress.js"></script>
    @stack('scripts')
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella') }}/build/js/custom.min.js"></script>

</body>
</html>
