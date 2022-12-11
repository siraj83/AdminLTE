<?php
session_start();
// update landfill data

include '../sources/config.php';

if(isset($_POST['update_dump'])) 
{
  $dump_id= $_POST['update_dump'];
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
    // $Equipment = $_POST['equipment'];
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
    $issues = $_POST['issues'];
    $notes = $_POST['notes'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $editer_id = $_SESSION['username'];
$last_event = 'تحديث';

 $qry = "UPDATE `dumps` SET name ='$name' , address = '$address', municipality_id = '$municipality_id', service_company_id = '$service_company_id', space = '$space', lat = '$lat', lng = '$lng', 
 status_id = '$dump_status', type = '$dump_type', EOL = '$EOL', Operating_year = '$Operating_year', Dimensions = '$Dimensions', Targeted_number_ly = '$Targeted_number_ly', Targeted_number_fu = '$Targeted_number_fu',
 daily_max = '$daily_max', a_a_diameter = '$a_a_diameter', tech_type_id = '$tech_type_id', disposal_id = '$disposal_id', ownership_id = '$ownership_id', exploited_area = '$e_area', scalable_area = '$scalable',
 daily_min = '$daily_min', facilities = '$facilities', workers = '$workers', machines = '$machines', fence = '$Fence', weight_sys = '$weight_sys', gate = '$Gate', electricity = '$Electricity',
 Accommodation = '$Accommodation', env_Sanitation = '$env_Sanitation', manag_office = '$Manag_office', OFP = '$OFP', plant_sorting = '$plant_sorting', LTP = '$LTP', region = '$region', notes = '$notes' 
 , issues = '$issues', Legal_status = '$Legal_status' , editer_id='$editer_id', last_event='$last_event' where id = $dump_id";
mysqli_set_charset($conn, 'utf8');
$insert = mysqli_query($conn,$qry);
//if ($conn->query($qry) === TRUE) {
  if($insert){
    echo"<script>alert('تم التحديث بنجاح'); window.location.href='../tables/dump_details.php?show_button=$dump_id';</script>";
  } else {
    //echo "Error: " . $qry . "<br>" . $conn->error;
    echo"<script>alert('حدث أثناء عملية التحديث .. حاول من جديد!'); window.location.href='update_dump.php?edit_dump=$dump_id';</script>";
  }
}
else{
    echo"<script >alert('يجب إدخال البيانات الأساسية!'); window.location.href='update_dump.php?edit_dump=$dump_id';</script>";
}
?>