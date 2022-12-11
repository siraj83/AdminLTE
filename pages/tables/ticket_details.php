<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include('../sources/function.php');
   $ticket_id = $_POST['show_button'];
   $mun_id = qury_w('mun_id','tickets','ticket_id',$ticket_id);
   $user = $_SESSION['username'];
$permission = qury_free2("SELECT permission_id from users where username = '$user'");
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | بيانات الشكوى</title>

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

    <?php function get_images($id){
        include '../sources/config.php';
mysqli_set_charset($conn, 'utf8');
$result = $conn->query("SELECT `imag_path` FROM tickets where ticket_id = $id && `imag_path` != ''");
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){ echo "<br>";?>
    <br>
    <img class="img-fluid img-rounded" width="900" height="900" src="<?php echo ($row['imag_path'])?>" />
    <?php }}?>
    <?php } ?>
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
                            <h1>بيانات الشكوى</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section>
                <div class="container" style="margin: 20px;">
                    <div class="row">
                        <?php if($permission == 1 || $permission == 3){  {?>

                        <?php  }}  ?>
                        <div class="col">
                            <button onclick="window.print()" class="btn btn-primary"><i
                                    class="fas fa-print"></i></button>
                        </div>

                        <form action="tickets_list.php">
                            <button class="btn btn-success"><i class="fas fa-sign-out-alt"></i></button>
                        </form>
                        </form>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <div class="card-header">
                                    <label class="card-title" style="float: right;">بيانات الشكوى</label>
                                </div>
                                </br>
                                <div class="row invoice-info" style="text-align: right;">
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT DISTINCT name from `tickets` where ticket_id = $ticket_id",'الاسـم المشتكي','name');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT DISTINCT email from `tickets` where ticket_id = $ticket_id",'البريدالإلكتروني','email');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details2 ("SELECT Mname FROM `municipalities` WHERE id = $mun_id",'البلدية');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT DISTINCT subject from `tickets` where ticket_id = $ticket_id",'الموضوع','subject');
                        ?>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <?php
                        get_details ("SELECT DISTINCT message from `tickets` where ticket_id = $ticket_id",'الرسالة','message');
                        ?>
                                    </div>
                                    <div style="margin: auto;">
                                        <?php get_images($ticket_id) ?>
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