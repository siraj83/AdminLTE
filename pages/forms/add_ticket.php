<?php
include '../sources/config.php';
include '../sources/function.php';
if(isset($_POST['message'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$mun_id = $_POST['mun_id'];
$subject = $_POST['subject'];
$message = $_POST['message'];
//$image = $_POST['image'];

$old_ticketID = qury_free2("SELECT `ticket_id` FROM `tickets` ORDER BY ticket_id DESC LIMIT 1");
$new_ticketID = ($old_ticketID +1);
date_default_timezone_set('Africa/Tripoli');
$date = date('Y-m-d');
$time = date('H:i:s');
$qry = "INSERT INTO `tickets`(`name`, `email`, `mun_id`, `ticket_id`, `subject`, `message`, `date`, `time`)
VALUES ('$name', '$email', '$mun_id', '$new_ticketID', '$subject', '$message', '$date', '$time')";

if(isset($_FILES['images']) && $_FILES['images'] !=""){
  foreach($_FILES['images']['name'] as $i => $value){
      $image_name = $_FILES['images']['tmp_name'][$i];
      $folder = "../UI/upload/img_ticket/";
      $image_path = $folder.$_FILES['images']['name'][$i];
      move_uploaded_file($image_name, $image_path);
  if($image_path != '../UI/upload/img_ticket/'){
      $sql = "INSERT INTO `tickets`(`imag_path`,`name`, `email`, `mun_id`,`ticket_id`, `subject`, `message`, `date`, `time`) 
      VALUES (?, '$name', '$email', '$mun_id','$new_ticketID', '$subject', '$message',  '$date', '$time')";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$image_path);
      $stmt->execute();
  }
  else{
    mysqli_set_charset($conn, 'utf8');
    $insert = mysqli_query($conn,$qry);

    if($insert) {
  echo"<script>alert('نشكركم على التعاون'); window.location.href='contact-us.php';</script>"; 
}else{
  echo "<script>alert('حدث خطأ لم يتم الإرسال بنجاح'); window.location.href='contact-us.php';</script>";
}
  }
      
}

}
// else{
//   mysqli_set_charset($conn, 'utf8');
//   $insert = mysqli_query($conn,$qry);
  
//   if($insert) {
//     echo"<script>alert('نشكركم على التعاون'); window.location.href='contact-us.php';</script>"; 
//   }else{
//     echo "<script>alert('حدث خطأ لم يتم الإرسال بنجاح'); window.location.href='contact-us.php';</script>";
//   }

// }


}else
echo "<script>alert('أكتب محتوى الشكوى!!'); window.location.href='contact-us.php';</script>";
?>