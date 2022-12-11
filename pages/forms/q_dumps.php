<?PHP
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

use function PHPSTORM_META\registerArgumentsSet;

include '../sources/config.php';
include '../sources/function.php';
$user = $_SESSION['username'];
$mun_id = qury_free2 ("SELECT `mun_id` FROM `users` WHERE `username`= '$user'");
$dump_id = qury_free2("SELECT `dump_id` FROM `municipalities` WHERE `id` ='$mun_id' ");
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | حول المكبات لسنة 2022</title>
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
      <!-- Preloader -->
    <!--<div class="preloader flex-column justify-content-center align-items-center">-->
    <!--    <img class="animation__shake" src="../../dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">-->
    <!--</div>-->
    
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <br>
                    <h1 class="m-0">حول المكبات لسنة 2022</h1>
                    <br>
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
            <form action="update_dp.php" id="form" name="form" method="post">
                <div class="row" style="direction: rtl;text-align: right;display: block;">
                    <div class="col-md-9 m-auto">
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
                                <div class="form-group">
                                    <label for="inputName">أسم المكب</label>
                                    <input type="text" id="dump_name" name="dump_name" placeholder="أسم المكب"
                                        value="<?php echo get_result($dump_id,'name') ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عنوان المكب</label>
                                    <input type="text" id="address" name="address" placeholder="عنوان المكب"
                                        value="<?php echo get_result($dump_id,'address') ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region">المنطقة</label>
                                    <?php $r = get_result($dump_id,'region');?>
                                    <select id="region" name="region" class="form-control custom-select">
                                        <option value="<?php print qury_w('id','regions','id',$r) ?>">
                                            <?php print qury_w('name','regions','id',$r) ?>
                                        </option>
                                        <?php
                        include '../sources/config.php';                        
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `regions`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="municipality_id">أسم البلدية</label>
                                    <select id="municipality_id" name="municipality_id"
                                        class="form-control custom-select">
                                        <?php $m = get_result($dump_id,'municipality_id')  ?>

                                        <option value="<?php print popu($m,'id') ?>">
                                            <?php print popu($m,'Mname') ?>
                                        </option>
                                        <?php
                                        include '../sources/config.php';
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `municipalities`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['Mname']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">حالة المكب</label>
                                    <select id="dump_status" name="dump_status" class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'status_id');?>
                                        <option value="<?php print qury_w('id','dumps_status','id',$r) ?>">
                                            <?php print qury_w('Sname','dumps_status','id',$r) ?>
                                        </option>
                                        <?php                       
                        mysqli_set_charset($conn, 'utf8');
                        $sql = "SELECT * from `dumps_status`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){ 
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['Sname']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">نوع المكب</label>
                                    <select id="dump_type" name="dump_type" class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'type');?>
                                        <option value="<?php print qury_w('id','dumps_type','id',$r) ?>">
                                            <?php print qury_w('name','dumps_type','id',$r) ?>
                                        </option>
                                        <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql = "SELECT * from `dumps_type`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type">نوع المكب تقنيآ</label>
                                    <select id="tech_type_id" name="tech_type_id" class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'tech_type_id');?>
                                        <option value="<?php print qury_w('id','tech_type','id',$r) ?>">
                                            <?php print qury_w('name','tech_type','id',$r) ?>
                                        </option>
                                        <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql = "SELECT * from `tech_type`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="disposal_method">طريقة التخلص</label>
                                    <select id="disposal_id" name="disposal_id" class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'disposal_id');?>
                                        <option value="<?php print qury_w('id','disposal_method','id',$r) ?>">
                                            <?php print qury_w('name','disposal_method','id',$r) ?>
                                        </option>
                                        <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql = "SELECT * from `disposal_method`";
                        $result = $conn->query($sql);
                        while ($row = mysqli_fetch_array($result)){
                          ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ownership_id">ملكية المكب</label>
                                    <select id="ownership_id" name="ownership_id" class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'ownership_id');?>
                                        <option value="<?php print qury_w('id','ownership','id',$r) ?>">
                                            <?php print qury_w('name','ownership','id',$r) ?>
                                        </option>
                                        <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `ownership`";
                        $result = $conn->query($sql); 
                          while($row = mysqli_fetch_array($result)) { 
                            ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الوضع القانوني (بموجب مستند)</label>
                                    <select id="Legal_status" name="Legal_status" class="form-control custom-select">
                                        <option value="<?php echo get_result($dump_id,'Legal_status') ?>">
                                            <?php echo get_result($dump_id,'Legal_status') ?></option>
                                        <option value="شهادة عقارية">شهادة عقارية</option>
                                        <option value="إجراءات مستندية (غير قطعية)">إجراءات مستندية (غير قطعية)</option>
                                        <option value="عقد شراء">عقد شراء</option>
                                        <option value="عقد إيجار">عقد إيجار</option>
                                        <option value="بدون مستندات">بدون مستندات</option>
                                    </select>
                                </div>
                                <div class="form-group" id="issues">
                                    <label for="inputStatus">عليه قضايا</label>
                                    <select id="issues" name="issues" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'issues') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">سنة التشغيل</label>
                                    <input type="year" min="1970" name="Operating_year" placeholder="سنة التشغيل"
                                        class="form-control"
                                        value="<?php echo get_result($dump_id,'Operating_year') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">العمر الإفتراضي</label>
                                    <input type="year" id="EOL" name="EOL" placeholder="العمر الإفتراضي"
                                        class="form-control" value="<?php echo get_result($dump_id,'EOL') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">مساحة المكب/ بالهكتار</label>
                                    <input type="number" step="any" id="space" name="space"
                                        placeholder="مساحة المكب/ بالهكتار" class="form-control"
                                        value="<?php echo get_result($dump_id,'space') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">المساحةالمستنفذة</label>
                                    <input type="number" step="any" id="e_area" name="e_area"
                                        placeholder="المساحةالمستنفذة" class="form-control"
                                        value="<?php echo get_result($dump_id,'exploited_area') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">المساحة القابلة للتطوير</label>
                                    <input type="number" step="any" id="scalable" name="scalable"
                                        placeholder="المساحة القابلة للتطوير" class="form-control"
                                        value="<?php echo get_result($dump_id,'scalable_area') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الابعاد</label>
                                    <input type="number" step="any" id="Dimensions" name="Dimensions"
                                        placeholder="الابعاد" class="form-control"
                                        value="<?php echo get_result($dump_id,'Dimensions') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Targeted_number_ly">عدد المستهدفين بالخدمة (مواطنين)</label>
                                    <input name="Targeted_number_ly" placeholder="عدد المستهدفين بالخدمة (مواطنين)"
                                        type="number" id="Targeted_number_ly" class="form-control"
                                        value="<?php echo get_result($dump_id,'Targeted_number_ly') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="Targeted_number_fu">عدد المستهدفين بالخدمة (أجانب)</label>
                                    <input name="Targeted_number_fu" placeholder="عدد المستهدفين بالخدمة (أجانب)"
                                        type="number" id="Targeted_number_fu" class="form-control"
                                        value="<?php echo get_result($dump_id,'Targeted_number_fu') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> الحد الأقصى للمخلفات اليومية طن/يوم</label>
                                    <input type="number" id="daily_max" name="daily_max"
                                        placeholder="الحد الأقصى اليومي" class="form-control"
                                        value="<?php echo get_result($dump_id,'daily_max') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName"> الحد الأدنى للمخلفات اليومية طن/يوم</label>
                                    <input type="number" id="daily_min" name="daily_min"
                                        placeholder="الحد الأدنى اليومي" class="form-control"
                                        value="<?php echo get_result($dump_id,'daily_min') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">متوسط قطر المساحة المشمولة بالخدمة</label>
                                    <input type="number" id="a_a_diameter" name="a.a.diameter"
                                        placeholder="متوسط قطر المساحة" class="form-control"
                                        value="<?php echo get_result($dump_id,'a_a_diameter') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد المنشآت</label>
                                    <input type="number" id="facilities" name="facilities" placeholder="عدد المنشآت"
                                        class="form-control" value="<?php echo get_result($dump_id,'facilities') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد رحلات المخلفات اليومية</label>
                                    <input type="number" id="daily_trips" name="daily_trips"
                                        placeholder="عدد رحالت المخلفات اليومية" class="form-control"
                                        value="<?php echo get_result($dump_id,'daily_trips') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد العاملين بالمكب</label>
                                    <input type="number" id="workers" name="workers" placeholder="عدد العاملين بالمكب"
                                        class="form-control" value="<?php echo get_result($dump_id,'workers') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد الآلات المكب</label>
                                    <input type="number" id="machines" name="machines" placeholder="عدد آالت المكب"
                                        class="form-control" value="<?php echo get_result($dump_id,'machines') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">التجهيزات</label>
                                    <select id="equipment" name="equipment" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <?php $f= get_result($dump_id,'fence') ?>
                                <div class="form-group">
                                    <label for="inputStatus">السياج</label>
                                    <select id="Fence" name="Fence" class="form-control custom-select">
                                        <option value="<?php print $f ?>"><?php print exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                    <div class="form-group" id="needs1">
                                        <label for="inputStatus">يحتاج صيانة</label>
                                        <select id="needs1" name="needs1" class="form-control custom-select">
                                            <option selected disabled>إختر الحالة</option>
                                            <option value="1">نعم</option>
                                            <option value="0">لا</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">منظومة أوزان</label>
                                    <select id="weight_sys" name="weight_sys" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'weight_sys') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                    <div class="form-group" id="needs2">
                                        <label for="inputStatus">تحتاج صيانة</label>
                                        <select id="needs2" name="needs2" class="form-control custom-select">
                                            <option selected disabled>إختر الحالة</option>
                                            <option value="1">نعم</option>
                                            <option value="0">لا</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">بوابة حراسة</label>
                                    <select id="Gate" name="Gate" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'gate') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">شبكة الكهرباء</label>
                                    <select id="Electricity" name="Electricity" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'electricity') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">إقامة للعاملين</label>
                                    <select id="Accommodation" name="Accommodation" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'Accommodation') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مكتب اصحاح بيئي</label>
                                    <select id="env_Sanitation" name="env_Sanitation"
                                        class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'env_Sanitation') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مكتب إدارة</label>
                                    <select id="Manag_office" name="Manag_office" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'manag_office') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مصنع سماد عضوي</label>
                                    <select id="OFP" name="OFP" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'OFP') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مصنع فرز</label>
                                    <select id="plant_sorting" name="plant_sorting" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'plant_sorting') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">محطة معالجة العصارة</label>
                                    <select id="LTP" name="LTP" class="form-control custom-select">
                                        <?php $f= get_result($dump_id,'LTP') ?>
                                        <option value="<?php echo $f ?>"><?php echo exist_or_not($f) ?></option>
                                        <option value="1">يوجد</option>
                                        <option value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="service_company_id">شركة الخدمات المشغلة له</label>
                                    <select id="service_company_id" name="service_company_id"
                                        class="form-control custom-select">
                                        <?php $r = get_result($dump_id,'service_company_id');?>
                                        <option value="<?php print qury_w('id','service_companies','id',$r) ?>">
                                            <?php print qury_w('Cname','service_companies','id',$r) ?>
                                            <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `service_companies`";
                        $result = $conn->query($sql); 
                          while($row = mysqli_fetch_array($result)) { 
                            ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['Cname']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">ملاحظات</label></label>
                                    <textarea id="notes" name="notes" placeholder="ملاحظات"
                                        class="form-control"><?php print get_result($dump_id,'notes') ?></textarea>
                                </div>
                            </div>
                            <div class="mapform" style="padding: 35px;">
                                <div class="row" style="padding: 5px 50px 5px 10px; ">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng"
                                            value="<?php echo get_result($dump_id, 'lng')?>">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat"
                                            value="<?php echo get_result($dump_id, 'lat')?>">
                                    </div>
                                </div>

                                <div id="map" style="height:500px; width: 800px;" class="my-3"></div>

                                <script>
                                let map;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: 32.810281,
                                            lng: 13.174953
                                        },
                                        zoom: 5,
                                        scrollwheel: true,
                                    });

                                    const libya = {
                                        $t = <?php echo get_result($dump_id, 'lat')?>;
                                        $g = <?php echo get_result($dump_id, 'lng')?>;
                                        <?php if($t == null || $g == null){
                                                lat: 32.810281;
                                                lng: 13.174953;
                                        } else{?>
                                        lat: <?php echo get_result($dump_id, 'lat')?>;
                                        lng: <?php echo get_result($dump_id, 'lng')?>;
                                        <?php }?>;

                                    };

                                    let marker = new google.maps.Marker({
                                        position: libya,
                                        map: map,
                                        draggable: true
                                    });

                                    google.maps.event.addListener(marker, 'position_changed',
                                        function() {
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })

                                    google.maps.event.addListener(map, 'click',
                                        function(event) {
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                }
                                </script>
                                <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKFSvm7pbe42G-Vfpa6vFs6Ec9DThZDhA&callback=initMap"
                                    type="text/javascript"></script>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <!-- <a href="#" class="btn btn-block btn-success btn-lg">add</a> -->
                                    <button id="update_dump" type="submit" name="update_dump"
                                        value=" <?php print $dump_id?>" class="btn btn-success "
                                        style="float: left;">تحديث بيانات المكب</button>
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
    <!-- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#Fence").on('change', function() {
            var Fence_T = $(this).val();
            if (Fence_T == 0) {
                document.getElementById("needs1").style.display = "none";
            } else {
                document.getElementById("needs1").style.display = "block";
            }
        }).change();
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#weight_sys").on('change', function() {
            var weight_sys_T = $(this).val();
            if (weight_sys_T == 0) {
                document.getElementById("needs2").style.display = "none";
            } else {
                document.getElementById("needs2").style.display = "block";
            }
        }).change();
    });
    </script>
    <script>
    $lat = get_result('$dump_id', 'lat');
    $lng = get_result('$dump_id', 'lat');
    if ($lat == 0 || $lng == 0) {
        lat: 32.810281;
        lng: 13.174953;
    }
    else {
        lat: $lat;
        lng: $lng;
    }
    </script>
</body>

</html>