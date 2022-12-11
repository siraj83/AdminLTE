<?php
session_start();
//insert a new  landfill 
include '../sources/config.php';

if(isset($_POST['dump_name'], $_POST['municipality_id'], $_POST['service_company_id'],$_POST['dump_status'],$_POST['dump_type'] )) 
{
    $name = $_POST['dump_name'];
    $address = $_POST['address'];
    $municipality_id = $_POST['municipality_id'];
    $region = $_POST['region'];
    $service_company_id = $_POST['service_company_id'];
    $dump_status = $_POST['dump_status'];
    $dump_type = $_POST['dump_type'];
    $tech_type_id = $_POST['tech_type_id'];
    $disposal_id = $_POST['disposal_id'];
    $ownership_id = $_POST['ownership_id'];
    $Operating_year = $_POST['Operating_year'];
    $EOL = $_POST['EOL'];
    $space = $_POST['space'];
    $e_area = $_POST['e_area'];
    $scalable = $_POST['scalable'];
    $Dimensions = $_POST['Dimensions'];
    $Targeted_number_ly = $_POST['Targeted_number_ly'];
    $Targeted_number_fu = $_POST['Targeted_number_fu'];
    $daily_max = $_POST['daily_max'];
    $daily_min = $_POST['daily_min'];
    $a_a_diameter = $_POST['a_a_diameter'];
    $facilities = $_POST['facilities'];
    $daily_trips = $_POST['daily_trips'];
    $workers = $_POST['workers'];
    $machines = $_POST['machines'];
    $Equipment = $_POST['Equipment'];
    $Fence = $_POST['Fence'];
    $weight_sys = $_POST['weight_sys'];
    $Gate = $_POST['Gate'];
    $Electricity = $_POST['Electricity'];
    $Accommodation = $_POST['Accommodation'];
    $env_Sanitation = $_POST['env_Sanitation'];
    $Manag_office = $_POST['Manag_office'];
    $OFP = $_POST['OFP'];
    $plant_sorting = $_POST['plant_sorting'];
    $LTP = $_POST['LTP'];
    $Legal_status = $_POST['Legal_status'];
    $notes = $_POST['notes'];
    $issues = $_POST['issues'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $editer_id = $_SESSION['username'];
$last_event = 'إضافة';

 $qry = "INSERT INTO `dumps`(`name`, `address`, `municipality_id`, `service_company_id`, `space`,`lat`,`lng`, `status_id`, `type`,`EOL`,`Operating_year`, `Dimensions`, 
 `Targeted_number_ly`, `Targeted_number_fu`, `daily_max`, `a_a_diameter`,`tech_type_id`,`disposal_id`,`ownership_id`,`exploited_area`,`scalable_area`,`daily_min`,`facilities`,
 `workers`,`machines`,`equipment`,`fence`,`weight_sys`,`gate`,`electricity`,`Accommodation`,`env_Sanitation`,`manag_office`,`OFP`,`plant_sorting`,`LTP`, `Legal_status`,`region`,`issues`,`notes`, `editer_id`, `last_event`) 
 VALUES ('$name', '$address','$municipality_id' ,'$service_company_id' ,'$space', '$lat', '$lng','$dump_status','$dump_type','$EOL','$Operating_year','$Dimensions','$Targeted_number_ly','$Targeted_number_fu',
 '$daily_max','$a_a_diameter','$tech_type_id','$disposal_id','$ownership_id','$e_area','$scalable','$daily_min','$facilities','$workers','$machines','$Equipment','$Fence','$weight_sys','$Gate',
 '$Electricity','$Accommodation','$env_Sanitation','$Manag_office','$OFP','$plant_sorting','$LTP','$Legal_status','$region','$issues','$notes', '$editer_id', '$last_event')";
 
mysqli_set_charset($conn, 'utf8');
$insert = mysqli_query($conn,$qry);
//if ($conn->query($qry) === TRUE) {
  if($insert){
    echo"<script>alert('تمت الإضافة بنجاح'); window.location.href='../tables/dumps_list.php';</script>";
  } else {
    //echo "Error: " . $qry . "<br>" . $conn->error;
    echo"<script>alert('حدث أثناء عملية الإضافة .. حاول من جديد!'); window.location.href='add_dump.php';</script>";
  }
}
else{
    echo"<script >alert('يجب إدخال البيانات الأساسية!'); window.location.href='add_dump.php';</script>";
}
?>