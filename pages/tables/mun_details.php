<?php 

session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include('../sources/function.php');
$user = $_SESSION['username'];
$permission = qury_free2("SELECT permission_id from users where username = '$user'");
   $mun_id = $_GET['show_button'];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | بيانات البلدية</title>

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

    <script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
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
                            <h1>بيانات البلدية</h1>
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
            <section>
                            <div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; display: block;">
                    <div class="row">
                        <?php if($permission == 1 || $permission == 3){  {?>
                        <form action="../sources/function.php" id="form2" name="form2" method="POST">
                            <button id="delete_mun" name="delete_mun"
                                onclick="return confirm('هل تريد فعلآ حذف البيانات؟')" type="submit"
                                value="<?php print $mun_id ?>" class="btn btn-danger" href="#"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                        <?php  }}  ?>
                        <form action="../forms/update_municipality.php" method="$_POST">
                            <div class="col">
                                <button class="btn btn-primary" name="edit_mun" value="<?php print $mun_id ?>"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                        </form>

                        <div class="col">
                            <button onclick="window.print()" class="btn btn-primary"><i
                                    class="fas fa-print"></i></button>
                        </div>

                        <form action="mun_list.php">
                            <div class="col" style="margin-right: 30px;">
                            <button class="btn btn-success"><i class="fas fa-sign-out-alt"></i></button>
                            </div>
                        </form>
                        <!-- <form action="../charts/mun_report.php" id="repot" name="report" method="POST">
                            <button class="btn btn-success" id="mun_report" name="mun_report"
                                value="<?php print $mun_id ?>"><i class="fas fa-chart-pie"></i></button>
                        </form> -->
                        </form>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;">
                        <div class="col-12">
                            <!-- <div class="callout callout-info" style="direction: rtl;margin-right: 250px;">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->
                            <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;">البيانات الأساسية</label>
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
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد السكان وفق الوزارة','popu_ministry');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد السكان وفق الإستبيان','popu_questionnaire');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                     get_details("SELECT * from `municipalities` where ID = $mun_id",'عدد المستهدفين بالخدمة (مواطنين)','popu_number_ly'); ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                     get_details("SELECT * from `municipalities` where ID = $mun_id",'عدد المستهدفين بالخدمة (أجانب)','popu_number_fu'); ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php 
                        get_details ("SELECT * from `service_companies` where ID =(select service_com_id from municipalities where ID = $mun_id)",'شركة الخدمات','Cname');
                      ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `regions` where ID = (select region_id from `municipalities` where id= $mun_id)",'المنطقة','name');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details2 ("SELECT GROUP_CONCAT(`name` SEPARATOR ' | ') FROM `mun_nh` WHERE municipality= $mun_id",'المنطقة المشمولة بالخدمة');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'الحد الأقصى المتوقع للمخلفات اليومية','daily_max');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'متوسط المخلفات اليومية','a_d_waste');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'الحد الأدنى المتوقع للمخلفات اليومية','daily_min');
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
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'تتم خدمة نقل المخلفات الصلبة للمكب بمعدات','service_mov_by');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",' يقتصر دور البلدية حالياً على','mun_role');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'الاسباب التي حالت دون قيام البلدية بعملية الجمع والنقل','reasons');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد المعدات المستخدمة','no_hardware');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد العاملين','all_workers');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'عدد الورديات','shifts');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'محطة ترحيل بالبلدية','transfer_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'تجهيز محطة ترحيل','equi_station');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'مستوى الخدمة الحالي','service_level');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'بعد المسافة التقربية للمكب','Landfill_distance');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_exist ("SELECT * from `municipalities` where ID = $mun_id",'المكب ضمن نطاق البلدية؟','Landfill_exist');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT GROUP_CONCAT(`name` SEPARATOR ' | ') as name from dumps where id =(SELECT dump_id from municipalities where id = $mun_id) ",'اسم المكب','0');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT Cname from service_companies where id =(SELECT service_com_id from municipalities where id = $mun_id) ",'شركة الخدمات','0');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `contract` where ID =(SELECT contract_no from municipalities WHERE id = $mun_id)",'تعاقد إنشاء مكب','name');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = $mun_id",'ملاحظات، أفكار، أراء','notes');
                        ?>
                                    </div>



                                </div>
                            </div>
                            <div class="callout callout-info" style="text-align:right;">
                                <div class="row">
                                    <div class="col-3">
                                        <p style="font-size: 20px;"><b>بيانات الشاحنات المستخدمة
                                            </b></p>
                                    </div>

                                    <table class="table table-bordered" style="direction: rtl;">
                                        <thead>
                                            <tr>
                                                <th>بيان شاحنات او المعدات</th>
                                                <th>النوع</th>
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

                      $sql = "SELECT `name`, `type`, `number`, `structure_no`, `date`, `status`, `notes` FROM `trucks` where municipality_id=$mun_id";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_array()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["name"] . "</td><td>" . $row["type"] ."</td><td>" . $row["number"] . "</td><td>" . $row["structure_no"]."</td><td>" . $row["date"] . "</td><td>"  .$row["status"]. "</td><td>" .$row["notes"]. "</td></tr>"; ?>
                                            <?php }
                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;" font-weight: bold;>بيانات مدخل
                                        البيانات</label>
                                </div>
                                <div class="row invoice-info" style="text-align: right;">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                                    $q= qury_free2("SELECT `editer_id` from `municipalities` where ID= $mun_id");
                                    if($q == null){
                                        $editer =1;
                                    }else{
                                        $editer= $q;
                                    }
                       get_details ("SELECT * from `users` where ID = $editer",'الاسم','name');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where ID = $editer",'الصفة','position');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where ID = $editer",'الادارة','management');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where ID = $editer",'البريد الإلكتروني','email');
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