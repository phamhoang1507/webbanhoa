<?php  
	session_start();
	if($_SESSION['email']=='admin@admin.vn' && $_SESSION['pass']=='123'){
		$id_bl=$_GET['id_bl'];
		include_once'../../ketnoi.php';
		$sql= "DELETE FROM blsanpham WHERE id_bl='$id_bl'";
		$query= mysqli_query($conn,$sql);
		header('location: ../../quantri.php?page_layout=blsp');
	}else{
		header('location: ../../index.php');
	}
?>