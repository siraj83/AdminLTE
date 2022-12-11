<?php

    if(isset($_REQUEST['login'])){
        $results = login($conn, $username, $password);

        foreach($results as $r){

            $pwd_check = password_verify($password, $r['password']);

            if($pwd_check){
                $_SESSION['username'] = $r['username'];
            }else{
               echo "<script>alert('عذرآ.. لقد قمت بإدخال اسم المستخدم او كلمة السر غير صحيحة!'); window.location.href='#';</script>";
            }
        
        }
    }

    if(isset($_REQUEST['logout'])){
        session_destroy();
        header("Location: https://test4test.website/dumpsys/login.php");
        exit();
    }

?>