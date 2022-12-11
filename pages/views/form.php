<?php
include '../sources/function.php';
include '../tables/table_insertable.php';
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | </title>
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
    <!-- <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">
    </div>
    <div class="wrapper">
        <?php
  main_slide();
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: auto;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;text-align: center;display: block;margin-right: 250px;">
                        </br>
                        <h1 class="m-0">إستبيان البلديات الشريكة</h1>
                        </br>
                        <div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section>
            </section>
            <!-- Main content -->
            <section class="content">
                <form action="" method="post" id="add_form">
                    <div class="row" style="direction: rtl;text-align: right;display: block;margin-right: 500px;">
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right; direction: rtl;">بيانات عامة</h3>
                                    <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
                                </div>



                                <?php table_insertable(); ?>
                                <div class="container-lg">
                                    <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <h2><b>بيانات الشاحنات المستخدمة </b></h2>
                                                        </br>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn btn-info add-new"><i
                                                                class="fa fa-plus"></i> إضافة حقل</button>
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
                                                        <th>الإجراء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="name[]"></td>
                                                        <td id="number[]"></td>
                                                        <td id="structure_no[]"></td>
                                                        <td id="date[]"></td>
                                                        <td id="status[]"></td>
                                                        <td id="notes[]"></td>
                                                        <td>
                                                            <a class="add" title="Add" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE03B;</i></a>
                                                            <a class="edit" title="Edit" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE254;</i></a>
                                                            <a class="delete" title="Delete" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE872;</i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <!-- <a href="#" class="btn btn-block btn-success btn-lg">add</a> -->
                                        <input type="submit" id="add_data" name="add_data" value="إضافة البيانات"
                                            class="btn btn-success " style="float: left;">

                                    </div>
                                </div>









                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
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
    <script>
    // ajax request to insent all form data
    $("#add_form").submit(function(e) {
        e.preventDefault();
        $("#add_data").val('Adding ...');
        $.ajax({
            url: '../forms/insert_tracker.php',
            method: 'post',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
            }
        });
    });
    </script>
    </div>
    </div>
</body>


</html>