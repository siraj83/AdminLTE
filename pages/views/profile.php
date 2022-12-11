<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
    }
    include '../sources/config.php';
    include '../sources/function.php';
    $user = $_SESSION['username'];
    $permission = qury_free2("SELECT permission_id from users where username = '$user'");
    $mun_id = qury_free2("SELECT mun_id FROM `users` WHERE username = '$user'");
    $com_id = qury_free2("SELECT company_id FROM `users` WHERE username = '$user'");
    ?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | الملف الشخصي للمستخدم</title>
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
        <br>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <div class="m-0">
                        <h1>الملف الشخصي</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: right;display: block;margin-right: auto">
                    <div class="col-md-4 m-auto">

                        <!-- Profile edite data -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user.jpg"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">
                                    <?php echo qury_free2("SELECT name FROM `users` WHERE username = '$user'")?><br>
                                </h3>

                                <p class="text-muted text-center">
                                    <?php echo qury_free2("SELECT position FROM `users` WHERE username = '$user'")?>
                                </p>

                                <ul class="list-group list-group-unbordered mb-3" style="text-align: right;">
                                    <li class="list-group-item">
                                        <b>جهة العمل</b> <a
                                            class="float-left"><?php echo qury_free2("SELECT management FROM `users` WHERE username = '$user'")?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>البريد الإلكتروني</b> <a
                                            class="float-left"><?php echo qury_free2("SELECT email FROM `users` WHERE username = '$user'")?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>رقم الهاتف</b> <a
                                            class="float-left"><?php echo qury_free2("SELECT phone_no FROM `users` WHERE username = '$user'")?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>نوع الحساب</b> <a
                                            class="float-left"><?php echo qury_free2("SELECT name FROM `permissions` WHERE id = '$permission'")?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>أســم المستخدم</b> <a
                                            class="float-left"><?php echo qury_free2("SELECT username FROM `users` WHERE username = '$user'")?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>البلدية</b> <a class="float-left">
                                            <?php 
                                          if($mun_id == 0 || $mun_id == null){
                                            echo 'لا يوجد';
                                          }else{
                                          echo popu($mun_id,'Mname');
                                          }
                                          ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>الشركة</b> <a class="float-left"><?php
                                        if($com_id == 0 || $com_id == null){
                                          echo 'لا يوجد';
                                        }else{ echo comp($com_id,'Cname');
                                        }
                                        ?></a>
                                    </li>
                                </ul>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    تعديل
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="../forms/update_user.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الحساب
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="profile-username text-center">
                                                        <?php echo qury_free2("SELECT name FROM `users` WHERE username = '$user'")?><br>
                                                    </h3>

                                                    <div class="form-group">
                                                        <label for="inputName">الإســم</label>
                                                        <input type="text" id="name" name="name" placeholder="الإســم"
                                                            value="<?php echo qury_free2("SELECT name FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName">المنصب</label>
                                                        <input type="text" id="position" name="position"
                                                            placeholder="المنصب"
                                                            value="<?php echo qury_free2("SELECT position FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName">جهة العمل</label>
                                                        <input type="text" id="management" name="management"
                                                            placeholder="جهة العمل"
                                                            value="<?php echo qury_free2("SELECT management FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputemail">البريد الإلكتروني</label>
                                                        <input type="email" id="email" name="email"
                                                            placeholder="البريد الإلكتروني"
                                                            value="<?php echo qury_free2("SELECT email FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input">رقم الهاتف</label>
                                                        <input type="number" id="phone_no" name="phone_no"
                                                            placeholder="رقم الهاتف"
                                                            value="<?php echo qury_free2("SELECT phone_no FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <?php if($permission == 1){  {?>
                                                    <div class="form-group">
                                                        <label for="permission_id">نوع الحساب</label>
                                                        <select id="permission_id" name="permission_id"
                                                            class="form-control custom-select" required>
                                                            <option value="<?php print $permission ?>">
                                                                <?php echo qury_free2("SELECT name FROM `permissions` WHERE id = '$permission'")?>
                                                            </option>
                                                            <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `permissions` ORDER BY name";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                                            <option value="<?php print($row["id"]); ?>">
                                                                <?= $row['name']; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <?php  }}  ?>
                                                    <div class="form-group">
                                                        <label for="inputName">أســم المستخدم</label>
                                                        <input type="text" id="username" name="username"
                                                            placeholder="أســم المستخدم"
                                                            value="<?php echo qury_free2("SELECT username FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputpassword">كلمة المرور</label>
                                                        <input type="password" id="password" name="password"
                                                            placeholder="كلمة المرور"
                                                            value="<?php echo qury_free2("SELECT password FROM `users` WHERE username = '$user'")?>"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mun_id">البلدية</label>
                                                        <select id="mun_id" name="mun_id"
                                                            class="form-control custom-select" required>
                                                            <option value="<?php print popu($mun_id,'id') ?>">
                                                                <?php print popu($mun_id,'Mname') ?></option>
                                                            <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `municipalities` ORDER BY Mname";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                                            <option value="<?php print($row["id"]); ?>">
                                                                <?= $row['Mname']; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName">شركة الخدمات</label>
                                                        <select id="company_id" name="company_id"
                                                            class="form-control custom-select" required>
                                                            <option
                                                                value="<?php print qury_w('id','service_companies','id',$com_id) ?>">
                                                                <?php print qury_w('Cname','service_companies','id',$com_id) ?>
                                                                <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `service_companies` ORDER BY Cname DESC";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                                            <option value="<?php print($row["id"]); ?>">
                                                                <?php echo $row['Cname']; ?>
                                                            </option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">إلغاء</button>
                                                    <button type="submit" id="update_user" name="update_user"
                                                        class="btn btn-primary">حفظ
                                                        التغيرات</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- <a href="#" class="btn btn-primary btn-block"><b>تعديل</b></a> -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../../dist/js/demo.js"></script> -->
</body>



</html>