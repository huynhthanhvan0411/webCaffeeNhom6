<?php
	//Nhúng các thư viện
	session_start();
	require_once('../../utils/utility.php');
	require_once('../../db/dbhelper.php');
	require_once('process_form_login.php');
	$user = getUserToken();
	if($user != null) {
		header('Location: ../');
        die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,700;1,300&family=Oswald:wght@300&display=swap" rel="stylesheet">

    <!-- FONT AWS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- JQUERY JS   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BS JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</head>

	<div class="container">
		<div class="panel panel-primary" style="width: 480px;margin: 0px auto; margin-top: 50px;
        padding: 10px; border-radius: 20px;box-shadow: 5px 5px 5px #51175F; background: rgba(231, 234, 238, 0.6);">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Nhập</h2>
				<h7 style= "color: red;" class="text-center"><?= $msg?></h7>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					<label for="email">Email:</label>
					<input required="true" type="email" class="form-control" id="email" name = "email" value ="<?=$email?>">
					</div>
					<div class="form-group">
					<label for="pwd">Mật Khẩu:</label>
					<input required="true" type="password" class="form-control" id="pwd" name="password" minlength = "6">
					</div>
					<p>
						<a href="register.php">Đăng Ký Tài Khoản</a>
					</p>
					<button class="btn btn-success">Đăng Nhập</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>