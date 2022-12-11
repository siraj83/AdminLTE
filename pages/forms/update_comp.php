<?php 
include '../sources/config.php';
$com_id = $_POST['update'];
if(isset($_POST['update'])) {
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$contract_no = $_POST['contract_no'];
$contrsct_value = $_POST['contrsct_value'];
$contract_period = $_POST['contract_period'];
$contract_date = $_POST['contract_date'];
$contract_method = $_POST['contract_method'];
$contract_type = $_POST['contract_type'];
$mun_id = $_POST['mun_id'];
$editer_id = $_SESSION['username'];
$last_event = 'تحديث';

$qry = "UPDATE `service_companies` SET Cname= '$name', phone= '$phone', email= '$email', address='$address', 
contract_no='$contract_no', contrsct_value='$contrsct_value', contract_period='$contract_period', contract_date='$contract_date', contract_method='$contract_method', contract_type='$contract_type'
, mun_id='$mun_id' , editer_id='$editer_id', last_event='$last_event' WHERE id=$com_id";
mysqli_set_charset($conn, 'utf8');

    $insert = mysqli_query($conn,$qry);
    if($insert) {
      echo"<script>alert('تم التحديث بنجاح'); window.location.href='../tables/com_list.php';</script>"; 
      }else{
      echo "<script>alert('لم يتم التحديث بنجاح'); window.location.href='update_company.php';</script>";
      }
            
}else{
    echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='update_company.php';</script>";
  }
?>