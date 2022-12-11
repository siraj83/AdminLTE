<?php

session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include '../sources/function.php';
include '../tables/table_insertable.php';
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | إستبيانات</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">
    </div>
    <div class="wrapper">
        <?php
  main_slide();
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: auto;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;text-align: center;display: block;">
                        </br>
                        </br>
                        <h1 class="m-0">الإستبيانات المتاحة</h1>
                        </br>
                        </br>
                        <div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <br>
            <br>

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row d-flex justify-content-center" style="direction: rtl;">
                        <!-- style="direction: rtl;margin-right: 250px;" -->
                        <div class="col-lg-3 col-6">
                            <!-- style="float: left;" -->
                            <!-- small box -->
                            <div class="small-box bg-info" onclick="location.href='../forms/Q_municipality.php'">
                                <div class="inner">
                                    <br>
                                    <p style="font-size: 25px; text-align:center;">البلديات الشريكة</p>
                                    <br>
                                </div>
                                <!-- <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div> -->
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-8" style="height: 250;">
                            <!-- small box -->
                            <div class="small-box bg-info" onclick="location.href='../forms/q_dumps.php'">
                                <div class="inner">
                                    <br>
                                    <p style="font-size: 25px; text-align:center;">حول المكبات لسنة 2022</p>
                                    <br>
                                </div>
                                <!-- <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-8" style="height: 250;">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <br>
                                    <p style="font-size: 25px; text-align:center;">عملية الفرز بنقاط التجميع</p>
                                    <br>
                                </div>
                                <!-- <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div> -->
                            </div>
                        </div>


                    </div>

                    <div class="row d-flex justify-content-center" style="direction: rtl;">
                        <div class="col-lg-3 col-6" style="height: 250;">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <br>
                                    <p style="font-size: 25px; text-align:center;">عملية الفرز في القطاع الخاص</p>
                                    <br>
                                </div>
                                <!-- <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-8" style="height: 250;">
                            <!-- small box -->
                            <div class="small-box bg-info" onclick="location.href='table.php'">
                                <div class="inner">
                                    <br>
                                    <p style="font-size: 25px; text-align:center;">الشاحنات او المعدات</p>
                                    </p>
                                    <br>
                                </div>
                                <!-- <div class="icon">
                                    <i class="nav-icon fas fa-gopuram"></i>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card -->
    </div>

    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- mulit select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    </div>
    </div>
</body>


</html>