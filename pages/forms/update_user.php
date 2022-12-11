<?php 
include '../sources/config.php';
  if(isset($_POST['name'], $_POST['permission_id'], $_POST['update_user'])) {
    $name = $_POST['name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $management = $_POST['management'];
    $permission_id = $_POST['permission_id'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $company_id = $_POST['company_id'];
    $mun_id = $_POST['mun_id'];
    
    // $user_id = "SELECT id from `users` WHERE username = '$username' ";
    // $check ="SELECT username from `users` WHERE username = '$username'";
    $qry = "UPDATE `users` SET `name`='$name',`position`='$position',`username`='$username',`password`='$password',`phone_no`='$phone_no',`email`='$email',
    `management`='$management',`mun_id`='$mun_id',`company_id`='$company_id',`permission_id`='$permission_id' WHERE username= '$username'";
    mysqli_set_charset($conn, 'utf8');
    // $exist =mysqli_query($conn,$check);
    
    // if(mysqli_num_rows($exist) == 0){
    $insert = mysqli_query($conn,$qry);
    if($insert) {
      echo"<script>alert('تم الإضافة بنجاح'); window.location.href='../tables/users.php';</script>"; 
    }else{
      echo "<script>alert('حدث خطأ لم يتم الإضافة بنجاح'); window.location.href='../forms/add_user.php';</script>";
    }
    // }else{
    //     echo "<script>alert('تم إضافة الاسم المستخدم  مسبقآ'); window.location.href='../forms/add_user.php';</script>";
    //   }
    }else{
        echo "<script>alert('يجب إدخال البيانات الاساسية'); window.location.href='../forms/add_user.php';</script>";
      }
?>