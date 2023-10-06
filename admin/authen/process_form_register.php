<?php
$fullname = $email = $msg = '';
if(!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');

    //validate
    if(empty($fullname)||empty($email)||empty($pwd)||strlen($pwd) <6) {

    } else {
        //Validate Thành Công
        $userExist = executeResult("select *from user where email = '$email'",true);
        if($userExist != null) {
            $msg = 'Email đã được đăng Ký trên hệ thống';
        } else {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            //Sử Dụng Mã Hóa 1 Chiều -> md5
            $pwd = getSecurityMD5($pwd);

            $sql = "insert into user (fullname,email,password,role_id,created_at,updated_at,deleted) 
            values ('$fullname','$email','$pwd',2,'$created_at','$updated_at',0)";
            execute($sql);
            header('Location: login.php');
            die();
        }
    }
}