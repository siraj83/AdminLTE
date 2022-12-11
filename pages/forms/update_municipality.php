<?php
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}
include '../sources/function.php';
include '../sources/config.php';
$mun_id = $_GET['edit_mun'];
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | تحديث بيانات البلدية</title>
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
    <!-- Droplist dumps -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#region").change(function() {
            var region_id = $(this).val();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    regionID: region_id
                },
                success: function(data) {
                    $("#dump").html(data);
                }
            });
        });
    });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../../dist/img/dump-truck-icon.png" alt="Dump Logo" height="60" width="60">
    </div>
    <div class="wrapper">
        <?php include sidebar; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: auto;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row" style="direction: rtl;text-align: center;display: block;">
                        </br>
                        <h1 class="m-0">تحديث بيانات البلدية</h1>
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
                <form action="update_mun.php" method="post">
                    <div class="row" style="direction: rtl;text-align: right;display: block;margin-right: auto">
                        <div class="col-md-6 m-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title" style="text-align: right;">بيانات عامة</h3>
                                    <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div> -->
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?php echo $mun_id ?>">
                                    <div class="form-group">
                                        <label for="inputName">أسم البلدية</label>
                                        <input type="text" id="name" name="name" placeholder="أسم البلدية"
                                            value="<?php echo popu($mun_id,'Mname') ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="region">المنطقة</label>
                                        <?php $r = popu($mun_id,'region_id'); ?>
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
                                        <label for="popu_ministry">عدد السكان وفق الوزارة</label>
                                        <input name="popu_ministry" placeholder="عدد السكان" type="number"
                                            id="popu_ministry" value="<?php echo popu($mun_id,'popu_ministry') ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="popu_questionnaire">عدد السكان وفق الإستبيان</label>
                                        <input name="popu_questionnaire" placeholder="عدد السكان" type="number"
                                            id="popu_questionnaire"
                                            value="<?php echo popu($mun_id,'popu_questionnaire') ?>"
                                            class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputName">المنطقة المشمولة بالخدمة</label>
                                        <input type="text" id="name" name="name" placeholder="أسم المنطقة"
                                            class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="popu_number_ly">عدد المستهدفين بالخدمة (مواطنين)</label>
                                        <input name="popu_number_ly" placeholder="عدد المستهدفين بالخدمة (مواطنين)"
                                            type="number" id="popu_number_ly" class="form-control"
                                            value="<?php echo popu($mun_id,'popu_number_ly') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="popu_number_fu">عدد المستهدفين بالخدمة (أجانب)</label>
                                        <input name="popu_number_fu" placeholder="عدد المستهدفين بالخدمة (أجانب)"
                                            type="number" id="popu_number_fu" class="form-control"
                                            value="<?php echo popu($mun_id,'popu_number_fu') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">الحد الأقصى المتوقع للمخلفات اليومية</label></label>
                                        <input type="text" id="daily_max" name="daily_max" placeholder="الحد الأقصى"
                                            value="<?php echo popu($mun_id,'daily_max') ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">الحد الأدنى المتوقع للمخلفات اليومية</label>
                                        <input type="text" id="daily_min" name="daily_min" placeholder="الحد الأدنى"
                                            value="<?php echo popu($mun_id,'daily_min') ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">من يتولى حاليا عملية جمع المخلفات الصلبة بالبلدية
                                        </label>
                                        <select id="who_handle_coll" name="who_handle_coll"
                                            class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'who_handle_coll') ?>">
                                                <?php echo popu($mun_id,'who_handle_coll') ?>
                                            </option>
                                            <option value="البلدية">البلدية</option>
                                            <option value="الخدمات العامة">الخدمات العامة</option>
                                            <option value="البلدية والخدمات">البلدية والخدمات</option>
                                            <option value="قطاع خاص">قطاع خاص</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">تتم خدمة جمع المخلفات بمعدات
                                        </label>
                                        <select id="service_coll_by" name="service_coll_by"
                                            class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'service_coll_by') ?>">
                                                <?php echo popu($mun_id,'service_coll_by') ?>
                                            </option>
                                            <option value="معداتها الخاصة">معداتها الخاصة</option>
                                            <option value="شراء الخدمة">شراء الخدمة</option>
                                            <option value="مقاول بالباطن">مقاول بالباطن</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">من يتولى حاليا عملية نقل المخلفات الصلبة للمكب
                                        </label>
                                        <select id="who_handle_mov" name="who_handle_mov"
                                            class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'who_handle_mov') ?>">
                                                <?php echo popu($mun_id,'who_handle_mov') ?>
                                            </option>
                                            <option value="البلدية">البلدية</option>
                                            <option value="2">الخدمات العامة</option>
                                            <option value="البلدية والخدمات">البلدية والخدمات</option>
                                            <option value="قطاع خاص">قطاع خاص</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">تتم خدمة نقل المخلفات الصلبة للمكب بمعدات
                                        </label>
                                        <select id="service_mov_by" name="service_mov_by"
                                            class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'service_mov_by') ?>">
                                                <?php echo popu($mun_id,'service_mov_by') ?>
                                            </option>
                                            <option value="معداتها الخاصة">معداتها الخاصة</option>
                                            <option value="شراء الخدمة">شراء الخدمة</option>
                                            <option value="مقاول بالباطن">مقاول بالباطن</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">يقتصر دور البلدية حالياً على</label>
                                        <select id="mun_role" name="mun_role" class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'mun_role') ?>">
                                                <?php echo popu($mun_id,'mun_role') ?></option>
                                            <option value="مشاركة في التشغيل">مشاركة في التشغيل</option>
                                            <option value="مشاركة في تخطيط">مشاركة في تخطيط</option>
                                            <option value="إشراف ومتابعة">إشراف ومتابعة</option>
                                            <option value="متابعة فقط">متابعة فقط</option>
                                            <option value="ليس لها دور">ليس لها دور</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">اهم المشاكل التي تواجه البلدية في عملية جمع ونقل المخلفات
                                            الصلبة؟</label>
                                        <select id="reasons" name="reasons" class="form-control custom-select">
                                            <option selected value="<?php echo popu($mun_id,'reasons') ?>">
                                                <?php echo popu($mun_id,'reasons') ?></option>
                                            <option value="مالية">مالية</option>
                                            <option value="إدارية">إدارية</option>
                                            <option value="سيئ">سيئ</option>
                                            <option value="فنية">فنية</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">عدد المعدات المستخدمة</label>
                                        <input type="number" id="no_hardware" name="no_hardware"
                                            placeholder="عدد المعدات المستخدمة"
                                            value="<?php echo popu($mun_id,'no_hardware') ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">عدد العاملين</label>
                                        <input type="number" id="all_workers" name="all_workers"
                                            placeholder="عدد العاملين" value="<?php echo popu($mun_id,'all_workers') ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">عدد الورديات</label>
                                        <input type="number" id="shifts" name="shifts" placeholder="عدد الورديات"
                                            value="<?php echo popu($mun_id,'shifts') ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">محطة ترحيل بالبلدية</label>
                                        <select id="transfer_station" name="transfer_station"
                                            class="form-control custom-select">
                                            <?php $ts= popu($mun_id,'transfer_station') ?>
                                            <option selected value="<?php echo $ts ?>">
                                                <?php echo exist_or_not($ts) ?>
                                            <option value="1">يوجد</option>
                                            <option value="0">لا يوجد</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">تجهيز محطة ترحيل</label>
                                        <select id="equi_station" name="equi_station"
                                            class="form-control custom-select">
                                            <?php $es= popu($mun_id,'equi_station') ?>
                                            <option selected value="<?php echo $es ?>">
                                                <?php echo exist_or_not($es) ?>
                                            <option value="1">يوجد</option>
                                            <option value="0">لا يوجد</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">مستوى الخدمة الحالي</label>
                                        <select id="service_level" name="service_level"
                                            class="form-control custom-select">
                                            <!-- <option selected disabled>إختر المستوى</option> -->
                                            <option selected value="<?php echo popu($mun_id,'service_level') ?>">
                                                <?php echo popu($mun_id,'service_level') ?>
                                            <option value="جيد جدآ">جيد جدآ</option>
                                            <option value="جيد">جيد</option>
                                            <option value="متوسط">متوسط</option>
                                            <option value="سيئ">سيئ</option>
                                            <option value="سيئ جدآ">سيئ جدآ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">المكب ضمن نطاق البلدية؟</label>
                                        <select id="Landfill_exist" name="Landfill_exist"
                                            class="form-control custom-select">
                                            <!-- <option selected disabled>إختر الحالة</option> -->
                                            <?php $e = popu($mun_id,'Landfill_exist') ?>
                                            <option selected value="<?php echo $e ?>">
                                                <?php echo exist_or_not($e) ?>
                                            <option value="1">يوجد</option>
                                            <option value="0">لا يوجد</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">بعد المسافة التقربية للمكب</label>
                                        <input type="number" id="Landfill_distance" name="Landfill_distance"
                                            placeholder="بعد المسافة التقربية للمكب"
                                            value="<?php echo popu($mun_id,'Landfill_distance') ?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">اسم المكب</label>
                                        <select id="dump" name="dump" class="form-control custom-select"
                                            <?php $d = popu($mun_id,'dump_id') ?> required>
                                            <option selected value="<?php echo $d ?>">
                                                <?php echo qury_w('name','dumps','id',$d) ?>
                                                <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `dumps` ORDER BY `name`";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                            <option value="<?php print($row["id"]); ?>"> <?php echo $row['name']; ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">العقد إن وجد</label>
                                        <select id="contract_no" name="contract_no" class="form-control custom-select">
                                            <?php $con = popu($mun_id,'contract_no') ?>
                                            <option selected value="<?php print exist_or_not($con) ?>">
                                                <?php print exist_or_not($con) ?>
                                                <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `contract`";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                            <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">شركة الخدمات</label>
                                        <select id="service_com" name="service_com" class="form-control custom-select"
                                            <?php $c = popu($mun_id,'service_com_id') ?> required>
                                            <option selected value="<?php print popu($mun_id,'service_com_id') ?>">
                                                <?php print qury_w('Cname','service_companies','id',$c) ?>
                                                <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `service_companies`";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                            <option value="<?php print($row["id"]); ?>"> <?= $row['Cname']; ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">ملاحظات، أفكار، أراء</label>
                                        <textarea id="notes" name="notes" placeholder="ملاحظات، أفكار، أراء"
                                            class="form-control"><?php echo popu($mun_id,'notes') ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <!-- <a href="#" class="btn btn-block btn-success btn-lg">add</a> -->
                                        <button type="submit" id="update" name="update"
                                            value="<?php echo popu($mun_id,'id') ?>" class="btn btn-success "
                                            style="float: left;">تحديث البيانات</button>

                                    </div>
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
                <!-- <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="population" placeholder="population">
        <button type="submit" neme="submit">Add</button>
      </form> -->
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
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Droplist dumps -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#region").change(function() {
            var region_id = $(this).val();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    regionID: region_id
                },
                success: function(data) {
                    $("#dump").html(data);
                }
            });
        });
    });
    </script>
    <!-- equi_station -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#transfer_station").on('change', function() {
            // alert($(this).val());
            var transfer_T = $(this).val();
            if (transfer_T == "0") {
                document.getElementById("equi_station").style.display = "none";
                //elem.data.hide;
                // $("$_equi_station").hide();
            } else {
                document.getElementById("equi_station").style.display = "block";
            }
        }).change();
    });
    </script>
    <!-- Landfill_exist -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#Landfill_exist").on('change', function() {
            var transfer_T = $(this).val();
            if (transfer_T == "1") {
                document.getElementById("Landfill_distance").style.display = "none";
            } else {
                document.getElementById("Landfill_distance").style.display = "block";
            }
        }).change();
    });
    </script>
</body>

</html>