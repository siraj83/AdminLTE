<?php

session_start();
if (session_status() === PHP_SESSION_NONE || empty($_SESSION['username'])) {
    header("Location: ../../login.php");
        ob_end_flush();
        exit();
}

include '../sources/function.php';
include '../sources/config.php';

if (!isset($_SESSION['username'])){
    header('location: login.php');
}
$user = $_SESSION['username'];

$dump_id = qury_free2("SELECT dump_id from municipalities where id = (SELECT mun_id from users where username = '$user')");

// echo $dump_id;
?>
<!DOCTYPE html>
<html lang="ar">


<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة مراقبة المكبات | اليوميات</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js">


    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script> -->

    <?php function get_images($id){
        include '../sources/config.php';
mysqli_set_charset($conn, 'utf8');
$result = $conn->query("SELECT `imag_path` FROM `timeline` WHERE `post_id` = $id && `imag_path` != 'upload/' ORDER BY id DESC");
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){ echo "<br>";?>
    <br>
    <img class="img-fluid" src="<?php echo ($row['imag_path'])?>" />
    <?php }}?>

    <?php } ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <?php include sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style=" margin-left: 0px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row" style="display: block;">
                    <div class="col-md-12">
                        <h1 class="text-center">اليوميات</h1>
                        </br>
                        </br>
                        <?php 
                        if($dump_id == NULL || $dump_id == 0){
                              $dump_id = 1;?>
                        <!-- <p class="text-center" for="inputName">اسم المكب</p> -->
                        <div class="form-row">
                            <select id="dump_no" name="dump_no" class="form-control custom-select">
                                <option selected disabled>إختر اسم المكب</option>
                                <?php
                       include '../sources/config.php';
                       mysqli_set_charset($conn, 'utf8');
                       $sql= "SELECT * FROM `dumps`";
                       $result = $conn->query($sql);
                       while ($row = mysqli_fetch_array($result)){ 
                         ?>
                                <option value="<?php print($row["id"]); ?>"> <?= $row['name']; ?> </option>
                                <?php }?>
                            </select>
                        </div>


                        <h3 id="dump" class="text-center"><?php echo "مكب ", qury_w('name','dumps','id',$dump_id)?></h3>


                        <?php }else{?>
                        <h3 class="text-center"><?php echo "مكب ", qury_w('name','dumps','id',$dump_id)?></h3>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content ">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row" style="direction: rtl;">
                    <div class="col-md-12">


                        <form action="" method="POST" id="image_upload" enctype="multipart/form-data">

                            <div class="card card-praimry p-4" style="width:100% ">

                                <div class="form-group">
                                    <label class="sr-only" for="post">post</label>
                                    <textarea class="form-control" id="post" name="post" rows="2"
                                        placeholder="بماذا تفكر؟" style="direction: rtl;"></textarea>
                                </div>


                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="images[]"
                                            accept="image/*" multiple>
                                        <label class="custom-file-label" id="choose_file" for="image">إختر
                                            الملف</label>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
<div class="form-group">
<div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Upload image</label>
</div>
</div>
<div class="py-4"></div>
</div> -->


                                <div class="btn-toolbar justify-content-between">
                                    <div class="btn-group">
                                        <input class="btn btn-info btn-block " name="submit" type="submit" value="شارك">
                                    </div>
                                    <h5 class="text-center text-success" id="result"></h5>
                                </div>
                            </div>

                        </form>

                        <br>

                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content ">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row" style="direction: rtl;">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <?php 
                                    mysqli_set_charset($conn, 'utf8');
                                    $result = $conn->query("SELECT DISTINCT `post_id` FROM `timeline` where dump_id = $dump_id ORDER BY post_id DESC");
                                    if($result->num_rows > 0){
                                 while($row = $result->fetch_assoc()){
                                            $id= $row['post_id'];
                                                   ?>
                            <div class="time-label" style="direction: rtl;">
                                <span
                                    class="bg-red"><?php echo qury_free2("SELECT DISTINCT `date` FROM `timeline` WHERE `post_id` = $id ")?></span>
                            </div>

                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item" style="text-align: right;">
                                    <span class="time" style="text-align: left; float: left;"><i class="fas fa-clock"
                                            style=" float: left;"></i><?php echo qury_free2("SELECT DISTINCT `time` FROM `timeline` WHERE `post_id` = $id ")?></span>
                                    <h3 class="timeline-header" style="text-align: right;"><a
                                            href="#"><?php echo qury_free2("SELECT name from users where id = (SELECT DISTINCT user_id from timeline where post_id = $id )")?></a>
                                        <?php echo qury_w('position','users','id',"(SELECT DISTINCT user_id from timeline where post_id = $id)")?>
                                    </h3>
                                    <div class="timeline-body">
                                        <?php
                                       $post = qury_free2("SELECT `post` FROM `timeline` WHERE `post` is not Null && `post_id` = $id ");
                                       if(!empty($post)){
                                                echo $post;
                                       }
                                       ?>
                                        <!-- // Get image data from database -->
                                        <?php get_images($id); ?>
                                    </div>
                                </div>
                            </div>
                            <?php  }}
                                            ?>

                            <!-- END timeline item -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
    </script>
    <script>
    $(function() {

        //Add event listener to dropdown with class radio-line
        $("#dump_no").change(function() {

            //Get the text of the selected option. Not its value
            var text = $(this).find("option:selected").text();

            //Update the text of h1
            $("#dump").text(text);

        });

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#image").on('change', function() {
            var filename = $(this).val();
            $(choose_file).html(filename);
        });
    });

    $("#image_upload").submit(function(e) {
        // e.preventDefault();
        $.ajax({
            url: 'posting.php',
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(response) {
                $("#result").html(response);
            }
        });

    });
    // load_images();

    // function load_images() {
    //     $.ajax({
    //         url: 'load_imag.php',
    //         method: 'get',
    //         success: function(data) {
    //             $("#post_preview").html(data);
    //         }
    //     })
    // }
    </script>
</body>

</html>