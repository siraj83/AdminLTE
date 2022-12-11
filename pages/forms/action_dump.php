<?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `municipalities` where region_id= '".$_POST['regionID']."' ORDER BY Mname";
                       $result = $conn->query($sql);
 $output .= '<option selected disabled>إختر البلدية</option>';
                      
                       while ($row = mysqli_fetch_array($result)){ 
                         
$output .= '<option value=" '.$row["id"].'"> '. $row['Mname'].' </option>';
 }
echo $output;
?>