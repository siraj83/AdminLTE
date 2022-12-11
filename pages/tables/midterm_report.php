<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include('../sources/function.php');
include '../tables/table_insertable.php';
   $mun_id = $_POST['show_button'];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | تقرير النصف سنوي</title>

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

    <?php table_insertable() ?>
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
                    <div class="row" style="direction: rtl;text-align: center;display: block;">
                        <div class="col-sm-6" style="text-align: left;">
                            </br>
                            <h1>تقرير النصف سنوي</h1>
                            </br>
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
            <!-- Main content -->
            <div class="col">
                <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i></button>
            </div>
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;">
                        <div class="col-12">
                                                    <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;">البيانات </label>
                                </div>
                                </br>
                                <div class="row invoice-info" style="text-align: right;">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'اسم البلدية','Mname');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `regions` where ID = (select region_id from `municipalities` where id= $mun_id)",'المنطقة','name');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'من يتولى حاليا عملية جمع المخلفات الصلبة بالبلدية','who_handle_coll');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'تتم خدمة جمع المخلفات بمعدات','service_coll_by');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'من يتولى حاليا عملية نقل المخلفات الصلبة للمكب','who_handle_mov');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'تتم خدمة جمع المخلفات بمعدات','service_mov_by');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'إجمالي عدد العاملين','all_workers');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد العاملين بالبلدية','mun_workers');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد العاملين بالشركة','com_workers');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد الورديات','shifts');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'وقت الوردية','shift_time');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'مستوى الخدمة','service_level');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",' التعاقد مع القطاع الخاص','contract_w_private');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'نوع التعاقد','contract_type');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'طريقة التعاقد','contract_method');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'متوسط المخلفات اليومية','a_d_waste');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'منوال الجمع','coll_mode');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'نقاط تجميع','transfer_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'نقاط التجميع مجهزة','equi_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'مستوى التجهيز','equi_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'محطة ترحيل بالبلدية','transfer_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'حالة المحطة ','transfer_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'تجهيز محطة ترحيل','equi_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'مستوى التجهيز','equi_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT GROUP_CONCAT(`name` SEPARATOR ' | ') as name from dumps where id =(SELECT dump_id from municipalities where id = $mun_id) ",'اسم المكب','0');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'بعد المسافة التقربية للمكب','Landfill_distance');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد الرحلات اليومية','shifts');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'دور البلدية حالياً ','mun_role');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'اهم المشاكل التي تواجه البلدية في عملية جمع ونقل المخلفات الصلبة','reasons');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'ملاحظات، أفكار، أراء','notes');
                        ?>
                                    </div>

                                </div>
                                <div class="container-lg">
                                    <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h2><b>بيانات الشاحنات المستخدمة </b></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>بيان شاحنات او المعدات</th>
                                                        <th>العدد</th>
                                                        <th>رقم الهيكل</th>
                                                        <th>تاريخ الصنع</th>
                                                        <th>الحالة الفنية</th>
                                                        <th>ملاحظات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');

                      $sql = "SELECT `name`, `number`, `structure_no`, `date`, `status`, `notes` FROM `trucks` where municipality_id=$mun_id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_array()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["name"] . "</td><td>" . $row["number"] . "</td><td>" . $row["structure_no"]."</td><td>" . $row["date"] . "</td><td>"  .$row["status"]. "</td><td>" .$row["notes"]. "</td></tr>"; ?>
                                                    <?php }
                        } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
    <!-- mulit select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
    </script>
</body>

</html>