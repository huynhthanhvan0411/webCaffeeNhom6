<?php
$fullname = $email = $msg = '';

if(!empty($_POST)) {
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd1 = getSecurityMD5($pwd);

    $sql = "select * from user where email = '$email' and password= '$pwd1'";
    $userExist = executeResult($sql,true);
    if($userExist == null) {
        $msg = 'Đăng Nhập Không Chính Xác, Vui Lòng Bạn Kiểm Tra Lại';
    }else {
       // login thanh cong
        $token = getSecurityMD5($userExist['email'].time());
        setcookie('token',$token,time() +7 * 24 * 60 * 60,'/');
        $created_at = date('Y-m-d H:i:s');

        $_SESSION['user'] = $userExist;
        $userId = $userExist['id'];
        $sql = "insert into tokens (USER_id, token,created_at) values 
        ('$userId','$token','$created_at')";
        execute($sql);

        header('Location: ../');
        die();
    }
}