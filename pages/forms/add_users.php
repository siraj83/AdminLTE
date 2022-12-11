<?php
include '../sources/config.php';
if(isset($_POST['name'], $_POST['permission_id'], $_POST['add_user'])) {
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$position = $_POST['position'];
$management = $_POST['management'];
$permission_id = $_POST['permission_id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$company_id = $_POST['company_id'];
$mun_id = $_POST['mun_id'];


$check ="SELECT username from `users` WHERE username = '$username'";
$qry = "INSERT INTO `users`(`name`, `phone_no`, `email`, `position`,`management`,`permission_id`,`username`,`password`,`company_id`,`mun_id`) 
VALUES ('$name', '$phone', '$email', '$position', '$management', '$permission_id', '$username','$password','$company_id', '$mun_id')";
mysqli_set_charset($conn, 'utf8');
$exist =mysqli_query($conn,$check);

if(mysqli_num_rows($exist) == 0){
$insert = mysqli_query($conn,$qry);
if($insert) {
  echo"<script>alert('تم الإضافة بنجاح'); window.location.href='../tables/users.php';</script>"; 
}else{
  echo "<script>alert('حدث خطأ لم يتم الإضافة بنجاح'); window.location.href='../forms/add_user.php';</script>";
}
}else{
    echo "<script>alert('تم إضافة الاسم المستخدم  مسبقآ'); window.location.href='../forms/add_user.php';</script>";
  }
}else{
    echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='../forms/add_user.php';</script>";
  }
?>

<?php
include '../sources/config.php';
if(isset($_POST['name'], $_POST['update_com'])) {
$Cname = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$position = $_POST['position'];
$management = $_POST['management'];
$permission_id = $_POST['permission_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$company_id = $_POST['company_id'];
$mun_id = $_POST['mun_id'];


$check ="SELECT username from `users` WHERE username = '$name'";
$qry = "UPDATE `users` SET Cname ='$Cname', phone ='$phone', email = '$email', position = '$position', management = '$management', permission_id = '$permission_id',
username = '$username',password = '$password',company_id = '$company_id', mun_id = '$mun_id')";
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