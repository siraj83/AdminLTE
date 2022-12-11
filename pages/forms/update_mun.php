<?php 
session_start();
include '../sources/config.php';
$mun_id = $_POST['update'];
if(isset($_POST['update'])) {
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
$dump = $_POST['dump'];
$Landfill_distance = $_POST['Landfill_distance'];
$who_handle_coll = $_POST['who_handle_coll'];
$service_coll_by = $_POST['service_coll_by'];
$who_handle_mov = $_POST['who_handle_mov'];
$service_mov_by = $_POST['service_mov_by'];
$mun_role = $_POST['mun_role'];
$reasons = $_POST['reasons'];
$no_hardware = $_POST['no_hardware'];
$all_workers = $_POST['all_workers'];
$shifts = $_POST['shifts'];
$transfer_station = $_POST['transfer_station'];
$equi_station = $_POST['equi_station'];
$service_level = $_POST['service_level'];
$contract_no = $_POST['contract_no'];
$notes = $_POST['notes'];
$editer_id = $_SESSION['username'];
$last_event = 'تحديث';

$qry = "UPDATE `municipalities` SET Mname= '$name', popu_ministry= '$popu_ministry', popu_questionnaire= '$popu_questionnaire',
popu_number_ly= '$popu_number_ly',popu_number_fu= '$popu_number_fu', dump_id='$dump', Landfill_distance='$Landfill_distance', service_com_id='$service_com', 
daily_min='$daily_min', daily_max='$daily_max', Landfill_exist='$Landfill_exist', region_id='$region',who_handle_coll='$who_handle_coll', 
mun_role='$mun_role', reasons='$reasons', service_coll_by='$service_coll_by', who_handle_mov='$who_handle_mov', service_mov_by='$service_mov_by', no_hardware='$no_hardware', all_workers='$all_workers', shifts='$shifts', transfer_station='$transfer_station',
equi_station='$equi_station', service_level='$service_level', contract_no='$contract_no', notes='$notes', editer_id='$editer_id', last_event='$last_event' WHERE id=$mun_id";
mysqli_set_charset($conn, 'utf8');

    $insert = mysqli_query($conn,$qry);
    if($insert) {
      echo"<script>alert('تم التحديث بنجاح'); window.location.href='../tables/mun_details.php?show_button=$mun_id';</script>"; 
      }else{
      echo "<script>alert('لم يتم التحديث بنجاح'); window.location.href='update_municipality.php?edit_mun=$mun_id';</script>";
      }
            
}else{
    echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='update_municipality.php?edit_mun=$mun_id';</script>";
  }
?>