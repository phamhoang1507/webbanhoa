<?php
	session_start();
	if(isset($_SESSION['giohang'])){
		// Xóa toàn bộ hàng trong giỏ hàng
		unset($_SESSION['giohang']);
	}
	header('location: ../../index.php?page_layout=giohang');
?>