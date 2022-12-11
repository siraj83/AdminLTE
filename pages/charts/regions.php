<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include'../sources/function.php';
$st_own = get_st_own();
$pr_own = get_pr_own();
$popu_total = number_format(pop_total(),0,'',',');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | إحصائيات حول المناطق الثلاث</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-mini">
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="direction: rtl; text-align: center; display: block;">
                    <br>
                    <h1>إحصائيات حول المناطق الثلاثة (الغربية _ الشرقية _ الجنوبية)</h1>
                    <br>
                </div>
            </div><!-- /.container-fluid -->
            <form action="/r-report">
                <div class="col">
                    <button class="btn btn-primary"><i class="fas fa-file-alt"> تقرير تفصيلي</i></button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <!-- WES Section -->
        <section class="content">
            <div class="container-fluid" style="direction: rtl;">
                <br>
                <h4 style="text-align: right;"> المنطقة الغربية</h4>
                <br>
            </div>
            <div class="content">
                <div class="row" style="direction: rtl;">
                    <div class="col-6 col-md-4">

                        <!-- PIE CHART WES-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">حالة المكبات</h3>
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
                                <canvas id="pieChart_WES"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">مقارنة المكبات والبلديات</h3>

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
                                    <canvas id="barChart_WES"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تعداد السكان</h3>

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
                                    <canvas id="popu_WES"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>

        <!-- EST Section -->
        <section class="content">
            <div class="container-fluid" style="direction: rtl;">
                <br>
                <h4 style="text-align: right;"> المنطقة الشرقية</h4>
                <br>
            </div>
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    <div class="col-6 col-md-4">
                        <!-- PIE CHART EST-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">حالة المكبات</h3>

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
                                <canvas id="pieChart_EST"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">مقارنة المكبات والبلديات</h3>
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
                                    <canvas id="barChart_EST"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تعداد السكان</h3>

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
                                    <canvas id="popu_EST"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- SOU Section -->
        <section class="content">
            <div class="container-fluid" style="direction: rtl;">
                <br>
                <h4 style="text-align: right;">المنطقة الجنوبية</h4>
                <br>
            </div>
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    <div class="col-6 col-md-4">
                        <!-- PIE CHART SOU-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">حالة المكبات </h3>

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
                                <canvas id="pieChart_SOU"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">مقارنة المكبات والبلديات </h3>

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
                                    <canvas id="barChart_SOU"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6 col-md-4">
                        <!-- BAR CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تعداد السكان</h3>
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
                                    <canvas id="popu_SOU"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid" style="direction: rtl;">
                <br>
                <h4 style="text-align: right;"> مقارنات المناطق الثلاث</h4>
                <br>
            </div>
            <div class="content">
                <div class="row" style="direction: rtl;">
                    <div class="col-6 col-md-4">
                        <!-- PIE CHART WES-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">عدد السكان وفق الوزارة</h3>
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
                                <canvas id="pieChart_popu_mun"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-6 col-md-4">
                        <!-- PIE CHART WES-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">عدد السكان وفق الاستبيان</h3>
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
                                <canvas id="pieChart_popu_ques"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-6 col-md-4">
                        <!-- PIE CHART WES-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">الكميات اليومية</h3>
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
                                <canvas id="pieChart_a_d_waste"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="content">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl; margin-right: 250px;">
                        <div class="col-md-6">


                        </div> -->


        <!-- /.col (LEFT) -->
        <!-- <div class="col-md-6">


                        </div>


                    </div>
                    /.container-fluid -->
        <!-- </section> -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Add Content Here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        // var areaChartData = {
        //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        //     datasets: [{
        //             label: 'Digital Goods',
        //             backgroundColor: 'rgba(60,141,188,0.9)',
        //             borderColor: 'rgba(60,141,188,0.8)',
        //             pointRadius: false,
        //             pointColor: '#3b8bba',
        //             pointStrokeColor: 'rgba(60,141,188,1)',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(60,141,188,1)',
        //             data: [28, 48, 40, 19, 86, 27, 90]
        //         },
        //         {
        //             label: 'Electronics',
        //             backgroundColor: 'rgba(210, 214, 222, 1)',
        //             borderColor: 'rgba(210, 214, 222, 1)',
        //             pointRadius: false,
        //             pointColor: 'rgba(210, 214, 222, 1)',
        //             pointStrokeColor: '#c1c7d1',
        //             pointHighlightFill: '#fff',
        //             pointHighlightStroke: 'rgba(220,220,220,1)',
        //             data: [65, 59, 80, 81, 56, 55, 40]
        //         },
        //     ]
        // }

        // var areaChartOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        //     legend: {
        //         display: false
        //     },
        //     scales: {
        //         xAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }],
        //         yAxes: [{
        //             gridLines: {
        //                 display: false,
        //             }
        //         }]
        //     }
        // }

        // This will get the first returned node in the jQuery collection.
        // new Chart(areaChartCanvas, {
        //     type: 'line',
        //     data: areaChartData,
        //     options: areaChartOptions
        // })

        //-------------
        //- LINE CHART -
        //--------------
        // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        // var lineChartOptions = $.extend(true, {}, areaChartOptions)
        // var lineChartData = $.extend(true, {}, areaChartData)
        // lineChartData.datasets[0].fill = false;
        // lineChartData.datasets[1].fill = false;
        // lineChartOptions.datasetFill = false

        // var lineChart = new Chart(lineChartCanvas, {
        //     type: 'line',
        //     data: lineChartData,
        //     options: lineChartOptions
        // })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        // var donutData = {
        //     labels: [
        //         'Chrome',
        //         'IE',
        //         'FireFox',
        //         'Safari',
        //         'Opera',
        //         'Navigator',
        //     ],
        //     datasets: [{
        //         data: [700, 500, 400, 600, 300, 100],
        //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        //     }]
        // }
        // var donutOptions = {
        //     maintainAspectRatio: false,
        //     responsive: true,
        // }
        // //Create pie or douhnut chart
        // // You can switch between pie and douhnut using the method below.
        // new Chart(donutChartCanvas, {
        //     type: 'doughnut',
        //     data: donutData,
        //     options: donutOptions
        // })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_WES').get(0).getContext('2d')
        var pieData = {
            labels: ['مكب يعمل', 'مكب متوقف', 'قيد الإنشاء', 'قيد الإجراء', 'مقترح قيد الدراسة'],
            datasets: [{
                data: [<?php echo qury_ww('COUNT(id)','dumps','status_id','1','region','1')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','2','region','1')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','3','region','1')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','4','region','1')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','5','region','1')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
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

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_EST').get(0).getContext('2d')
        var pieData = {
            labels: ['مكب يعمل', 'مكب متوقف', 'قيد الإنشاء', 'قيد الإجراء', 'مقترح قيد الدراسة'],
            datasets: [{
                data: [<?php echo qury_ww('COUNT(id)','dumps','status_id','1','region','2')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','2','region','2')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','3','region','2')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','4','region','2')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','5','region','2')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
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

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_SOU').get(0).getContext('2d')
        var pieData = {
            labels: ['مكب يعمل', 'مكب متوقف', 'قيد الإنشاء', 'قيد الإجراء', 'مقترح قيد الدراسة'],
            datasets: [{
                data: [<?php echo qury_ww('COUNT(id)','dumps','status_id','1','region','3')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','2','region','3')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','3','region','3')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','4','region','3')?>,
                    <?php echo qury_ww('COUNT(id)','dumps','status_id','5','region','3')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef', '#3c8dbc']
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

        //-------------
        //- BAR CHART_popu_WES -
        //-------------
        var barChartCanvas = $('#barChart_WES').get(0).getContext('2d')
        var barChartData = {
            labels: ['عدد المكبات          عدد البلديات'],
            datasets: [{
                    label: 'عدد المكبات',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo qury_w('COUNT(id)','dumps','region','1') ?>]
                },
                {
                    label: 'عدد البلديات',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo qury_w('COUNT(id)','municipalities','region_id','1') ?>]
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

        //-------------
        //- BAR CHART_popu_EST -
        //-------------
        var barChartCanvas = $('#barChart_EST').get(0).getContext('2d')
        var barChartData = {
            labels: ['عدد المكبات          عدد البلديات'],
            datasets: [{
                    label: 'عدد المكبات',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo qury_w('COUNT(id)','dumps','region','2') ?>]
                },
                {
                    label: 'عدد البلديات',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo qury_w('COUNT(id)','municipalities','region_id','2') ?>]
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
        //-------------
        //- BAR CHART_popu_SOU -
        //-------------
        var barChartCanvas = $('#barChart_SOU').get(0).getContext('2d')
        var barChartData = {
            labels: ['عدد المكبات          عدد البلديات'],
            datasets: [{
                    label: 'عدد المكبات',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo qury_w('COUNT(id)','dumps','region','3') ?>]
                },
                {
                    label: 'عدد البلديات',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo qury_w('COUNT(id)','municipalities','region_id','3') ?>]
                },
            ]
        }
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

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
        //-------------
        //- BAR CHART_SOU -
        //-------------
        var barChartCanvas = $('#popu_WES').get(0).getContext('2d')
        var barChartData = {
            labels: ['وفق الوزارة          وفق الاستبيان'],
            datasets: [{
                    label: 'وفق الوزارة',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','1') ?>
                    ]
                },
                {
                    label: 'وفق الاستبيان',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','1') ?>
                    ]
                },
            ]
        }
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

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
        //-------------
        //- BAR CHART_SOU -
        //-------------
        var barChartCanvas = $('#popu_EST').get(0).getContext('2d')
        var barChartData = {
            labels: ['وفق الوزارة          وفق الاستبيان'],
            datasets: [{
                    label: 'وفق الوزارة',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','2') ?>
                    ]
                },
                {
                    label: 'وفق الاستبيان',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','2') ?>
                    ]
                },
            ]
        }
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

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
        //-------------
        //- BAR CHART_SOU -
        //-------------
        var barChartCanvas = $('#popu_SOU').get(0).getContext('2d')
        var barChartData = {
            labels: ['وفق الوزارة          وفق الاستبيان'],
            datasets: [{
                    label: 'وفق الوزارة',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','3') ?>]
                },
                {
                    label: 'وفق الاستبيان',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [
                        <?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','3') ?>
                    ]
                },
            ]
        }
        var temp0 = barChartData.datasets[0]
        var temp1 = barChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

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
        //---------------------
        //- PIE CHART - popu mun
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_popu_mun').get(0).getContext('2d')
        var pieData = {
            labels: ['المنطقة الغربية', 'المنطقة الشرقية', 'المنطقة الجنوبية'],
            datasets: [{
                data: [<?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','1')?>,
                    <?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','2')?>,
                    <?php echo qury_w('SUM(popu_ministry)','municipalities','region_id','3')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12']
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
        //---------------------
        //- PIE CHART - popu ques
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_popu_ques').get(0).getContext('2d')
        var pieData = {
            labels: ['المنطقة الغربية', 'المنطقة الشرقية', 'المنطقة الجنوبية'],
            datasets: [{
                data: [<?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','1')?>,
                    <?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','2')?>,
                    <?php echo qury_w('SUM(popu_questionnaire)','municipalities','region_id','3')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12']
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
        //---------------------
        //- PIE CHART - daily a_d_waste
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_a_d_waste').get(0).getContext('2d')
        var pieData = {
            labels: ['المنطقة الغربية', 'المنطقة الشرقية', 'المنطقة الجنوبية'],
            datasets: [{
                data: [<?php echo qury_w('SUM(a_d_waste)','municipalities','region_id','1')?>,
                    <?php echo qury_w('SUM(a_d_waste)','municipalities','region_id','2')?>,
                    <?php echo qury_w('SUM(a_d_waste)','municipalities','region_id','3')?>,
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12']
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
        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        // var stackedBarChartData = $.extend(true, {}, barChartData)

        // var stackedBarChartOptions = {
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     scales: {
        //         xAxes: [{
        //             stacked: true,
        //         }],
        //         yAxes: [{
        //             stacked: true
        //         }]
        //     }
        // }

        // new Chart(stackedBarChartCanvas, {
        //     type: 'bar',
        //     data: stackedBarChartData,
        //     options: stackedBarChartOptions
        // })
    })
    </script>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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