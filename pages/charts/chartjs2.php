<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ./dumpsys/login.php");
        ob_end_flush();
        exit();
}
$path = $_SERVER['DOCUMENT_ROOT'].'/dumpsys/pages/sources/function.php';
include_once($path); 
$st_own = get_st_own();
$pr_own = get_pr_own();
$popu_total = number_format(pop_total(),0,'',',');
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منظومة المكبات | التقارير</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dumpsys/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dumpsys/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/dumpsys/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/dumpsys/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/dumpsys/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-mini">
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="direction: rtl; text-align: left; display: block; ">
                    <div class="col-sm-6">
                        <h1>تقرير عام</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    

                    <div class="col-12">
                        <div class="card">
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
                                            <td><?php echo municipality() ?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات</td>
                                            <td><?php echo dumps() ?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات العاملة</td>
                                            <td><?php echo work_dumps()?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات المقفلة</td>
                                            <td><?php print stop_dumps() ?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات قيد الدراسة</td>
                                            <td> <?php echo suggestion_dumps()?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات قيد الإجراء</td>
                                            <td> <?php echo in_process_dumps()?>
                                        </tr>
                                        <tr>
                                            <td>عدد المكبات قيد الإنشاء</td>
                                            <td><?php echo un_cons_dumps()?>
                                        </tr>
                                        <tr>
                                            <td>شركة الخدمات العامة</td>
                                            <td><?php echo get_company()?>
                                        </tr>
                                        <tr>
                                            <td>إجمالي عدد السكان</td>
                                            <td><?php echo $popu_total ?>
                                        </tr>
                                        <tr>
                                            <td>عدد البلديات التي لا يوجد بها مكب نهائي</td>
                                            <td><?php echo woe_dumps() ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col (RIGHT) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
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
    <script src="/dumpsys/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dumpsys/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   
    <!-- DataTables  & Plugins -->
    <script src="/dumpsys/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dumpsys/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dumpsys/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/dumpsys/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/dumpsys/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/dumpsys/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/dumpsys/plugins/jszip/jszip.min.js"></script>
    <script src="/dumpsys/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/dumpsys/plugins/pdfmake/vfs_fonts.js"></script>
    
    <script src="/dumpsys/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/dumpsys/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/dumpsys/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Digital Goods',
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
                    label: 'Electronics',
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
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'طرابلس',
                'بنغازي',
                'تاجوراء',
                'جادو',
                'يفرن',
                'الجفرة',
            ],
            datasets: [{
                data: [700, 500, 400, 600, 300, 100],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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
        var pieData = donutData;
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
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
            labels: ['ملكية المكبات'],
            datasets: [{
                    label: 'الدولة',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo get_st_own() ?>]
                },
                {
                    label: 'خاص',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo $pr_own ?>]
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

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
    </script>
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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