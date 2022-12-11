<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php

define('DB',$_SERVER['DOCUMENT_ROOT'].'/dumpsys/pages/sources/config.php');
define('sidebar',$_SERVER['DOCUMENT_ROOT'].'/dumpsys/includes/sidebar.php');
    if(isset($_POST['delete_dump'])){
      $dump_id = $_POST['delete_dump'];
      include '../sources/config.php';
mysqli_set_charset($conn, 'utf8');
$sql= "DELETE FROM `dumps` WHERE id= $dump_id";

  $result = mysqli_query($conn,$sql);
  if ($result){
    echo"<script>alert('تم حذف المكب بنجاح'); window.location.href='../tables/dumps_list.php';</script>";
  }
  else{
    echo "لايمكنك حدف هذه البيانات لانها مرتبطة بحقول أخرى!!";
  }  

}
  ?>
<?php
    if(isset($_POST['delete_mun'])){
      $mun_id = $_POST['delete_mun'];
      include '../sources/config.php';
mysqli_set_charset($conn, 'utf8');
$sql= "DELETE FROM `municipalities` WHERE id= $mun_id";

  $result = mysqli_query($conn,$sql);
  if ($result){
    echo"<script>alert('تم حذف البلدية بنجاح'); window.location.href='../tables/mun_list.php';</script>";
  }
  else{
    echo "لايمكنك حدف هذه البيانات لانها مرتبطة بحقول أخرى!!";
  }  

}
  ?>
<?php
    if(isset($_POST['delete_com'])){
      $com_id = $_POST['delete_com'];
      include '../sources/config.php';
mysqli_set_charset($conn, 'utf8');
$sql= "DELETE FROM `service_companies` WHERE id= $com_id";

  $result = mysqli_query($conn,$sql);
  if ($result){
    echo"<script>alert('تم حذف الشركة بنجاح'); window.location.href='../tables/com_list.php';</script>";
  }
  else{
    echo "لايمكنك حدف هذه البيانات لانها مرتبطة بحقول أخرى!!";
  }  

}
  ?>
<?php 
  function get_location($dump_id,$culm){
    
                            include '../sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT * from dumps where id = $dump_id";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                print $row[$culm];
                            }
 ?>
<?php } ?>

<?php 
function get_result($dump_id,$culm){
    include '../sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT * from dumps where id = $dump_id ORDER BY $culm";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                return $row[$culm];
                            }
}
?>
<?php 
    function get_loc($dump_id){
        
               $lat=  get_result($dump_id,'lat');
                $lng =  get_result($dump_id,'lat');
if($lat == 0 || $lng == 0){
        echo "lat: 32.810281,
        lng: 13.174953";
}else{
        echo "lat: $lat,lng: $lng";
}
        }?>

<?php 
    function get_details ($qurry,$label,$show){
      ?>
<?php
                            include DB;
                            mysqli_set_charset($conn, 'utf8');
                            $sql = $qurry;
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                           ?>
</br>
<label> <?php echo $label ?> </label>
</br>
<?php print $row[$show]; ?>
<?php } ?>
<?php  } ?>

<?php 
    function get_details2 ($qurry,$label){
      ?>
<?php
                         include DB;
                            mysqli_set_charset($conn, 'utf8');
                            $sql = $qurry;
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                           ?>
</br>
<label> <?php echo $label ?> </label>
</br>
<?php print $row[0]; ?>
<?php } ?>
<?php  } ?>

<?php 
    function get_exist ($qurry,$label,$show){
      ?>
<?php
                            include '../sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = $qurry;
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                           ?>
</br>
<label> <?php echo $label ?> </label>
</br>
<?php
                             if($row[$show]==0)
                             {
                                 print "لا يوجد";
                            
                             }
                            else{
                              print "يوجد";
                            } }?>
<?php } ?>
<?php
function exist_or_not ($result){
     
                    if($result==0)
                             {
                                 return "لا يوجد";
                             }
                    elseif($result==1){
                              return "يوجد";
                            } }?>


