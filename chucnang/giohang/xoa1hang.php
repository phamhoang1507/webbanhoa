<?php
	session_start();
	if(isset($_SESSION['giohang'])){
		// Kiểm tra số lượng sản phẩm trong giỏ hàng
		if(count($_SESSION['giohang']) == 1){
			// Xóa toàn bộ hàng nếu sản phẩm cuối cùng bị xóa
			unset($_SESSION['giohang']);
		} else {
			// Xóa sản phẩm cụ thể
			if(isset($_GET['id_sp'])){
				$id_sp = $_GET['id_sp'];
				if(isset($_SESSION['giohang'][$id_sp])){
					unset($_SESSION['giohang'][$id_sp]);
				}
			}
		}
	}
	header('location: ../../index.php?page_layout=giohang');
?>