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
   $com_id = $_POST['show_button'];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | بيانات الشركة</title>

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
                    <div class="row" style="direction: rtl;text-align: center;display: block;">
                        <div class="col-sm-6" style="text-align: left;">
                            <h1>بيانات الشركة</h1>
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
                            <button id="delete_com" name="delete_com"
                                onclick="return confirm('هل تريد فعلآ حذف البيانات؟')" type="submit"
                                value="<?php print $com_id ?>" class="btn btn-danger" href="#"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                        <?php  }}  ?>
                        <form action="../forms/update_company.php" method="$_POST">
                            <div class="col">
                                <button class="btn btn-primary" name="edit_com" value="<?php print $com_id ?>"><i
                                        class="fas fa-edit"></i></button>
                            </div>
                        </form>
                        <div class="col">
                            <button onclick="window.print()" class="btn btn-primary"><i
                                    class="fas fa-print"></i></button>
                        </div>

                        <form action="com_list.php">
                            <div class="col" style="margin-right: 30px;">
                            <button class="btn btn-success"><i class="fas fa-sign-out-alt"></i></button>
                             </div>
                        </form>

                        <!-- <form action="../charts/mun_report.php" id="repot" name="report" method="POST">
                            <button class="btn btn-success" id="mun_report" name="mun_report"
                                value="<?php print $com_id ?>"><i class="fas fa-chart-pie"></i></button>
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
                            <!-- <div class="callout callout-info" style="direction: rtl;">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->
                            <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;">البيانات الأساسية</label>
                              
                              
                                        <div>
                                            <?php $confirm = qury_free2("SELECT confirmed FROM service_companies WHERE id = $com_id");
                                        if($confirm ==1){
                                            $c = "btn btn-success";
                                        }else{
                                            $c = "btn btn-secondary";
                                        }
                                        ?>
                                            <button class="<?php print $c ?>" style="border-radius: 80px;" id="confirm"
                                                name="confirm" onclick="confirm_company()" title="تأكيد البيانات"><i
                                                    class="fas fa-check-circle"></i></button>
                                        </div>
                                    
                                 </div>
                                </br>
                                <div class="row invoice-info" style="text-align: right;">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'اسم الشركة','Cname');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'العنوان','address');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'رقم الهاتف','phone');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'البريد الإلكتروني','email');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details2 ("SELECT GROUP_CONCAT(`Mname` SEPARATOR ' | ') FROM `municipalities` WHERE service_com_id = $com_id",'البلديات المشمولة بالخدمة');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'رقم العقد','contract_no');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'قيمة العقد','contrsct_value');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'مدة العقد','contract_period');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'تاريخ التعاقد','contract_date');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `municipalities` where ID = (select mun_id from `service_companies` where id= $com_id)",'البلدية (الطرف الأول)','Mname');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'طريقة التعاقد','contract_method');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT * from `service_companies` where ID = $com_id",'نوع التعاقد','contract_type');
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

                      $sql = "SELECT `name`, `type`, `number`, `structure_no`, `date`, `status`, `notes` FROM `trucks` where company_id=$com_id";
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
                                    $q= qury_free2("SELECT `editer_id` from `service_companies` where id= $com_id");
                                    if($q == null){
                                        $editer = "swmgiz0000";
                                    }else{
                                        $editer= $q;
                                    }
                       get_details ("SELECT * from `users` where username = '$editer'",'الاسم','name');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where username = '$editer'",'الصفة','position');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where username = '$editer'",'الادارة','management');
                       ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                       get_details ("SELECT * from `users` where username = '$editer'",'البريد الإلكتروني','email');
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
     <script>
    function confirm_company() {

        document.getElementById("confirm").className = "btn btn-success";
        document.getElementById("confirm").title = "بيانات مؤكدة";
        <?php confirm($com_id) ?>
    }
    </script>
</body>

</html>