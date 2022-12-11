<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}


include('../sources/function.php'); 
$user = $_SESSION['username'];
$permission = qury_free2("SELECT permission_id from users where username = '$user'");
   $dump_id = $_GET['show_button'];
$sfl = status_no ($dump_id,'Sname');
$ctn = qury_star("SELECT contract_no from municipalities WHERE id = (SELECT municipality_id from dumps WHERE id =$dump_id)");

//    $lat = get_location($dump_id,'lat') ;
//    $lng= get_location($dump_id,'lng');
//    $dump_name = get_location($dump_id,'name');
//    $st = get_details ("SELECT name FROM `dumps_type` WHERE id = (SELECT type FROM `dumps` WHERE id = $dump_id)",'نوع المكب','name');
//    echo $st;
//    if ($st = 1) {
//     $icon_mark= 'image';
//     echo $icon_mark;
// }
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة المكبات | بيانات المكب</title>

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

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;text-align: center;display: block;">
                    <div class="col-sm-6" style="text-align: left;">
                        <h1>بيانات المكب</h1>
                    </div>
                    <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">جداول البيانات</li>
            </ol>
          </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section>
            <div class="container-fluid" style="margin-bottom: 20px; margin-left: 20px; display: block;">
                <div class="row">
<?php if($permission == 1 || $permission == 3){  {?>
                    <form action="../sources/function.php" id="form2" name="form2" method="POST">
                        <button id="delete_dump" name="delete_dump"
                            onclick="return confirm('هل تريد فعلآ حذف البيانات؟')" type="submit"
                            value="<?php print $dump_id ?>" class="btn btn-danger" href="#"><i
                                class="fa fa-trash-alt"></i></button>
                    </form>
                    <?php  }}  ?>
                    <form action="../forms/update_dump.php" method="$_POST">
                        <div class="col">
                            <button class="btn btn-primary" name="edit_dump" value="<?php print $dump_id ?>"><i
                                    class="fas fa-edit"></i></button>
                        </div>
                    </form>

                    <div class="col">
                        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i></button>
                    </div>

                    <form action="dumps_list.php" >
                        <div class="col" style="margin-right: 30px;">
                        <button class="btn btn-success" ><i class="fas fa-sign-out-alt"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="direction: rtl;">
                    <div class="col-12">
                        <!-- <div class="callout callout-info" style="direction: rtl;margin-right: 250px;">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;">البيانات الأساسية</label>
                            </div>
                            </br>
                            <div class="row invoice-info" style="text-align: right;">
                                <div class="col-sm-4 invoice-col">
                                    <?php
                        get_details ("SELECT * from `dumps` where ID = $dump_id",'اسم المكب','name');
                        ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT name FROM `dumps_type` WHERE id = (SELECT type FROM `dumps` WHERE id = $dump_id)",'نوع المكب','name');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                        get_details ("SELECT Sname FROM `dumps_status` WHERE id = (SELECT status_id FROM `dumps` WHERE id = $dump_id)",'حالة المكب','Sname');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                        get_details ("SELECT * from `dumps` where ID = $dump_id",'عنوان المكب','address');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                        get_details ("SELECT * from `ownership` where ID = (SELECT `ownership_id` FROM `dumps` WHERE id = $dump_id)",'ملكية المكب','name');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                     get_details("SELECT * from `dumps` where ID = $dump_id",'عدد المستهدفين بالخدمة (مواطنين)','Targeted_number_ly'); ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                     get_details("SELECT * from `dumps` where ID = $dump_id",'عدد المستهدفين بالخدمة (أجانب)','Targeted_number_fu'); ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                     get_details("SELECT * from `dumps` where ID = $dump_id",'مساحة المكب/ بالهكتار','space'); ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'المساحة المستغلة','exploited_area');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'المساحة الغير مستخدمة','unused_area');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'المساحة القابلة للتطوير','scalable_area');
                       ?>
                                </div>
                            </div>
                        </div>
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;">البيانات الأدارية والقانونية</label>
                            </div>
                            <div class="row invoice-info" style="text-align: right;">
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details ("SELECT Mname FROM `municipalities` WHERE id = (SELECT `municipality_id` FROM `dumps` WHERE id = $dump_id)",'اسم البلدية','Mname');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details ("SELECT COUNT(id) FROM `municipalities` WHERE dump_id = $dump_id",'عدد البلديات التى يقدم لها الخدمة','COUNT(id)');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php get_details ("SELECT Cname FROM `service_companies` WHERE id = (SELECT `service_company_id` FROM `dumps` WHERE id = $dump_id)",'شركة الخدمات المشغلة له','Cname'); ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details("SELECT * from `dumps` where ID = $dump_id",'سنة التشغيل','Operating_year');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'العمر الإفتراضي','EOL');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'الوضع القانوني (بموجب مستند)','Legal_status');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'عليه قضايا','issues');
                       ?>
                                </div>
                            </div>
                        </div>
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;" font-weight: bold;>معلومات
                                    فنية</label>
                            </div>
                            <div class="row invoice-info" style="text-align: right;">
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details ("SELECT name FROM `tech_type` WHERE id = (SELECT `tech_type_id` FROM `dumps` WHERE id = $dump_id)",'نوع المكب تقنيآ','name');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details ("SELECT name FROM `disposal_method` WHERE id = (SELECT `disposal_id` FROM `dumps` WHERE id = $dump_id)",'طريقة التخلص','name');
                         ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'عدد المنشآت','facilities');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'عدد رحلات المخلفات اليومية','daily_trips');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'عدد العاملين بالمكب','workers');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_details("SELECT * from `dumps` where ID = $dump_id",'عدد الآلات المكب','machines');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'التجهيزات','equipment');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'السياج','fence');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'منظومة أوزان','weight_sys');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'بوابة حراسة','gate');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'شبكة الكهرباء','electricity');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'إقامة للعاملين','Accommodation');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'مكتب اصحاح بيئي','env_Sanitation');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'مكتب إدارة','manag_office');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'مصنع سماد عضوي','OFP');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'مصنع فرز','plant_sorting');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                      get_exist("SELECT * from `dumps` where ID = $dump_id",'محطة معالجة العصارة','LTP');
                       ?>
                                </div>

                            </div>
                        </div>
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;" font-weight: bold;>بيانات المتغيرات
                                    المستمرة (التشغيلية)</label>
                            </div>
                            <div class="row invoice-info" style="text-align: right;">
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'الحد الأقصى للمخلفات اليومية طن/يوم','daily_max');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'متوسط المخلفات اليومية طن/يوم','a_d_waste');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'الحد الأدنى للمخلفات اليومية طن/يوم','daily_min');
                       ?>
                                </div>
                            </div>
                        </div>

                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;" font-weight:
                                    bold;>ملاحظات</label></label>
                            </div>
                            <div class="col-sm-4 invoice-col" style="text-align: right;">
                                <?php
                       get_details ("SELECT * from `dumps` where ID = $dump_id",'','notes');
                       ?>
                            </div>
                        </div>
                        <?php
                            if($ctn !=0){                          
                         get_contract($ctn);
                             }
                        ?>
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;" font-weight: bold;>موقع
                                    المكب</label>
                            </div>
                            <!-- <div class="row invoice-info" style="position: center;">  -->
                            <div class="mapform">
                                <div class="row" style="padding: 10px 210px 10px 180px">
                                    <div class="col-6" style="text-align: center;">
                                        <label> خط الطول </label>
                                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng"
                                            value="<?php echo get_location($dump_id,'lng') ?>" readonly>
                                    </div>
                                    <div class="col-6" style="text-align: center;">
                                        <label> خط العرض</label>
                                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat"
                                            value="<?php echo get_location($dump_id,'lat') ?>" readonly>
                                    </div>

                                </div>
                                <div id="map" style="height:500px; width: 900px; max-width:100% ; margin:auto" class="my-3"></div>

                                <script>
                                let map;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: <?php echo get_location($dump_id,'lat')?>,
                                            lng: <?php echo get_location($dump_id,'lng')?>
                                        },
                                        zoom: 6,
                                        scrollwheel: true,
                                    });

                                    const libya = {
                                        lat: <?php echo get_location($dump_id,'lat')?>,
                                        lng: <?php echo get_location($dump_id,'lng')?>
                                    };
                                    const image =
                                        "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                                    let marker = new google.maps.Marker({
                                        position: libya,
                                        map: map,
                                        draggable: false
                                    });
                                    google.maps.event.addListener(marker, 'position_changed',
                                        function() {
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })

                                    // google.maps.event.addListener(map, 'click',
                                    //     function(event) {
                                    //         pos = event.latLng
                                    //         marker.setPosition(pos)
                                    //     })
                                }
                                </script>
                                <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKFSvm7pbe42G-Vfpa6vFs6Ec9DThZDhA&callback=initMap"
                                    type="text/javascript"></script>
                            </div>
                            <!-- </div> -->
                        </div>
                        <div class="callout callout-info">
                            <div class="card-header">
                                <label class="card-title" style="float: right;" font-weight: bold;>بيانات مدخل
                                    البيانات</label>
                            </div>
                            <div class="row invoice-info" style="text-align: right;">
                                <div class="col-sm-4 invoice-col">
                                    <?php
                                    $q= qury_free2("SELECT `editer_id` from `dumps` where ID= $dump_id");
                                    if($q == null){
                                        $editer =1;
                                    }else{
                                        $editer= $q;
                                    }
                       get_details ("SELECT * from `users` where ID = $editer",'الاسم','name');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `users` where ID = $editer",'الصفة','position');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `users` where ID = $editer",'الادارة','management');
                       ?>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <?php
                       get_details ("SELECT * from `users` where ID = $editer",'البريد الإلكتروني','email');
                       ?>
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