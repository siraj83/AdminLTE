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
    <title>منصة مراقبة المكبات | البلديات بدون مكب</title>

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
                    <div class="col-sm-6" style="text-align: left;">
                        <h1>بلديات بدون مكب نهائي</h1>
                    </div>
                    <br>
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
                                <h3 class="card-title" style="float: right;">بيانات البلديات</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" name="example2" class="table table-bordered table-hover"
                                    style="text-align: right;">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>المنطقة</th>
                                            <th>عدد السكان وفق الوزارة</th>
                                            <th>عدد السكان وفق الإستبيان</th>
                                            <th>متوسط الكميات اليومية</th>
                                            <th data-field=>إجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="dump_details.php" method="$_POST">
                                            <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');

                      $sql = "SELECT municipalities.id,municipalities.Mname, municipalities.popu_ministry ,municipalities.popu_questionnaire, municipalities.a_d_waste, regions.name from municipalities  INNER JOIN regions on municipalities.region_id=regions.id where Landfill_exist= 0";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result-> fetch_assoc()){
                         echo '<tr data-value="2">' ;
                          echo  "<td>" . $row["Mname"] . "</td><td>" . $row["name"]."</td><td>" .$row["popu_ministry"]. "</td><td>" .$row["popu_questionnaire"]. "</td><td>" . $row["a_d_waste"] . "</td><td>" ?>

                                            <form action="mun_details.php" id="form" name="form" method="$_POST">
                                                <button id="dump" name="show_button" type="submit"
                                                    value="<?php print($row["id"]) ?>" class="btn btn-primary"><i
                                                        class="far fa-eye"></i></button>
                                                <!-- <button class="btn btn-danger" href="#"><i
                                                            class="fa fa-trash-alt"></i></button> -->
                                            </form>
                                            <?php       
                  echo  "</tr>";
                        }
                        echo "</tbody>";
                       /// echo '$tr.data('value')';
                      }
                      else {
                        echo "0 result";
                      }
                      $conn-> close();
                      ?>
                                            <td>
                                            </td>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="dump_details.php">
    Launch demo modal
  </button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
                        <!-- <div class="card" >
              <div class="card-header" >
                <h3 class="card-title" style="float: right;">البلديات</h3>
              </div> -->
                        <!-- <-- /.card-header -->
                        <!-- <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="text-align: right;">
                  <thead>
                    <tr>
                      <th>الاسم</th>
                      <th>عدد السكان</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../sources/config.php';
                      mysqli_set_charset($conn, 'utf8');
                     
                      $sql = "SELECT Mname,popu_ministry, popu_questionnaire from municipalities";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result-> fetch_assoc()){
                          echo "<tr><td>" . $row["Mname"] . "</td><td>" . $row["popu_ministry"]  . "</td><td>" . $row["popu_questionnaire"]. "</td></tr>";
                        }
                        echo "</tbody>";
                      }
                      else {
                        echo "0 result";
                      }
                      $conn-> close();
                      ?>
                </table>
              </div> -->
                        <!-- /.card-body -->
                        <!-- </div> -->
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
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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