<?PHP

session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: login.php");
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
    <title>منظومة المكبات | إضافة مكب</title>
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
                    <h1 class="m-0">إضافة مكب</h1>
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
            <form action="insert.php" id="form" name="form" method="post">
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
                                <label class="text-danger">البيانات المشار إليها بعلامة (*) يجب إدخالها</label>
                                <div class="form-group">
                                    <label for="inputName">* اسم المكب </label>
                                    <input type="text" id="dump_name" name="dump_name" placeholder="أسم المكب"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عنوان المكب</label>
                                    <input type="text" id="address" name="address" placeholder="عنوان المكب"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region">* المنطقة</label>
                                    <select id="region" name="region" class="form-control custom-select" required>
                                        <option value="" selected disabled>إختر المنطقة</option>
                                        <?php
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
                                    <label for="municipality_id">* البلدية</label>
                                    <select id="municipality_id" name="municipality_id"
                                        class="form-control custom-select" required>
                                        <option value="" selected disabled>إختر البلدية</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">* حالة المكب</label>
                                    <select id="dump_status" name="dump_status" required
                                        class="form-control custom-select">
                                        <option value="" selected disabled>إختر الحالة</option>
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
                                    <label for="type">* نوع المكب</label>
                                    <select id="dump_type" name="dump_type" required class="form-control custom-select">
                                        <option value="" selected disabled>إختر النوع</option>
                                        <!-- <option> -->
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
                                    <label for="type">* نوع المكب تقنيآ</label>
                                    <select id="tech_type_id" name="tech_type_id" required
                                        class="form-control custom-select">
                                        <option value="" selected disabled>إختر النوع</option>
                                        <!-- <option> -->
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
                                    <label for="disposal_id">* طريقة التخلص</label>
                                    <select id="disposal_id" name="disposal_id" class="form-control custom-select" required>
                                        <option value="" selected disabled >إختر الطريقة</option>
                                        <option selected value="3"></option>
                                        <!-- <option> -->
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
                                    <label for="ownership_id">* ملكية المكب</label>
                                    <select id="ownership_id" name="ownership_id" required
                                        class="form-control custom-select">
                                        <option value="" selected disabled>إختر النوع</option>
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
                                        <option selected disabled>إختر الوضع</option>
                                        <option value="شهادة عقارية">شهادة عقارية</option>
                                        <option value="إجراءات مستندية (غير قطعية)">إجراءات مستندية (غير قطعية)</option>
                                        <option value="عقد شراء">عقد شراء</option>
                                        <option value="عقد إيجار">عقد إيجار</option>
                                        <option selected value="بدون مستندات">بدون مستندات</option>
                                    </select>
                                </div>
                                <div class="form-group" id="issues">
                                    <label for="inputStatus">عليه قضايا</label>
                                    <select id="issues" name="issues" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">سنة التشغيل</label>
                                    <input type="year" min="1970" name="Operating_year" placeholder="سنة التشغيل"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">العمر الإفتراضي</label>
                                    <input type="year" id="EOL" name="EOL" placeholder="العمر الإفتراضي"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">* مساحة المكب/ بالهكتار</label>
                                    <input type="number" step="any" id="space" name="space"
                                        placeholder="مساحة المكب/ بالهكتار" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">المساحة المستنفذة</label>
                                    <input type="number" step="any" id="e_area" name="e_area"
                                        placeholder="المساحة المستنفذة" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">المساحة القابلة للتطوير</label>
                                    <input type="number" step="any" id="scalable" name="scalable"
                                        placeholder="المساحة القابلة للتطوير" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الابعاد</label>
                                    <input type="number" step="any" id="Dimensions" name="Dimensions"
                                        placeholder="الابعاد" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Targeted_number_ly">عدد المستهدفين بالخدمة (مواطنين)</label>
                                    <input name="Targeted_number_ly" placeholder="عدد المستهدفين بالخدمة (مواطنين)"
                                        type="number" id="Targeted_number_ly" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Targeted_number_fu">عدد المستهدفين بالخدمة (أجانب)</label>
                                    <input name="Targeted_number_fu" placeholder="عدد المستهدفين بالخدمة (أجانب)"
                                        type="number" id="Targeted_number_fu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الحد الأقصى للمخلفات اليومية طن/يوم</label>
                                    <input type="number" step="any" id="daily_max" name="daily_max"
                                        placeholder="الحد الأقصى اليومي" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">الحد الأدنى للمخلفات اليومية طن/يوم</label>
                                    <input type="number" step="any" id="daily_min" name="daily_min"
                                        placeholder="الحد الأدنى اليومي" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">متوسط قطر المساحة المشمولة بالخدمة</label>
                                    <input type="number" step="any" id="a_a_diameter" name="a.a.diameter"
                                        placeholder="متوسط قطر المساحة" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد المنشآت</label>
                                    <input type="number" id="facilities" name="facilities" placeholder="عدد المنشآت"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد رحلات المخلفات اليومية</label>
                                    <input type="number" id="daily_trips" name="daily_trips"
                                        placeholder="عدد رحالت المخلفات اليومية" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد العاملين بالمكب</label>
                                    <input type="number" id="workers" name="workers" placeholder="عدد العاملين بالمكب"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">عدد الآلات المكب</label>
                                    <input type="number" id="machines" name="machines" placeholder="عدد الآلات المكب"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">التجهيزات</label>
                                    <select id="Equipment" name="Equipment" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">السياج</label>
                                    <select id="Fence" name="Fence" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group" id="needs1">
                                    <label for="inputStatus">يحتاج صيانة</label>
                                    <select id="needs1" name="needs1" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">نعم</option>
                                        <option selected value="0">لا</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">منظومة أوزان</label>
                                    <select id="weight_sys" name="weight_sys" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group" id="needs2">
                                    <label for="inputStatus">يحتاج صيانة</label>
                                    <select id="needs2" name="needs2" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">نعم</option>
                                        <option selected value="0">لا</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">بوابة حراسة</label>
                                    <select id="Gate" name="Gate" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">شبكة الكهرباء</label>
                                    <select id="Electricity" name="Electricity" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">إقامة للعاملين</label>
                                    <select id="Accommodation" name="Accommodation" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">نقطة الاصحاح بيئي</label>
                                    <select id="env_Sanitation" name="env_Sanitation"
                                        class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مكتب إدارة</label>
                                    <select id="Manag_office" name="Manag_office" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مصنع سماد عضوي</label>
                                    <select id="OFP" name="OFP" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">مصنع فرز</label>
                                    <select id="plant_sorting" name="plant_sorting" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">محطة معالجة العصارة</label>
                                    <select id="LTP" name="LTP" class="form-control custom-select">
                                        <option selected disabled>إختر الحالة</option>
                                        <option value="1">يوجد</option>
                                        <option selected value="0">لا يوجد</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="service_company_id">* شركة الخدمات المشغلة له</label>
                                    <select id="service_company_id" name="service_company_id"
                                        class="form-control custom-select" required>
                                        <option value="" selected disabled>إختر الشركة</option>
                                        <?php
                        mysqli_set_charset($conn, 'utf8');
                        $sql= "SELECT * FROM `service_companies`";
                        $result = $conn->query($sql); 
                          while($row = mysqli_fetch_array($result)) { 
                            ?>
                                        <option value="<?php print($row["id"]); ?>"> <?= $row['Cname']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">ملاحظات</label></label>
                                    <textarea id="notes" name="notes" placeholder="ملاحظات"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="mapform">
                                <div class="row" style="margin:auto">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                                    </div>
                                </div>

                                <div id="map" style="height:450px; width: 650px;  max-width:95% ; margin:auto" class="my-3"></div>

                                <script>
                                let map;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: 29.6209287,
                                            lng: 17.7649578
                                        },
                                        zoom: 5,
                                        scrollwheel: true,
                                    });

                                    const libya = {
                                        lat: 32.810281,
                                        lng: 13.174953
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
                                    <input type="submit" name="submit" value="إضافة المكب" class="btn btn-success "
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#region").change(function() {
            var region_id = $(this).val();
            $.ajax({
                url: "action_dump.php",
                method: "POST",
                data: {
                    regionID: region_id
                },
                success: function(data) {
                    $("#municipality_id").html(data);
                }
            });
        });
    });
    </script>
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
</body>

</html>