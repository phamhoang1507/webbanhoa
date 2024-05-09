
<?php
include_once '../../cauhinh/ketnoi.php';
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Thực hiện truy vấn để lưu dữ liệu vào cơ sở dữ liệu (thay đổi tên bảng và cột tương ứng)
$sql = "INSERT INTO lienhe (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Gửi thông tin thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<div>
  <a href="../../index.php" class="home-button">Trở về trang chủ</a>
  </div>