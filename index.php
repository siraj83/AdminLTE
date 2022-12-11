<?php
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: /login");
        ob_end_flush();
        exit();
}

include "../dumpsys/pages/sources/function.php" ;
// if (!isset($_SESSION['username']) || empty($_SESSION['username'])){
//     header('location: login.php');
//     ob_end_flush();
//     exit();
// }
// $_SESSION['username'] =$value;
$user = $_SESSION['username'];
$permission = qury_free("SELECT permission_id from users where username = '$user'");
$total = number_format(get_pop_total(),0,'',',') ;
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>المنصة الرقمية لإدارة المخلفات | لوحةالتحكم</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/dumpsys/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/dumpsys/dist/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/dumpsys/dist/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/dumpsys/dist/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/dumpsys/dist/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
        <!-- Custom Style -->
    <link rel="stylesheet" href="/dumpsys/dist/css/custom.css">
</head>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <!-- layout-navbar-fixed layout-footer-fixed     -->

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dumpsys/dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white flex-row-reverse navbar-light">
            <!-- style="margin-left: 0px;" -->

            <!-- Left navbar links -->
            <!-- Trigger main sidebar  -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="main_links navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"-->
                <!--        role="button" style="float: left;">-->
                <!--        <i class="fas fa-bars"></i>-->
                <!--    </a>-->
                <!--</li>-->
            </ul>
        </nav>
        <!-- /.navbar -->

    <?php include sidebar; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;">
            <!-- style="margin-left: 0px;" -->
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2" style="direction: rtl;text-align: center;display: block;">
                        <div class="col-sm-6" style="text-align: left;">
                            <h1 class="m-0">لوحة العرض</h1>
                        </div>
                        <div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section>

            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row cat_row" style="direction: rtl;">

                        <div class="col-lg-3 col-6">
                            <!-- style="float: left;" -->
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo get_municipality() ?></h3>
                                    <p>البلديات</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <h3> <?php echo get_company() ?><sup style="font-size: 25px"></sup></h3>

                                    <p>شركات الخدمات العامة</p>

                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-truck-moving"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo get_mun_wod() ?><sup style="font-size: 25px"></sup></h3>
                                    <p>بلديات بدون مكب</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $total ?></h3>

                                    <p> إجمالي عدد السكان</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!--<div class="col-lg-3 col-6">-->
                        <!-- small box -->
                        <!--    <div class="small-box bg-warning">-->
                        <!--        <div class="inner">-->
                        <!--            <h3><?php echo $total ?></h3>-->

                        <!--            <p>السكان المشمولين بالخدمة</p>-->
                        <!--        </div>-->
                        <!--        <div class="icon">-->
                        <!--            <i class="nav-icon fas fa-users"></i>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3> <?php echo get_work_dumps() ?><sup style="font-size: 25px"></sup></h3>

                                    <p>مكب يعمل</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-dumpster"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo get_stop_dumps() ?></h3>

                                    <p>مكب لا يعمل</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-dumpster"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->

                            <!-- /.card -->


                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->

                <section>
                    <div class="callout fluid" style="direction: rtl;text-align: center;display: block;">
                        <div class="card-header">
                            <label class="card-title" style="float: right;" font-weight: bold;>مواقع
                                المكبات</label>
                        </div>
                        <!-- <div class="row invoice-info" style="position: center;">  -->
                        <div class="mapform">
                            <!-- <div class="row" style="padding: 10px 210px 10px 180px">
                                <div class="col-6" style="text-align: center;">
                                    <label> خط العرض</label>
                                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat"
                                        readonly>
                                </div>
                                <div class="col-6" style="text-align: center;">
                                    <label> خط الطول </label>
                                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng"
                                        readonly>
                                </div>
                            </div> -->

                            <div id="map" style="height:500px; width: 900px; max-width:100% ; margin:auto" class="my-3"></div>

                            <?php
                            include '../dumpsys/pages/map/map.php';
                                                      ?>
                        </div>
                        <!-- </div> -->
                    </div>
                </section>
                <!-- /.content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row" style="direction: rtl;">
                            <div class="col-md-6">
                                <!-- PIE CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title" style="text-align: center;">البلديات حسب عدد السكان</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pieChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            <div class="col-md-6">
                                <!-- DONUT CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">الشركات حسب عدد البلديات</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- BAR CHART -->
                                <!-- <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Bar Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div> -->
                                <!-- /.card-body -->
                                <!-- </div> -->
                                <!-- /.card -->
                            </div>
                            <!-- /.col-md-6 -->
                            <div class="col-lg-6">
                                <div class="card" style="direction: rtl;">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <a href="javascript:void(0);">عرض التقرير</a>
                                            <h3 class="card-title">التعداد السكاني لـمدينة طرابلس</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-lg">$18,230.00</span>
                                            <span>Sales Over Time</span>
                                        </p>
                                        <p class="ml-auto d-flex flex-column text-right">
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> 33.1%
                                            </span>
                                            <span class="text-muted">Since last month</span>
                                        </p>
                                    </div> -->
                                        <!-- /.d-flex -->
                                        <br>
                                        <br>
                                        <div class="position-relative mb-4">
                                            <canvas id="sales-chart" height="200"></canvas>
                                        </div>

                                        <div class="d-flex flex-row justify-content-end">
                                            <span class="mr-2">
                                                <i class="fas fa-square text-primary"></i> تعداد السكان وفق الوزارة
                                            </span>

                                            <span>
                                                <i class="fas fa-square text-gray"></i> تعداد السكان وفق الإستبيان
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section>
                    <div class="container-fluid" style="direction: rtl;">
                        <!-- /.card -->
                        <!-- Main content -->
                        <div class="col-12">
                            <div class="card" style="direction: rtl;">
                                <div class="card-header">
                                    <h3 class="card-title" style="float: right;">تقرير إجماليات</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover"
                                        style="text-align: right;">
                                        <thead>
                                            <tr>
                                                <th>البيان</th>
                                                <th>العدد</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>عدد البلديات</td>
                                                <td><?php echo get_municipality() ?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات</td>
                                                <td><?php echo get_dumps() ?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات العاملة</td>
                                                <td><?php echo get_work_dumps()?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات المقفلة</td>
                                                <td><?php print get_stop_dumps() ?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات قيد الدراسة</td>
                                                <td> <?php echo get_suggestion_dumps()?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات قيد الإجراء</td>
                                                <td> <?php echo get_in_process_dumps()?>
                                            </tr>
                                            <tr>
                                                <td>عدد المكبات قيد الإنشاء</td>
                                                <td><?php echo get_un_cons_dumps()?>
                                            </tr>
                                            <tr>
                                                <td>عدد البلديات التي لا يوجد بها مكب</td>
                                                <td><?php echo get_woe_dumps() ?>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <a href="../dumpsys/pages/tables/com_list.php">
                                                        شركات الخدمات العامة
                                                    </a>
                                                </td>
                                                <td><?php echo get_company()?>
                                                    </a>
                                            </tr>
                                            <tr>
                                                <td>إجمالي عدد السكان</td>
                                                <td><?php echo $total ?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div>
                </section>
        </div>

