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
    <title>منظومة المكبات | جداول البيانات</title>

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
                        <h1>بيانات شركات الخدمات</h1>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float: right;">شركات الخدمات</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" name="example2" class="table table-bordered table-hover"
                                    style="text-align: right;">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>عدد البلديات</th>
                                            <th>عدد المكبات</th>
                                            <th>تاريخ التعاقد</th>
                                            <th>طريقة التعاقد</th>
                                            <th>نوع التعاقد</th>
                                            <th>العدد المشمولين بالخدمة</th>
                                            <th>إجراءات</th>
                                        </tr>
                                    </thead>

                                    <?php
                                        echo "<tbody>";
                  include '../sources/config.php';
                  mysqli_set_charset($conn, 'utf8');

                  $sql = "SELECT DISTINCT  service_companies.id, service_companies.Cname,  service_companies.number_of_dumps,
                  service_companies.contract_date, service_companies.contract_method, service_companies.contract_type,  
                  (SELECT COUNT(id) FROM `dumps` WHERE service_company_id=service_companies.id) as number_of_dumps,
                  (SELECT sum(popu_questionnaire) FROM `municipalities` WHERE service_com_id=service_companies.id) as popu_questionnaire, 
                  (SELECT COUNT(id) FROM `municipalities` WHERE service_com_id=service_companies.id) as mun 
                  from service_companies 
                  left JOIN municipalities on municipalities.service_com_id=service_companies.id";
                  $result = $conn->query($sql);
                  
                //   if ($result->num_rows > 0) {

                    for ($cont=0; $row = $result-> fetch_assoc(); $cont++){
                      echo "<tr><td>" . $row["Cname"] . "</td><td>" . $row["mun"] . "</td><td>" . $row["number_of_dumps"]."</td><td>" . $row["contract_date"]."</td><td>"
                      . $row["contract_method"]."</td><td>". $row["contract_type"]."</td><td>". $row["popu_questionnaire"] . "</td><td>" ?>
                                    <form action="com_details.php" id="form" name="form" method="POST">
                                        <button id="show_button" name="show_button" type="submit"
                                            value="<?php print($row["id"]) ?>" class="btn btn-primary"><i
                                                class="far fa-eye"></i></button>
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