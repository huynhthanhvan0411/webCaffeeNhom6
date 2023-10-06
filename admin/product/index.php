<?php
	$title = 'Quản Lý Sản Phẩm';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	//----------------------------------------------------------------------------
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$tukhoa = isset($_POST['tukhoa']) ? $_POST['tukhoa'] : '';
		$sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id where Product.deleted = 0 and title LIKE '%".$tukhoa."%' or category.name like '%".$tukhoa."%' order by name ASC " ;
	} else {
	$sql = "select Product.*, Category.name as category_name 
	from Product left join Category on Product.category_id = Category.id 
	where Product.deleted = 0";
	}
	//-----------------------------------------------------------------------
	$data = executeResult($sql);
	
?>
<link href="../product/pr_seach1.css" rel="stylesheet">
<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
	
	<form class = "can" action="" METHOD = "POST">
		<input  type="text" name="tukhoa" type="search" placeholder="Tìm Sản Phẩm Hoặc Loại Sản Phẩm" aria-label="Search">
		</form>
		<h3 >Quản Lý Sản Phẩm</h3>
		<a href="editor.php"><button class="btn btn-success">Thêm Sản Phẩm</button></a>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Thumbnail</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Danh Mục</th>
					<th style="width: 50px">Thao tác</th>
					<th style="width: 50px">Thao tác</th>
				</tr>
			</thead>
			<tbody>
<?php
//----------------------------------------
// $stt = 0;
// $stmt->fetch(PDO::FETCH_ASSOC);
// $stmt->execute();
// while ($row = $stmt->fetch()) :
//-----------------------------------------
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><img src="'.fixUrl($item['thumbnail']).'" style="height: 100px"/></td>
					<td>'.$item['title'].'</td>
					<td>'.number_format($item['discount']).' VNĐ</td>
					<td>'.$item['category_name'].'</td>
					<td style="width: 50px">
						<a href="editor.php?id='.$item['id'].'">
						<button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
					<button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteProduct(id) {
		option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>