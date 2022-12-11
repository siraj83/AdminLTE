<?php
include '../sources/config.php';
if(isset($_POST['name'], $_POST['add_com'])) {
$Cname = $_POST['name'];
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
$last_event = 'إضافة';
// $number_of_dumps = $_POST['number_of_dumps'];
// $covered_service = $_POST['covered_service'];
// $collection_service = $_POST['collection_service'];

$check ="SELECT Cname from `service_companies` WHERE Cname = '$Cname'";
$qry = "INSERT INTO `service_companies`(`Cname`, `phone`, `email`, `address`,`contract_no`,`contrsct_value`,`contract_period`,`contract_date`,`contract_method`,`contract_type`,`mun_id`, `editer_id`, `last_event`) 
VALUES ('$Cname', '$phone', '$email', '$address', '$contract_no', '$contrsct_value', '$contract_period','$contract_date','$contract_method', '$contract_type', '$mun_id', '$editer_id', '$last_event')";
mysqli_set_charset($conn, 'utf8');
$exist =mysqli_query($conn,$check);

if(mysqli_num_rows($exist) == 0){
$insert = mysqli_query($conn,$qry);
if($insert) {
  echo"<script>alert('تم الإضافة بنجاح'); window.location.href='../tables/com_list.php';</script>"; 
}else{
  echo "<script>alert('حدث خطأ لم يتم الإضافة بنجاح'); window.location.href='add_service_company.php';</script>";
}
}else{
    echo "<script>alert('تم إضافة هذة الشركة مسبقآ'); window.location.href='add_service_company.php';</script>";
  }
}else{
    echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='add_service_company.php';</script>";
  }
?>

<?php
include '../sources/config.php';
if(isset($_POST['name'], $_POST['update_com'])) {
$Cname = $_POST['name'];
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
// $number_of_dumps = $_POST['number_of_dumps'];
// $covered_service = $_POST['covered_service'];
// $collection_service = $_POST['collection_service'];

$check ="SELECT Cname from `municipalities` WHERE Mname = '$name'";
$qry = "UPDATE `service_companies` SET Cname ='$Cname', phone ='$phone', email = '$email', address = '$address', contract_no = '$contract_no', contrsct_value = '$contrsct_value',
contract_period = '$contract_period',contract_date = '$contract_date',contract_method = '$contract_method', contract_type = '$contract_type',mun_id = '$mun_id')";
mysqli_set_charset($conn, 'utf8');
$exist =mysqli_query($conn,$check);

if(mysqli_num_rows($exist) == 0){
    $insert = mysqli_query($conn,$qry);
    if($insert) {
        echo"<script>alert('تم التحديث بنجاح'); window.location.href='mun_list.php';</script>"; 
      }else{
        echo "<script>alert('لم يتم التحديث بنجاح'); window.location.href='add_municipality.php';</script>";
      }
      }else{
        echo "<script>alert('تم إضافة هذة الشركة مسبقآ'); window.location.href='add_municipality.php';</script>";
      }
      
}else{
    echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='add_municipality.php';</script>";
  }
?>