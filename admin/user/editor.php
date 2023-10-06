<?php
	$title = 'Thêm/Sửa Tài Khoản';
	$baseUrl = '../';
	require_once('../layouts/header.php');
	$id=$msg = $fullname =$email =$phone_number=$address=$role_id=$avatar='';
	require_once('form_save.php');

	
	$id= getGet('id');
	if ($id != '' && $id > 0) {
		$sql = "select * from user where id = '$id'";
		$userIteam = executeResult($sql,true);
		if($userIteam != null){
			$fullname = $userIteam['fullname'];
			$email = $userIteam['email'];
			$phone_number = $userIteam['phone'];
			$address = $userIteam['address'];
			$role_id = $userIteam['role_id'];
			$avatar = $userIteam['thumbnail1'];
		}else {
			$id=0;
		}
	}else{
		$id=0;
	}
	$sql = "select * from role";
	$roleIteams = executeResult($sql);

?>

<div class="row" style="margin-top:20px ;">
	<div class="col-md-12 table-responsive">
		<h3>Thêm/Sửa người dùng</h3>
			<div class="panel panel-primary" >
				<div class="panel-heading">
					<h5 style="color: red;" class="text-center"><?=$msg?></h5>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
						<div class="form-group">
							<label for="usr">Họ & Tên</label>
							<input required="true" class="form-control" id="usr" type="text" name="fullname" value="<?=$fullname?>">
							<input type="text" name="id" value="<?=$id?>" hidden = "true">
						</div>
						<?php if ($user['role_id']==1){?>
						<div class="form-group">
							<label for="usr">Role</label>
							<select class="form-control" name="role_id" required="true">
								<option value="">-- Chọn --</option>
								<?php 
									foreach ($roleIteams as $role) {
										if ($role['id'] == $role_id){
											echo '<option selected value="'.$role['id'].'">'.$role['name'].'</option>';
										}
										echo '<option value="'.$role['id'].'">'.$role['name'].'</option>';
									}
								 ?>
							</select>
						</div> <?php }?>
						<div class="form-group">
						  <label for="avatar">Ảnh:</label>
						  <input type="file" class="form-control" id="avatar" name="avatar" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input required="true" class="form-control" id="email" type="email" name="email" value="<?=$email?>">
						</div>
						<div class="form-group">
							<label for="phone_number">SĐT:</label>
							<input required="true" class="form-control" id="phone_number" type="tel" name="phone_number" value="<?=$phone_number?>">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ:</label>
							<input required="true" class="form-control" id="address" type="text" name="address" value="<?=$address?>">
						</div>

						<div class="form-group">
							<label for="pwd">Mật Khẩu:</label>
							<input <?=($id > 0?'': 'required="true"') ?> class="form-control" id="pwd" type="password" name="password" minlength="6" >
						</div>
						<div class="form-group">
							<label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
							<input <?=($id > 0?'': 'required="true"') ?>   class="form-control" id="confirmation_pwd" type="password" minlength="6" >
						</div>
						<button class="btn btn-success">Đăng Ký/Sửa</button>
					</form>
				</div>
			</div>
	</div>
</div>

<script type="text/javascript">
	function updateThumbnail() {
		$('#thumbnail_img').attr('src', $('#thumbnail').val())
	}
</script>
<script type="text/javascript">
	function validateForm(){
		$Pwd =$('#pwd').val();
		$confimPwd =$('#confirmation_pwd').val();
		if($Pwd != $confimPwd){
			alert("Mật khẩu không khớp,vui lòng kiểm tra lại")
			return false
		}
		return true
	}
</script>
<?php
	require_once('../layouts/footer.php');
?>