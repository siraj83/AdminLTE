<?php $user = $_SESSION['username'];
$permission = qury_free2("SELECT permission_id from users where username = '$user'");
    ?>


<link rel="apple-touch-icon" sizes="180x180" href="/dumpsys/dist/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/dumpsys/dist/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/dumpsys/dist/img/favicon/favicon-16x16.png">
<link rel="manifest" href="/dumpsys/dist/img/favicon/site.webmanifest">
<link rel="mask-icon" href="/dumpsys/dist/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/dumpsys/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/dumpsys/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/dumpsys/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/dumpsys/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/dumpsys/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/dumpsys/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/dumpsys/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="/dumpsys/plugins/summernote/summernote-bs4.min.css">
<!-- DataTables -->
<!--<link rel="stylesheet" href="/dumpsys/css/dataTables.bootstrap4.min.css">-->
<!--<link rel="stylesheet" href="/dumpsys/css/responsive.bootstrap4.min.css">-->
<!--<link rel="stylesheet" href="/dumpsys/css/buttons.bootstrap4.min.css">-->
<!-- Custom Style -->
<link rel="stylesheet" href="/dumpsys/dist/css/custom.css">




<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white flex-row-reverse navbar-light">
        <!-- style="margin-left: 0px;" -->

        <!-- Left navbar links -->
        <!-- Trigger main sidebar  -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="main_links navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"-->
            <!--        role="button" style="float: left;">-->
            <!--        <i class="fas fa-bars"></i>-->
            <!--    </a>-->
            <!--</li>-->
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-primary">
        <!-- style=" left: 0px" !important;"style="right: 0px ;left: auto" -->
        <!-- Brand Logo -->
        <a href="/home" class="brand-link" style="text-align: right;">
            <img src="/dumpsys/dist/img/dump-truck-icon.png" alt="Dump Logo" class="brand-image img-circle elevation-3"
                style="float: right;">
            <span class="brand-text font-weight-light" style="text-align: right;">منصة إدارة
                المخلفات</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel flex-row mt-3 p-0 mb-3 d-flex" style="text-align: center;">
                <!-- style="direction: rtl;text-align: center;" -->
                <div class="image">
                    <img src="/dumpsys/dist/img/user.jpg" class="brand-image img-circle elevation-2" alt="User Image"
                        style="float: right;">
                    <!-- style="float: right;" -->
                </div>
                <div class="info">
                    <?php $user = $_SESSION['username'];?>
                    <a href="../views/profile.php" class="d-block"
                        style="text-align: right;"><?php echo qury_free2("SELECT name FROM `users` WHERE username = '$user'" )?><br>
                        <?php echo qury_free2("SELECT management FROM `users` WHERE username = '$user'")  ?></a>
                    <!-- style="text-align: right;" -->
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active" style="text-align: center;">
                            <i class="nav-icon fas fa-tachometer-alt" style="float: right;"></i>
                            <p>
                                لوحة العرض
                            </p>
                        </a>
                    </li>
                    <?php if($permission == 1 || $permission == 2){  {?>
                    <!-- Charts -->
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-chart-pie" style="float: right;"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>
                                إحصائيات
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/charts/regions.php " class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إحصائيات حول المناطق الثلاث</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/charts/municipalities.php" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>إحصائيات حول البلديات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Reports -->
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-edit" style="float: right;"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>
                                التقارير
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/generalchart" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>تقرير عام</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/r-report" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>المناطق الثلاثة</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/mun_wo_dump.php" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>بلديات بدون مكب</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/contracts_list.php" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>تعاقدات المكبات</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/mun_report.php" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>البلديات الشريكة</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>عملية الفرز بنقاط التجميع</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>عملية الفرز في القطاع الخاص</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/mun_rep_list.php" class="nav-link" style="text-align: right;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>نصف سنوي</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php  }}  ?>
                    <?php if($permission == 1 || $permission == 2 || $permission == 3 || $permission == 4 || $permission == 5){  {?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-gopuram" style="float: right;"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>البلديات</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if($permission == 1 || $permission == 3){  {?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/forms/add_municipality.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>إضافة بلدية</p>
                                </a>
                            </li>
                            <?php  }}  ?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/mun_list.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>عرض البلديات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php  }}  ?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-dumpster"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>
                                المكبات
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if($permission == 1 || $permission == 3){  {?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/forms/add_dump.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>إضافة مكب</p>
                                </a>
                            </li>
                            <?php  }}  ?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/dumps_list.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>عرض المكبات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php if($permission == 1 || $permission == 2 || $permission == 3 || $permission == 4 || $permission == 6){  {?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-truck-moving"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>
                                شركات الخدمات
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if($permission == 1 || $permission == 3){  {?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/forms/add_service_company.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-plus-circle nav-icon"></i>
                                    <p>إضافة شركة</p>
                                </a>
                            </li>
                            <?php  }}  ?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/com_list.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>عرض الشركات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php  }}  ?>
                    <?php if($permission == 1){  {?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="#" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <p>
                                إدارة المستخدمين
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/forms/add_user.php" class="nav-link" style="text-align: right;">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>إضافة مستخدم</p>
                                </a>
                            </li>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/tables/users.php" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-cogs nav-icon"></i>
                                    <p>الصلاحيات</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php  }}  ?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="/dumpsys/pages/UI/timeline2.php" class="nav-link" style="text-align: right;">
                            <i class="fas fa-angle-left" style="float: left;"></i>
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                الإستبيانات
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="direction: rtl;">
                                <a href="/dumpsys/pages/views/surveys.php" class="nav-link" style="text-align: right;">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>الإستبيانات المتاحة</p>
                                </a>
                            </li>
                            <?php if($permission == 1){  {?>
                            <li class="nav-item" style="direction: rtl;">
                                <a href="#" class="nav-link" style="text-align: right;">
                                    <i class="fas fa-cogs nav-icon"></i>
                                    <p>الإعدادات</p>
                                </a>
                            </li>
                            <?php  }}  ?>
                        </ul>
                    </li>
                    <?php if($permission == 1){  {?>
                        <li class="nav-item" style="direction: rtl;">
                            <a href="" class="nav-link" style="text-align: right;">
                                <i class="fas fa-angle-left" style="float: left;"></i>
                                <i class="fas fa-solid fa-envelope-open-text"></i>
                                <p>
                                    البلاغات
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" style="direction: rtl;">
                                    <a href="/dumpsys/pages/forms/contact-us.php" class="nav-link" style="text-align: right;">
                                        <i class="fas fa-solid fa-envelope-open-text"></i>
                                        <p>
                                            بوابة البلاغات
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item" style="direction: rtl;">
                                    <a href="/dumpsys/pages/tables/tickets_list.php" class="nav-link" style="text-align: right;">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>
                                            قائمة البلاغات
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php  }}  ?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="/dumpsys/pages/UI/timeline.php" class="nav-link" style="text-align: right;">
                            <i class="nav-icon fas fa-scroll"></i>
                            <p>
                                اليوميات
                            </p>
                        </a>
                    </li>
                    <?php if($permission == 1){  {?>
                    <li class="nav-item" style="direction: rtl;">
                        <a href="/dumpsys/pages/views/events.php" class="nav-link" style="text-align: right;">
                            <i class="fas fa-file-alt"></i>
                            <p>
                                سجل الأحداث
                            </p>
                        </a>
                    </li>
                    <?php  }}  ?>
                                        <li class="nav-item" style="direction: rtl;">
                        <a href="/dumpsys/logout.php" class="nav-link" style="text-align: right;">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>
                                تسجيل الخروج
                            </p>
                        </a>
                    </li>
                    <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- jQuery -->
    <script src="/dumpsys/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/dumpsys/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dumpsys/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/dumpsys/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/dumpsys/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/dumpsys/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/dumpsys/plugins/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/dumpsys/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/dumpsys/plugins/moment/moment.min.js"></script>
    <script src="/dumpsys/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/dumpsys/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/dumpsys/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/dumpsys/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dumpsys/dist/js/adminlte.js"></script>

