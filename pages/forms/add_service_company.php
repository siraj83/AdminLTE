<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}
    include '../sources/config.php';
    include '../sources/function.php';
    ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | إضافة شركة خدمات</title>
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
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <h1 class="m-0">إضافة شركة خدمات</h1>
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
            <form action="add_com.php" method="post">
                <div class="row" style="direction: rtl;text-align: right;display: block;margin-right: auto">
                    <div class="col-md-6 m-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title w-100">بيانات عامة</h3>
                                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
                            </div>
                            <div class="card-body">
                                <label class="text-danger">البيانات المشار إليها بعلامة (*) يجب إدخالها</label>
                                <div class="form-group">
                                    <label for="inputName">* اسم الشركة</label>
                                    <input type="text" id="name" name="name" placeholder="أسم الشركة"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">رقم الهاتف</label>
                                    <input type="tel" id="phone" name="phone" placeholder="رقم الهاتف"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">البريد الإلكتروني</label>
                                    <input type="email" id="email" name="email" placeholder="البريد الإلكتروني"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">العنوان</label>
                                    <input type="text" id="address" name="address" placeholder="العنوان"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">رقم العقد</label>
                                    <input type="text" id="contract_no" name="contract_no" placeholder="رقم العقد"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">قيمة العقد</label>
                                    <input type="number" id="contrsct_value" name="contrsct_value"
                                        placeholder="قيمة العقد" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">مدة العقد</label>
                                    <input type="text" id="contract_period" name="contract_period"
                                        placeholder="مدة العقد" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">تاريخ التعاقد</label>
                                    <input type="text" id="contract_date" name="contract_date"
                                        placeholder="تاريخ التعاقد" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mun_id">* البلدية (الطرف الأول)</label>
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
                                    <label for="contract_method">طريقة التعاقد</label>
                                    <select id="contract_method" name="contract_method"
                                        class="form-control custom-select">
                                        <option selected disabled>إختر الطريقة</option>
                                        <option value="مناقصة">مناقصة</option>
                                        <option value="تكليفة مباشر">تكليفة مباشر</option>
                                        <option selected value="لايوجد">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="contract_type">نوع التعاقد</label>
                                    <select id="contract_type" name="contract_type" class="form-control custom-select">
                                        <option selected disabled>إختر النوع</option>
                                        <option value="مباشر">مباشر</option>
                                        <option value="بالباطن">بالباطن</option>
                                        <option selected value="لايوجد">لا يوجد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <!-- <a href="#" class="btn btn-block btn-success btn-lg">add</a> -->
                                    <input type="submit" name="add_com" value="إضافة الشركة" class="btn btn-success "
                                        style="float: left;">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </section>
        <section>
            <div>
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

</html>