<!-- Control sidebar content goes here -->
        <!--<aside class="control-sidebar control-sidebar-dark">-->
            
        <!--</aside>-->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>



    <script>
    $(function() {
        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'سالبة',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'موجبة',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'البلديات',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'شركات الخدمات',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        // barChartData.datasets[0] = temp1
        // barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

    })
    </script>
    <script>
    $(function() {
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'شركة خدمات الجفارة',
                'شركة خدمات طرابلس',
                'شركة خدمات المرقب',
                'شركة خدمات الساحل الغربي',
                'شركة خدمات نالوت',
                'شركة خدمات درنة'
            ],
            datasets: [{
                data: [13, 6, 5, 8, 8, 6],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                'طرابلس المركز',
                'مصراتة',
                ' وادي البوانيس',
                'إدري الشاطئ',
                'غريان',
                'سبها',
                'طبرق'
            ],
            datasets: [{
                data: [160572, 333739, 25494, 56500, 118889, 139548, 154404],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#007bff', '#00c0ef', '#3c8dbc',
                    '#d2d6de'
                ],
            }]
        }
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    })
    </script>
    <!-- Page specific script -->
    <!-- <script>
  $(function (){
     //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
      label               : 'Digital Goods',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [28, 48, 40, 19, 86, 27, 90]
    },
    {
      label               : 'Electronics',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [65, 59, 80, 81, 56, 55, 40]
    },
  ]
}
    // var temp0 = barChartData.datasets[0]
    // var temp1 = barChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

   // Get context with jQuery - using jQuery's .get() method.
   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
      label               : 'Digital Goods',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [28, 48, 40, 19, 86, 27, 90]
    },
    {
      label               : 'Electronics',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [65, 59, 80, 81, 56, 55, 40]
    },
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: false
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      }
    }],
    yAxes: [{
      gridLines : {
        display : false,
      }
    }]
  }
}

 // This will get the first returned node in the jQuery collection.
 new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

  })
</script> -->
    <script>
    $(function() {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true
        var $salesChart = $('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['طرابلس المركز', 'حي الاندلس', 'سوق الجمعة', 'تاجوراء', 'عين زارة', 'ابوسليم'],
                datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [<?php echo qury_w1('popu_ministry','municipalities','id','1') ?>,
                            <?php echo qury_w1('popu_ministry','municipalities','id','2') ?>,
                            <?php echo qury_w1('popu_ministry','municipalities','id','3') ?>,
                            <?php echo qury_w1('popu_ministry','municipalities','id','4') ?>,
                            <?php echo qury_w1('popu_ministry','municipalities','id','5') ?>,
                            <?php echo qury_w1('popu_ministry','municipalities','id','6') ?>
                        ]
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [<?php echo qury_w1('popu_questionnaire','municipalities','id','1') ?>,
                            <?php echo qury_w1('popu_questionnaire','municipalities','id','2') ?>,
                            <?php echo qury_w1('popu_questionnaire','municipalities','id','3') ?>,
                            <?php echo qury_w1('popu_questionnaire','municipalities','id','4') ?>,
                            <?php echo qury_w1('popu_questionnaire','municipalities','id','5') ?>,
                            <?php echo qury_w1('popu_questionnaire','municipalities','id','6') ?>
                        ]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,

                            // Include a dollar sign in the ticks
                            callback: function(value) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }

                                return value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    });
    </script>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>


</body>

</html>