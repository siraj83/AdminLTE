<?php 
    include '../sources/config.php';
    include '../sources/function.php';
    ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | بوابة البلاغات</title>
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
    <link rel="stylesheet" href="../../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <br>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <h1 class="m-0"> بوابة البلاغات</h1>
                    <div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <br>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card" style="direction: rtl;text-align: right;display: block;margin-right: auto">
                <div class="card-body row">
                    <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <img class="img-fluid" src="../../dist/img/S.E.jpg" width="150">
                            <br>
                            <br>
                            <h2><strong>وزارة الحكم المحلي</strong></strong></h2>
                            <h2>إدارة الإصحاح البيئي</h2>
                            <p class="lead mb-5">من خلال هذه البوابة يمكنك تقديم البلاغات والملاحظات حول المخلفات<br>
                                خدمات جمع ونقل المخلفات (القمامة)
                            </p>
                        </div>
                    </div>

                    <div class="col-7">
                        <form action="" method="post" id="ticket">
                            <div class="form-group">
                                <label for="inputName">الاســم</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">البريدالإلكتروني</label>
                                <input type="email" id="email" name="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="mun_id">البلدية</label>
                                <select id="mun_id" name="mun_id" class="form-control custom-select" required>
                                    <option value="" selected disabled>إختر البلدية</option>
                                    <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `municipalities` ORDER BY Mname";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                    <option value="<?php print($row["id"]); ?>"> <?= $row['Mname']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject">الموضوع</label>
                                <input type="text" id="subject" name="subject" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">الرسالة</label>
                                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="images[]"
                                        accept="image/*" multiple>
                                    <label class="custom-file-label" style="text-align: left;" id="choose_file"
                                        for="image">إختر الملف</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" id="add_taket" value="إرسال">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    </div>
    </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $("#image").on('change', function() {
        var filename = $(this).val();
        $(choose_file).html(filename);
    });
});
$("#ticket").submit(function(e) {
    // e.preventDefault();
    $.ajax({
        url: 'add_ticket.php',
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data: new FormData(this),
        success: function(response) {
            $("#result").html(response);
        }
    });

});
</script>

</html>