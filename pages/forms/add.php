<?php 
session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
} 
include '../sources/config.php';
if(isset($_POST['name'], $_POST['region'], $_POST['add'])) {
$name = $_POST['name'];
$popu_ministry = $_POST['popu_ministry'];
$popu_questionnaire = $_POST['popu_questionnaire'];
$popu_number_ly = $_POST['popu_number_ly'];
$popu_number_fu = $_POST['popu_number_fu'];
$region = $_POST['region'];
$service_com = $_POST['service_com'];
$daily_min = $_POST['daily_min'];
$daily_max = $_POST['daily_max'];
$Landfill_exist = $_POST['Landfill_exist'];
$dump_id = $_POST['dump_id'];
$Landfill_distance = $_POST['Landfill_distance'];
$who_handle_coll = $_POST['who_handle_coll'];
$who_handle_mov = $_POST['who_handle_mov'];
$mun_role = $_POST['mun_role'];
$reasons = $_POST['reasons'];
$service_coll_by = $_POST['service_coll_by'];
$service_mov_by = $_POST['service_mov_by'];
$no_hardware = $_POST['no_hardware'];
$all_workers = $_POST['all_workers'];
$shifts = $_POST['shifts'];
$transfer_station = $_POST['transfer_station'];
$equi_station = $_POST['equi_station'];
$service_level = $_POST['service_level'];
$notes = $_POST['notes'];
$editer_id = $_SESSION['username'];
$last_event = 'إضافة';


$check ="SELECT Mname from `municipalities` WHERE Mname = '$name'";
$qry = "INSERT INTO `municipalities`( `Mname`, `popu_ministry`, `popu_questionnaire`,`popu_number_ly`,`popu_number_fu`, `region_id`,
`service_com_id`, `daily_min`, `daily_max`, `Landfill_exist`, `dump_id`, `Landfill_distance`,
`who_handle_coll`,`who_handle_mov`, `mun_role`, `reasons`, `service_coll_by`, `service_mov_by`, `no_hardware`, `all_workers`, 
`shifts`, `transfer_station`, `equi_station`, `service_level`, `notes` , `editer_id`, `last_event`)
VALUES ('$name','$popu_ministry','$popu_questionnaire','$region','$popu_number_ly','$popu_number_fu',$service_com ,'$daily_min','$daily_max',
'$Landfill_exist','$dump_id','$Landfill_distance','$who_handle_coll', '$who_handle_mov', '$mun_role','$reasons','$service_coll_by',
'$service_mov_by', '$no_hardware','$all_workers','$shifts','$transfer_station', '$equi_station','$service_level','$notes' , '$editer_id', '$last_event')";
mysqli_set_charset($conn, 'utf8');
$exist =mysqli_query($conn,$check);

if(mysqli_num_rows($exist) == 0){
  $insert = mysqli_query($conn,$qry);
  if($insert) {
    echo"<script>alert('تمت الإضافة بنجاح'); window.location.href='add_municipality.php';</script>"; 
    }else{
      echo "<script>alert('لم تتم الإضافة بنجاح'); window.location.href='mun_list.php';</script>";
    }
    }else{
      echo "<script>alert('تم إضافة هذة البلدية مسبقآ'); window.location.href='add_municipality.php';</script>";
    }
    
}else{
  echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='add_municipality.php';</script>";
}