<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include '../sources/function.php';
  

?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | سجل الأحداث</title>

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
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    </br>
                    <h1>سجل الأحداث</h1>
                    </br>
                               </div>
            </div><!-- /.container-fluid -->
                    </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    <div class="col-12">
                        <section class="content">
                            <div class="container-fluid" style="direction: rtl; ">
                                <br>
                                <h4 style="text-align: right;"> التغيرات على مستوى البلدية</h4>
                                <br>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="float: right;">التغيرات على البلدية</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" name="example2" class="table table-bordered table-hover"
                                        style="text-align: right;">
                                        <thead>
                                            <tr>
                                                <th>اسـم المستخدم</th>
                                                <th>البلدية</th>
                                                <th>نوع التغيرات</th>
                                                <th>التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');

                      $sql = "SELECT `active_type`,`date`,`mun_name`,
                      (SELECT name from users where id = log_activity.editer_id) as username
                      FROM `log_activity` 
                      INNER JOIN municipalities on log_activity.editer_id = municipalities.id
                      WHERE log_activity.mun_name IS NOT NULL";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result-> fetch_assoc()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["username"] . "</td><td>" . $row["mun_name"] . "</td><td>" .$row["active_type"]. "</td><td>" 
                          .$row["date"]. "</td><td>"; ?>

                                            <?php       
                            echo  "</tr>";
                         }
                        echo "</tbody>";
                       /// echo '$tr.data('value')';
                      }
                      else {
                        echo "لا توجد بيانات";
                      }
                      $conn-> close();
                      ?>
                                            <td>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>


                        <section class="content">
                            <div class="container-fluid" style="direction: rtl; ">
                                <br>
                                <h4 style="text-align: right;"> التغيرات على مستوى المكب</h4>
                                <br>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="float: right;">التغيرات على المكب</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" name="example2" class="table table-bordered table-hover"
                                        style="text-align: right;">
                                        <thead>
                                            <tr>
                                                <th>اسـم المستخدم</th>
                                                <th>المكب</th>
                                                <th>نوع التغيرات</th>
                                                <th>التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');

                      $sql = "SELECT `active_type`,`date`,`dump_name`,
                      (SELECT name from users where id = log_activity.editer_id) as username
                      FROM `log_activity` 
                      INNER JOIN municipalities on log_activity.editer_id = municipalities.id
                      WHERE log_activity.dump_name IS NOT NULL";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result-> fetch_assoc()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["username"] . "</td><td>" . $row["dump_name"] . "</td><td>" .$row["active_type"]. "</td><td>" 
                          .$row["date"]. "</td><td>"; ?>

                                            <?php       
                            echo  "</tr>";
                         }
                        echo "</tbody>";
                       /// echo '$tr.data('value')';
                      }
                      else {
                        echo "لا توجد بيانات";
                      }
                      $conn-> close();
                      ?>
                                            <td>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>


                        <section class="content">
                            <div class="container-fluid" style="direction: rtl; ">
                                <br>
                                <h4 style="text-align: right;"> التغيرات على مستوى الشركة</h4>
                                <br>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="float: right;">التغيرات على الشركة</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" name="example2" class="table table-bordered table-hover"
                                        style="text-align: right;">
                                        <thead>
                                            <tr>
                                                <th>اسـم المستخدم</th>
                                                <th>الشركة</th>
                                                <th>نوع التغيرات</th>
                                                <th>التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');

                      $sql = "SELECT `active_type`,`date`,`com_name`,
                      (SELECT name from users where id = log_activity.editer_id) as username
                      FROM `log_activity` 
                      INNER JOIN municipalities on log_activity.editer_id = municipalities.id
                      WHERE log_activity.com_name IS NOT NULL";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result-> fetch_assoc()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["username"] . "</td><td>" . $row["com_name"] . "</td><td>" .$row["active_type"]. "</td><td>" 
                          .$row["date"]. "</td><td>"; ?>

                                            <?php       
                            echo  "</tr>";
                         }
                        echo "</tbody>";
                       /// echo '$tr.data('value')';
                      }
                      else {
                        echo "لا توجد بيانات";
                      }
                      $conn-> close();
                      ?>
                                            <td>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>

                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>

                    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
                    <!-- <script src="https://assets/"></script> -->

                    <!-- /.card -->
                    <!-- <button class="tr">Click me</button> -->
                    <script>
                    $(document).ready(function() {
                        var table = $('example2').DataTable();
                        var id = $tr.data('value');
                        //  $("tr").on('click', function(){
                        $('tbody').on('click', function() {
                            var data = table.row(this).data();
                            alert('You clicked on');
                            // alert('You clicked ');
                        });
                    });
                    </script>
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
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example5').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example6').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#example7').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
</body>

</html>