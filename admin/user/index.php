<?php
	$title = 'Quản Lý Người Dùng';
	$baseUrl = '../';
	require_once($baseUrl.'../utils/utility.php');

	require_once('../layouts/header.php');

//-----------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$tukhoa = isset($_POST['tukhoa']) ? $_POST['tukhoa'] : '';
	$sql = "select user.*,role.name as role_name from user left join role on user.role_id = role.id where user.deleted = 0 and fullname LIKE '%".$tukhoa."%' or email like '%".$tukhoa."%' order by name ASC" ;
} else {
	$sql = "select user.*,role.name as role_name from user left join role on user.role_id = role.id where user.deleted = 0";
}
//-----------------------------------------------------

	$data = executeResult($sql);
?>
<link href="../user/u_seach1.css" rel="stylesheet">
<div class="row" style="margin-top:20px ;">
	<div class="col-md-12 table-responsive">
	<form action="" METHOD = "POST">
		<input type="text" name="tukhoa" type="search" placeholder="Tìm Kiếm Họ Tên Hoặc Địa Chỉ Email" aria-label="Search">
			<!-- <input class="form-control me-2" name="tukhoa" type="search" placeholder="Nhập Tên Sản Phẩm Mà Bạn Muốn Tìm" aria-label="Search">
			  <button class="btn btn-outline-success" type="submit">Tìm</button> -->
		</form>
		<h3>Quản lí người dùng</h3>
		<?php if ($user['role_id']==1){
		echo '<a href="editor.php"><button class="btn btn-success">Thêm Tài Khoản</button></a>';
		} ?>
		<table class="table table-bordered table-hover " style="margin-top:20px ;">
			<thead>
				<tr>
				<th>STT</th>
				<th>Họ & Tên</th>
				<th>Email</th>
				<th>SĐT</th>
				<th>Địa Chỉ</th>
				<th>Quyền</th>
				<th>Ảnh</th>
				<th>Thao tác</th>
				<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>

<?php 
	$index=0;
	foreach ($data as $item) {
		if ($user['role_id']==1) {
		echo'<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['fullname'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['phone'].'</td>
					<td>'.$item['address'].'</td>
					<td>'.$item['role_name'].'</td>
					<td><img src="'.fixUrl($item['thumbnail1']).'" style="height: 100px"/></td>
					<td style="width: 50px">
					<a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
					</td>
					';
			if($user['id'] != $item['id'] && $item['role_id']!=1){
					echo '<td style="width: 50px">
						  <button onclick="deleteUser('.$item['id'].')" class="btn btn-danger">Xóa</button>
						  </td>';
				}

			echo '
			</tr>';
	}else if ($user['role_id']==2) {
			echo'<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['fullname'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['phone'].'</td>
					<td>'.$item['address'].'</td>
					<td>'.$item['role_name'].'</td>
					<td><img src="'.fixUrl($item['thumbnail1']).'" style="height: 100px"/></td>
					';
				if($user['id'] == $item['id']  ){
					echo '<td style="width: 50px">
						<a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
						</td>';
				}
					
			echo '</tr>';
		}

} 
 ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function deleteUser(id){
		option = confirm('Bạn có chắc chắn muốn xóa tài khoản này không ?')
		if(!option) return;
		$.post('form_delete.php',{
			'id':id,
			'action':'delete'
		},function(data){
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>