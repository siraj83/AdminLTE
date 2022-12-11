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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منظومة المكبات | إدارة المستخدمين</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <div class="col-sm-6" style="text-align: left;">
                        <h1>إدارة المستخدمين</h1>
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
                                <h3 class="card-title" style="float: right;">إدارة المستخدمين</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" name="example2" class="table table-bordered table-hover"
                                    style="text-align: right;">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>المنصب</th>
                                            <th>الإدارة</th>
                                            <th>البلدية</th>
                                            <th>الشركة</th>
                                            <th>نوع الحساب</th>
                                            <th>اسم المستخدم</th>
                                            <th>رقم الهاتف</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>إجراءات</th>
                                        </tr>
                                    </thead>

                                    <?php
                                        echo "<tbody>";
                  include '../sources/config.php';
                  mysqli_set_charset($conn, 'utf8');

                  $sql = "SELECT u.id, u.name, u.position, u.management, u.username, u.phone_no, u.email ,
                  (SELECT Mname from municipalities WHERE id = u.mun_id) as municipality,
                  (SELECT Cname from service_companies WHERE id = u.company_id) as company,
                  (SELECT name from permissions WHERE id = u.permission_id) as permission
                  FROM `users` as u
                  LEFT JOIN municipalities on municipalities.id = u.mun_id
                  LEFT JOIN service_companies on service_companies.id = u.company_id
                  LEFT JOIN permissions on permissions.id = u.permission_id";
                  $result = $conn->query($sql);
                  
                //   if ($result->num_rows > 0) {

                    for ($cont=0; $row = $result-> fetch_assoc(); $cont++){
                      echo "<tr><td>" . $row["name"] . "</td><td>" . $row["position"] . "</td><td>" . $row["management"]."</td><td>" . $row["municipality"]."</td><td>"
                      . $row["company"]."</td><td>". $row["permission"]."</td><td>". $row["username"] . "</td><td>"
                      . $row["phone_no"] . "</td><td>". $row["email"] . "</td><td>" ?>
                                    <form action="" id="form" name="form" method="POST">
                                        <button id="show_button" name="show_button" type="submit"
                                            value="<?php print($row["id"]) ?>" class="btn btn-primary"><i
                                                class="fas fa-edit"></i></button>
                                    </form>
                                    <?php
                       echo "</td></tr>";
                    }
                    echo "</tbody>";
                //   }
                //   else {
                //     echo "0 result";
                //   }
                  $conn-> close();
                  ?>
                                    <td>
                                    </td>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
            "autoWidth": true,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
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
    });
    </script>
</body>

</html>