<?php function get_municipality(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from municipalities";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function municipality(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from municipalities";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status) ;
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_mun_wod(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from municipalities where Landfill_exist =0";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>

<?php function get_company(){   
                                include DB;
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from service_companies";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function company(){                          
                                 include DB;
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from service_companies";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>

<?php function get_dumps(){                          
                                include '../dumpsys/pages/sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from dumps";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function dumps(){                          
                                include '../sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(id) from dumps";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function qury_star($q){                          
                                include '../sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "$q";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
<?php  } ?>
<?php function qury_free($q){                          
                                include DB;
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "$q";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function qury_free2($q){                          
                                include DB;
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "$q";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function qury_w($q,$table,$where,$id){                          
                                include '../sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT $q from $table where $where= $id ORDER BY $q";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                 if ($row[0] == null || $row[0] == 0){
                                    return 'لا يوجد';
                                 }else{
                                     return $row[0];
                                 }
                                 ?>
<?php  } ?>
<?php function qury_w1($q,$table,$where,$id){                          
                                include '../dumpsys/pages/sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT $q from $table where $where= $id ORDER BY $q";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function qury_ww($q,$table,$where1,$id1,$where2,$id2){                          
                                include '../sources/config.php';
                                mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT $q from $table where $where1= $id1 && $where2=$id2";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_work_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=1";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function work_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=1";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>

<?php function get_stop_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=2";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function stop_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=2";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function un_cons_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=3";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function in_process_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=4";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function suggestion_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=5";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_un_cons_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=3";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_in_process_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=4";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_suggestion_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE status_id=5";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function get_woe_dumps(){                          
                                 include '../dumpsys/pages/sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(Landfill_exist) from municipalities WHERE Landfill_exist=0";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>
<?php function woe_dumps(){                          
                                 include '../sources/config.php';
                                 mysqli_set_charset($conn, 'utf8');
                                 $qry = "SELECT COUNT(status_id) from dumps WHERE type=1";
                                 $status = $conn->query($qry);
                                 $row = mysqli_fetch_array($status);
                                return $row[0]
                                 ?>
<?php  } ?>

<?php
                            function get_st_own(){  
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT COUNT(ownership_id) FROM dumps WHERE ownership_id =1";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count);
                              return $row[0]
                              ?>
<?php }?>

<?php
                            function get_pr_own(){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT COUNT(ownership_id) FROM dumps WHERE ownership_id =0";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count);
                              return $row[0]
                              ?>
<?php }?>

<?php
                            function pop_total(){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT sum(popu_questionnaire) FROM municipalities";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count);
                              return $row[0]
                              ?>
<?php }?>
<?php
                            function get_pop_total(){
                              include '../dumpsys/pages/sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT sum(popu_questionnaire) FROM municipalities";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count) ;
                              return $row[0]
                              ?>
<?php }?>
<?php 
                            function popu($mun_id,$culm){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT * FROM municipalities where id= $mun_id ORDER BY $culm";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count) ;
                               if ($row[$culm] == null || $row[$culm] == 0){
                                return 'لا يوجد';
                             }else{
                                 return $row[$culm];
                             }
                              ?>
<?php }?>
<?php 
                            function comp($com_id,$culm){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT * FROM service_companies where id= $com_id";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count) ;
                               if ($row[$culm] == null || $row[$culm] == 0){
                                return 'لا يوجد';
                             }else{
                                 return $row[$culm];
                             }
                              ?>
<?php }?>
<?php 
                            function region($reg_id,$culm){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT * FROM regions where id= $reg_id";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count) ;
                              return $row[$culm]
                              ?>
<?php }?>

<?php 
                            function status_no($dump_id,$culm){
                              include '../sources/config.php'; 
                              mysqli_set_charset($conn, 'utf8');
                              $sql= "SELECT Sname FROM `dumps_status` WHERE id = (SELECT status_id FROM `dumps` WHERE id = $dump_id)";
                              $count = $conn->query($sql);
                              $row = mysqli_fetch_array($count) ;
                              return $row[$culm]
                              ?>
<?php }?>
<?php
function get_contract($cont_no){ 
    ?>

<div class="callout callout-info">
    <div class="card-header">
        <label class="card-title" style="float: right;" font-weight: bold;>بيانات
            التعاقد</label>
    </div>
    <div class="row invoice-info" style="text-align: right;">
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'عنوان التعاقد','name');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'رقم التعاقد','no_contract');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'الشركة المنفذة','co_implement');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'قيمة العقد الأصلية','contract_value');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'السعة التخزينية للمكب بالمتر المكعب','size');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'عدد السكان 2018','population');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'كمية المخلفات الصلبة المتولدة خلال سنة / بالطن','waste_amount');
                       ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <?php
                       get_details ("SELECT * from `contract` where ID = $cont_no",'العمر الافتراضي للخلية بالسنة','EOL');
                       ?>
        </div>
    </div>
</div>
<?php }
?>
<?php function get_length(){
    
    include '../dumpsys/pages/sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT COUNT(id) FROM `dumps` where lat && lng IS NOT NULL";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                print $row[0];
                            }

}

?>
<?php function get_locations_lat($id){
    
    include '../dumpsys/pages/sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT lat FROM `dumps` where id=$id";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                print $row[0];
                            }

}

?>
<?php function get_locations_lng($id){
    
    include '../dumpsys/pages/sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT lng FROM `dumps` where id=$id";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                print $row[0];
                            }

}

?>
<?php function get_locations_name($id){
    
    include '../dumpsys/pages/sources/config.php';
                            mysqli_set_charset($conn, 'utf8');
                            $sql = "SELECT name FROM `dumps` where id=$id";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_array($result)){
                                print $row[0];
                            }

}

?>
<?php   
function confirm($com_id) {

    include '../sources/config.php';
    mysqli_set_charset($conn, 'utf8');
    $sql= "UPDATE `service_companies` SET confirmed = 1, `editer_id`= 'MWE',`last_event`='تحديث' where id = $com_id";
    $conn->query($sql); 
}
                                
?>
<?php 
// if (!isset($_SESSION['username'])){
//     header('location: https://test4test.website/dumpsys/login.php');
// }
?>
    
</html>