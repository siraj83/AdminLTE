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
    <title>منصة مراقبة المكبات | إضافة مستخدم جديد</title>
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
                    <h1 class="m-0">إضافة مستخدم جديد</h1>
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
            <form action="add_users.php" method="post">
                <div class="row" style="direction: rtl;text-align: right;display: block;margin-right: auto">
                    <div class="col-md-6 m-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title w-100">بيانات المستخدم</h3>
                                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
                            </div>
                            <div class="card-body">
                                <label class="text-danger">البيانات المشار إليها بعلامة (*) يجب إدخالها</label>
                                <div class="form-group">
                                    <label for="inputName">* الاســم</label>
                                    <input type="text" id="name" name="name" placeholder="الاســم" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">المنصب</label>
                                    <input type="text" id="position" name="position" placeholder="المنصب"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الإدارة</label>
                                    <input type="text" id="management" name="management" placeholder="الإدارة"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">* نوع الحساب</label>
                                    <select id="permission_id" name="permission_id" class="form-control custom-select"
                                        required>
                                        <option value="" selected disabled>إختر نوع الحساب</option>
                                        <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `permissions` ORDER BY name DESC";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">* اســم المستخدم</label>
                                    <input type="text" id="username" name="username" placeholder="اســم المستخدم"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">* كلمة المرور</label>
                                    <input type="password" id="password" name="password" placeholder="كلمة المرور"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">رقم الهاتف</label>
                                    <input type="number" id="phone" name="phone" placeholder="رقم الهاتف"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">* البريد الإلكتروني</label>
                                    <input type="email" id="email" name="email" placeholder="البريد الإلكتروني"
                                        class="form-control">
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
                                    <label for="inputName">* شركة الخدمات</label>
                                    <select id="company_id" name="company_id" class="form-control custom-select"
                                        required>
                                        <option value="" selected disabled>إختر اسم الشركة</option>
                                        <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `service_companies` ORDER BY Cname DESC";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['Cname']; ?> </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <!-- <a href="#" class="btn btn-block btn-success btn-lg">add</a> -->
                                        <input type="submit" name="add_user" value="إضافة الحساب"
                                            class="btn btn-success " style="float: left;">
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