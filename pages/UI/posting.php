<?php 
include '../sources/config.php';
include '../sources/function.php';

$user = $_SESSION['username'];
$userid = qury_free2("SELECT id FROM `users` WHERE username = '$user'");
$old_postID = qury_free2("SELECT `post_id` FROM `timeline` ORDER BY post_id DESC LIMIT 1");
$new_postID = ($old_postID +1);
$post = $_POST['post'];
date_default_timezone_set('Africa/Tripoli');
$date = date('Y-m-d');
$time = date('H:i:s');

$dump_id = qury_free2("SELECT dump_id from municipalities where id = (SELECT mun_id from users where username = '$user')");

if(isset($_POST['post']) && !empty($post)){
    $qry = "INSERT INTO `timeline`(`user_id`,`post_id`,`post`,`dump_id`,`date`,`time`) VALUES ($userid, $new_postID, '$post', $dump_id, '$date', '$time')";

    mysqli_set_charset($conn, 'utf8');

$insert = mysqli_query($conn,$qry);
if($insert){
    echo "تم النشر";
}
}
if(isset($_FILES['images']) && !empty($_FILES['images'])){
    foreach($_FILES['images']['name'] as $i => $value){
        $image_name = $_FILES['images']['tmp_name'][$i];
        $folder = "upload/";
        $image_path = $folder.$_FILES['images']['name'][$i];
        move_uploaded_file($image_name, $image_path);
    if($image_path != 'upload/'){
        $sql = "INSERT INTO `timeline`(`imag_path`,`post_id`, `user_id`,`dump_id`) VALUES (?, $new_postID, $userid, $dump_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$image_path);
        $stmt->execute();
    }
        
}
if($stmt){
    echo "تم النشر";
};
}

?>