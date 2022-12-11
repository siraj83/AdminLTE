<?php
include '../sources/config.php';
 if(isset($_POST['add_data'])){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $structure_no = $_POST['structure_no'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    foreach($name as $key => $value){
    $qry = "INSERT INTO `trucks`(`name`, `number`, `structure_no`, `date`, `status`, `notes`) 
    VALUES ( '".$value."', '".$number[$key]."', '".$structure_no[$key]."', '".$date[$key]."', '".$status[$key]."', '".$notes[$key]."')";
         mysqli_set_charset($conn, 'utf8');
            $insert = mysqli_query($conn,$qry);



    // foreach($_POST['name'] as $key => $value){
    // $qry = "INSERT INTO `trucks`(`name`, `number`, `structure_no`, `date`, `status`, `notes`) 
    // VALUES ( :name, :number, :structure_no, :date, :status, :notes)";






// $stmt=$conn->prepare($qry);
// $stmt->execute([
//     'name'=>$value,
//     'number'=>$_POST['number'][$key],
//     'structure_no'=>$_POST['structure_no'][$key],
//     'date'=>$_POST['date'][$key],
//     'status'=>$_POST['status'][$key],
//     'notes'=>$_POST['notes'][$key],
// ]);
//     echo'Items inserted successfully!';
    
    }
 }
?>