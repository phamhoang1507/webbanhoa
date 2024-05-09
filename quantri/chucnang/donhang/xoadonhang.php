<?php  
	session_start();
	if($_SESSION['email']=='admin@admin.vn' && $_SESSION['pass']=='123'){
		$id=$_GET['id'];
		include_once'../../ketnoi.php';

		// Xóa chi tiết đơn hàng từ bảng chitietdonhang
		$sql_delete_chitiet = "DELETE FROM chitietdonhang WHERE id_donhang='$id'";
		$query_delete_chitiet = mysqli_query($conn,$sql_delete_chitiet);

		// Xóa đơn hàng từ bảng donhang
		$sql_delete_donhang = "DELETE FROM donhang WHERE id='$id'";
		$query_delete_donhang = mysqli_query($conn,$sql_delete_donhang);

		header('location: ../../quantri.php?page_layout=quanlydonhang');
	}else{
		header('location: ../../index.php');
	}
?>