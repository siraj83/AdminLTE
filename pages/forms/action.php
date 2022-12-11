<?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `dumps` where region= '".$_POST['regionID']."' ORDER BY name";
                       $result = $conn->query($sql);
 $output .= '<option selected disabled>إختر المكب</option>';
                      
                       while ($row = mysqli_fetch_array($result)){ 
                         
$output .= '<option value=" '.$row["id"].'"> '. $row['name'].' </option>';
 }
echo $output;
?>