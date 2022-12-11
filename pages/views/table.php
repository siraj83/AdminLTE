<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: login.php");
        ob_end_flush();
        exit();
}

include '../sources/config.php';
include '../sources/function.php';
$user = $_SESSION['username'];
$mun_id = qury_free2 ("SELECT `mun_id` FROM `users` WHERE `username`= '$user'");
$com_id = qury_free2 ("SELECT `company_id` FROM `users` WHERE `username`= '$user'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيانات الشاحنات او المعدات</title>

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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        var html =
            ' <tr><td><input class="form-control" type="text" name="truck_name[]"><td><input class="form-control" type="text" name="type[]"></td</td><td><input class="form-control" type="number" name="number[]"></td><td><input class="form-control" type="text" name="structure_no[]"></td><td><input class="form-control" type="year" name="date[]"></td><td><input class="form-control" type="text" name="status[]"></td><td><input class="form-control" type="text" name="notes[]"></td><td><input class="btn btn-danger " type="button" name="remove" id="remove" value="حذف"></td></tr>';
        var x = 1;

        $("#add").click(function() {
            $("#table_field").append(html);
        });
        $("#table_field").on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    });
    </script>
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">
    </div>
    <div class="wrapper">
        <?php include sidebar; ?>
        <div class="content-wrapper ml-0">
            <div class="container-fluid p-4" style="direction: rtl;">
            <div class="card card-praimry mt-5 p-4"
                style="direction: rtl;text-align: center;display: block; width:100%">
                <form class="insert-form" action="" method="post" id="insert_form">
                    <hr>
                    <h1 class="text-center">بيانات الشاحنات او المعدات</h1>
                    <hr>
                    <div class="alert alert-success" id="inserted" role="alert">
                    </div>
                    <div class="input-field">
                        <table class="table table-bordered" id="table_field" style="text-align: center;">
                            <tr>
                                <th>بيان شاحنات او المعدات</th>
                                <th>النوع</th>
                                <th>العدد</th>
                                <th>رقم الهيكل</th>
                                <th>تاريخ الصنع</th>
                                <th>الحالة الفنية</th>
                                <th>ملاحظات</th>
                                <th>الإجراء</th>
                            </tr>
                            <?PHP
                        
                        
                        if(isset($_POST['save'])){
                            
                            $truck_name = $_POST['truck_name'];
                            $type = $_POST['type'];
                            $number = $_POST['number'];
                            $structure_no = $_POST['structure_no'];
                            $date = $_POST['date'];
                            $status = $_POST['status'];
                            $notes = $_POST['notes'];

                            foreach($truck_name as $key => $value){
                               $save = "INSERT INTO `trucks`(`name`, `type`, `number`, `structure_no`, `date`, `status`, `notes`,`municipality_id`, `company_id`,`editer_id`) 
                               VALUES ('".$value."','".$type[$key]."','".$number[$key]."','".$structure_no[$key]."','".$date[$key]."','".$status[$key]."','".$notes[$key]."','$mun_id','$com_id','$user')";
                            $qury = mysqli_query($conn, $save);
                            }
                            
                        }
                    ?>
                            <tr>
                                <td><input class="form-control" type="text" name="truck_name[]"></td>
                                <td><input class="form-control" type="text" name="type[]"></td>
                                <td><input class="form-control" type="number" name="number[]"></td>
                                <td><input class="form-control" type="text" name="structure_no[]"></td>
                                <td><input class="form-control" type="year" name="date[]"></td>
                                <td><input class="form-control" type="text" name="status[]"></td>
                                <td><input class="form-control" type="text" name="notes[]"></td>
                                <td><input class="btn btn-info btn-block " type="button" name="add" id="add"
                                        value="إضافة">
                                </td>
                            </tr>
                        </table>
                        <center>
                            <input class="btn btn-success" type="submit" name="save" id="save" value="حفظ البيانات">
                        </center>
                    </div>

                </form>
            </div>
        </div>
        </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>