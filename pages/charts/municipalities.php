<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: /dumpsys/login.php");
        ob_end_flush();
        exit();
}

$path = $_SERVER['DOCUMENT_ROOT'].'/dumpsys/pages/sources/function.php';
include_once($path); 
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | إحصائيات حول البلديات</title>

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
    <!-- Custom Style -->
    <link rel="stylesheet" href="/dumpsys/dist/css/custom.css">

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
                    <h1>إحصائيات حول البلديات</h1>
                    <br>
                </div>
                <form action="../tables/mun_report.php">
                    <div class="col">
                        <button class="btn btn-primary"><i class="fas fa-file-alt"> تقرير تفصيلي</i></button>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>

<br>
        <!-- Main content -->
        <!-- WES Section -->
        <section class="content">
            <!-- <div class="container-fluid" style="direction: rtl; margin-right: 250px;">
                <br>
                <br>
            </div> -->
            <div class="content">
                <div class="row" style="direction: rtl;">

                    <!-- First Part -->

                    <div class="col-6 col-md-4">

                        <!-- PIE CHART WES-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">من يتولى عملية الجمع المخلفات الصلبة</h3>
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
                                <canvas id="pieChart_Who_handle_coll"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART WES-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">من يتولى عملية النقل المخلفات الصلبة</h3>
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
                                <canvas id="pieChart_Who_handle_mov"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART transfer_station-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">محطة ترحيل بالبلدية</h3>
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
                                <canvas id="pieChart_transfer_station"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>

                    <!-- Second Part -->

                    <div class="col-6 col-md-4">

                        <!-- PIE CHART service_by-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تقدم خدمة الجمع عن طريق</h3>
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
                                <canvas id="pieChart_service_coll"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART service_by2-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">تقدم خدمة النقل عن طريق</h3>
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
                                <canvas id="pieChart_service_mov"
                                    style="min-height: 250px; height: 270px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART equi_station-->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">محطة ترحيل مجهزة</h3>
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
                                <canvas id="pieChart_equi_station"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- Third Part -->

                    <div class="col-6 col-md-4">

                        <!-- PIE CHART WES-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">الاسباب التي حالت دون قيام البلدية بالخدمة</h3>
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
                                <canvas id="pieChart_reasons"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- PIE CHART WES-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">البلديات التي لا تقدم الخدمة تقتصر على</h3>
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
                                <canvas id="pieChart_mun_role"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART WES-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">مستوى الخدمة الحالي</h3>
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
                                <canvas id="pieChart_service_level"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>

        </section>

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
    <!-- ChartJS -->
    <script src="/dumpsys/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dumpsys/dist/js/adminlte.min.js"></script>
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

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_Who_handle_coll').get(0).getContext('2d')
        var pieData = {
            labels: ['البلدية', 'الخدمات العامة', 'البلدية والخدمات', 'قطاع خاص'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_coll = 'البلدية'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_coll ='الخدمات العامة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_coll ='البلدية والخدمات'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_coll ='قطاع خاص'")?>
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef']
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
     var pieChartCanvas = $('#pieChart_Who_handle_mov').get(0).getContext('2d')
        var pieData = {
            labels: ['البلدية', 'الخدمات العامة', 'البلدية والخدمات', 'قطاع خاص'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_mov ='البلدية'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_mov ='الخدمات العامة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_mov ='البلدية والخدمات'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where who_handle_mov ='قطاع خاص'")?>
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef']
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
        var pieChartCanvas = $('#pieChart_service_coll').get(0).getContext('2d')
        var pieData = {
            labels: ['معداتها الخاصة', 'شراء الخدمة', 'مقاول بالباطن'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where service_coll_by = 'معداتها الخاصة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_coll_by = 'شراء الخدمة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_coll_by = 'مقاول بالباطن'")?>
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

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_service_mov').get(0).getContext('2d')
        var pieData = {
            labels: ['معداتها الخاصة', 'شراء الخدمة', 'مقاول بالباطن'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where service_mov_by = 'معداتها الخاصة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_mov_by = 'شراء الخدمة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_mov_by = 'مقاول بالباطن'")?>
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

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_transfer_station').get(0).getContext('2d')
        var pieData = {
            labels: ['لا يوجد', 'يوجد'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where transfer_station = 'لا يوجد'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where transfer_station = 'يوجد'")?>
                ],
                backgroundColor: ['#f56954', '#00a65a']
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
        //- PIE CHART - equi_station
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_equi_station').get(0).getContext('2d')
        var pieData = {
            labels: ['لا يوجد', 'يوجد'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where equi_station = 'لا يوجد'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where equi_station = 'يوجد'")?>,
                ],
                backgroundColor: ['#f56954', '#00a65a']
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
        //- PIE CHART - service_level
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_service_level').get(0).getContext('2d')
        var pieData = {
            labels: ['جيد جداً', 'جيد', 'متوسط', 'سيئ', 'سيء جداً'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where service_level = 'جيد جداً'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_level ='جيد'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_level ='متوسط'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_level ='سيئ'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where service_level ='سيء جداً'")?>
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
        //- PIE CHART - mun_role
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_mun_role').get(0).getContext('2d')
        var pieData = {
            labels: ['مشاركة في التشغيل', 'مشاركة في تخطيط', 'اشراف ومتابعة', 'متابعة فقط', 'ليس لها دور'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where mun_role = 'مشاركة في التشغيل'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where mun_role = 'مشاركة في تخطيط'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where mun_role = 'اشراف ومتابعة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where mun_role = 'متابعة فقط'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where mun_role = 'ليس لها دور'")?>
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
        //- PIE CHART - reasons
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart_reasons').get(0).getContext('2d')
        var pieData = {
            labels: ['قانونية', 'اشراف ومتابعة', 'مالية', 'فنية', 'أليات ومعدات'],
            datasets: [{
                data: [<?php echo qury_free2("SELECT COUNT(id) from municipalities where reasons = 'قانونية'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where reasons = 'اشراف ومتابعة'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where reasons = 'مالية'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where reasons = 'فنية'")?>,
                    <?php echo qury_free2("SELECT COUNT(id) from municipalities where reasons = 'أليات ومعدات'")?>
                ],
                backgroundColor: ['#00a65a', '#f56954', '#f39c12', '#00c0ef']
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


    });
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