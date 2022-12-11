<?php
$host = "localhost:3306";
$user = "whereiea_root";
$pass ="whereiea_dumpsys";
$db = "whereiea_dumpsys";

$conn = mysqli_connect($host,$user,$pass,$db);
if($conn-> connect_error) {
    die("There are some problem while connecting the database!". $conn-> connect_error);
}
?>