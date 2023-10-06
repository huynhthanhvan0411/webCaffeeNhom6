<?php
	$title = 'Quản Lý Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');
	
	//pending, approved, cancel
	$sql = "select * from orders order by status asc, order_date desc";
	$data = executeResult($sql);

?>
<style>		
/* set độ dài cho add và note */
.an {
  display: block;
  display: -webkit-box;
  height: 16px*1.3*3;
  font-size: 16px;
  line-height: 1.3;
  -webkit-line-clamp: 1;  /* số dòng hiển thị */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  cursor: pointer;
}
a{
	color:#212529;
}
a:hover{
	text-decoration: none;
}
</style>

<link href="../order/tong.css" rel="stylesheet">
<div class="row" style="margin-top:20px ;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Đơn Hàng</h3>

		<table class="table table-bordered table-hover " style="margin-top:20px ;">
			<thead>
				<tr>
				<th>STT</th>
				<th>Họ & Tên</th>
				<th>SĐT</th>
				<th>Email</th>
				<th>Địa Chỉ</th>
				<th>Ghi Chú</th>
				<th>Tổng Tiền</th>
				<th>Ngày Đặt Hàng</th>
				<th style="width: 120px"></th>
				</tr>
			</thead>
			<tbody>

<?php 
	$index=0;
	foreach ($data as $item) {
	echo'<tr>
				<th>'.(++$index).'</th>
				<td><a href="detail.php?id='.$item['id'].'">'.$item['fullname'].'</a></td>
				<td><a href="detail.php?id='.$item['id'].'">'.$item['phone'].'</a></td>
				<td><a href="detail.php?id='.$item['id'].'">'.$item['email'].'</a></td>

				<td><span class="an">'.$item['address'].'</span></td> 

				<td><span class="an" >'.$item['note'].'</span></td>

				<td>'.$item['total_money'].'</td>
				<td>'.$item['order_date'].'</td>
				<td style="width: 50px">';
				if($item['status'] == 0) {
					echo '<button onclick="changeStatus('.$item['id'].', 1)" class="btn btn-sm btn-success" style = "margin-bottom: 10px">Phê Duyệt</button>
			
						<button onclick="changeStatus('.$item['id'].', 2)" class="btn btn-sm btn-danger">Hủy</button>';
				} else if($item['status'] == 1) {
					echo '<label class="badge badge-success">Đã Phê Duyệt</label>';
				} else {
					echo '<label class="badge badge-danger">Đã Hủy</label>';
				}
				echo '</td>
					</tr>';
}

 ?>
			</tbody>
		</table>
	</div>
</div>

	
<script type="text/javascript">
	function changeStatus(id, status){
		$.post('form_api.php',{
			'id':id,
			'status': status,
			'action':'update_status'
		},function(data){
			location.reload()
		})
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>