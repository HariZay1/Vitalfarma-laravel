<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      background-color: white; /* Fondo blanco para toda la página */
      margin: 0;
      padding: 0;
    }
    .content-area {
      background-color: white; /* Asegura que el área de contenido también tenga fondo blanco */
      padding: 100px;
      border-radius: 5px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VITALFARA </title>
  @stack('css-datatable')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  @stack('css')
  <link href="<?php echo asset('admin') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('admin') ?>/css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo asset('admin') ?>/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo asset('admin') ?>/css/floatexamples.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo asset('admin') ?>/js/jquery.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/nprogress.js"></script>

  <link href="<?php echo asset('admin') ?>/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset('admin') ?>/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />


  <script type="text/javascript" src="<?php echo asset('alert') ?>/lib/alertify.js"></script>
  <link rel="stylesheet" href="<?php echo asset('alert') ?>/themes/alertify.core.css" />
  <link rel="stylesheet" href="<?php echo asset('alert') ?>/themes/alertify.default.css" />
</head>

<body class="nav-md">
      
    <x-navigation-header />

    <div id="layoutSidenav">

        <x-navigation-menu />

        <div id="layoutSidenav_content">

            <main class="content-area">
                @yield('contenido')
            </main>

            <x-footer />

        </div>
  
  </div>
 

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  <script src="{{ asset('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="<?php echo asset('admin') ?>/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/gauge/gauge_demo.js"></script>
  <script src="<?php echo asset('admin') ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/icheck/icheck.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/datepicker/daterangepicker.js"></script>
  <script src="<?php echo asset('admin') ?>/js/chartjs/chart.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/custom.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/dataTables.bootstrap.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-keytable').DataTable({
        keys: true
      });
      $('#datatable-responsive').DataTable();
      $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
      });
      var table = $('#datatable-fixed-header').DataTable({
        fixedHeader: true
      });
    });
    TableManageButtons.init();
  </script>



</body>

</html>
