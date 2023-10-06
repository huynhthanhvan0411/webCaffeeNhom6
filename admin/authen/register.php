<?php
	//Nhúng các thư viện mk cần làm
	session_start();
	require_once('../../utils/utility.php');
	require_once('../../db/dbhelper.php');
	require_once('process_form_register.php');
	$user = getUserToken();
	if($user != null) {
		header('Location: ../');
        die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style = "background-image: url(../../assets/image/aaaa.jpg); background-size: cover;
background-repeat: no-repeat;">
	<div class="container">
		<div class="panel panel-primary" style="width: 480px;margin: 0px auto; margin-top: 50px;
        padding: 10px; border-radius: 20px;box-shadow: 5px 5px 5px #51175F; background: rgba(231, 234, 238, 0.6);">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Ký Tài Khoản</h2>
				<h7 style= "color: red;" class="text-center"><?= $msg?></h7>
			</div>
			<div class="panel-body">
				<form method="post" onsubmit = "return validateForm();">
					<div class="form-group">
					<label for="usr">Họ Tên:</label>
					<input required="true" type="text" class="form-control" id="usr" name= "fullname"
					value = "<?=$fullname?>">
					</div>
					<div class="form-group">
					<label for="email">Email:</label>
					<input required="true" type="email" class="form-control" id="email" name = "email" value ="<?=$email?>">
					</div>
					<div class="form-group">
					<label for="pwd">Mật Khẩu:</label>
					<input required="true" type="password" class="form-control" id="pwd" name="password" minlength = "6">
					</div>
					<div class="form-group">
					<label for="confirmation_pwd">Xác Minh Lại Mật Khẩu:</label>
					<input required="true" type="password" class="form-control" id="confirmation_pwd" minlength = "6">
					</div>
					<p>
						<a href="login.php">Đã có tài khoản</a>
					</p>
					<button class="btn btn-success">Đăng Ký</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function validateForm() {
			$pwd = $('#pwd').val();
			$confirmPwd = $('#confirmation_pwd').val();
			if($pwd != $confirmPwd) {
				alert("Mật Khẩu Không Khớp, Vui Lòng Bạn Kiểm Tra Lại")
				return false
			}
			return true
		}
	</script>
</body>
</html>