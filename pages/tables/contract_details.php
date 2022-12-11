<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include('../sources/function.php');
   $cont_id = $_POST['show_button'];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | عقد المكب</title>

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
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script> -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include sidebar; ?>
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;text-align: center;display: block;margin-right: 250px;">
                        <div class="col-sm-6" style="text-align: left;">
                            <h1>بيانات العقد</h1>
                        </div>
                        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">جداول البيانات</li>
            </ol>
          </div> -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section>
                <div class="container" style="margin: 20px;">
                    <div class="row">
                        <form action="../sources/function.php" id="form2" name="form2" method="POST">
                            <button id="delete_mun" name="delete_mun"
                                onclick="return confirm('هل تريد فعلآ حذف البيانات؟')" type="submit"
                                value="<?php print $cont_id ?>" class="btn btn-danger" href="#"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                        <form action="../forms/update_municipality.php" method="$_POST">
                            <div class="col">
                                <button class="btn btn-primary" name="edit_mun" value="<?php print $cont_id ?>"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                        </form>
                        <!-- <form action="../charts/mun_report.php" id="repot" name="report" method="POST">
                            <button class="btn btn-success" id="mun_report" name="mun_report"
                                value="<?php print $cont_id ?>"><i class="fas fa-chart-pie"></i></button>
                        </form> -->
                        </form>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;margin-right: 250px;">
                        <div class="col-12">
                            <!-- <div class="callout callout-info" style="direction: rtl;margin-right: 250px;">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->
                            <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;" font-weight: bold;>بيانات
                                        التعاقد</label>
                                </div>
                                <div class="row invoice-info" style="text-align: right;">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'عنوان التعاقد','name');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'رقم التعاقد','no_contract');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'الشركة المنفذة','co_implement');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'قيمة العقد الأصلية','contract_value');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'السعة التخزينية للمكب بالمتر المكعب','size');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'عدد السكان 2018','population');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'كمية المخلفات الصلبة المتولدة خلال سنه / بالطن','waste_amount');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `contract` where ID = $cont_id",'العمر الافتراضي للخلية بالسنة','EOL');
                       ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>

                        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
                        <!-- <script src="https://assets/"></script> -->

                        <!-- /.card -->
                        <!-- <button class="tr">Click me</button> -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
</body>

</html>