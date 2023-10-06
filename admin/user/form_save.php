<?php 
if (!empty($_POST)) {
    $id = getPost('id');
 	$fullname = getPost('fullname');
 	$email = getPost('email');
 	$phone_number = getPost('phone_number');
 	$address = getPost('address');
 	$password = getPost('password');
    if($password != ''){
        $password = getSecurityMD5($password);
    }
 	$role_id = getPost('role_id');
 	$created_at=$updated_at=date("Y-m-d H:i:s");
    $avatar = moveFile('avatar');
    if($id>0){
        $sql="select * from user where email = '$email' and id <> $id";
        $userIteam=executeResult($sql,true);
        if ($userIteam != null) {
            $msg = 'Email này đã tồn tại trong tài khoản khác, vui lòng kiểm tra lại !';
        }else{
            if($password != ''){
                if($avatar != ''){
                $sql = "update user set fullname='$fullname',email='$email',phone='$phone_number',address='$address',password='$password',role_id='$role_id',thumbnail1='$avatar',updated_at='$updated_at' where id = $id";
            }else{
               $sql = "update user set fullname='$fullname',email='$email',phone='$phone_number',address='$address',password='$password',role_id='$role_id',updated_at='$updated_at' where id = $id"; 
            }
            }else{
                if($avatar != ''){
                $sql = "update user set fullname='$fullname',email='$email',phone='$phone_number',address='$address',role_id='$role_id',thumbnail1='$avatar',updated_at='$updated_at' where id = $id";
            }else{
                $sql = "update user set fullname='$fullname',email='$email',phone='$phone_number',address='$address',role_id='$role_id',updated_at='$updated_at' where id = $id";
            }
        }
            execute($sql);
            header('Location: index.php');
            die();
            }
        

    }else{
        $sql="select * from user where email = '$email'";
        $userIteam=executeResult($sql,true);
     	if($userIteam == null){
     		$sql = "insert into user(fullname,email,phone,address,password,role_id,thumbnail1,deleted,created_at,updated_at) value('$fullname','$email','$phone_number','$address','$password','$role_id','$avatar',0,$created_at,$updated_at)";
     		execute($sql);
            
     		header('Location: index.php');
     		die();
 	
     	} else {
     		$msg = 'Email đã được đăng ký, vui lòng kiểm tra lại !!!';
     	}
 	
 }
} ?>