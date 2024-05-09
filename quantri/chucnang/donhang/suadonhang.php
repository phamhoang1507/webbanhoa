<?php  
$id_donhang = $_GET['id_donhang'];
$sql = "SELECT * FROM donhang WHERE id = $id_donhang";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $ten_khachhang = $_POST['ten_khachhang'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    
    if(isset($id_donhang) && isset($ten_khachhang) && isset($email) && isset($sdt) && isset($diachi)){
        $sql = "UPDATE donhang SET ten_khachhang = '$ten_khachhang', email = '$email', sdt = '$sdt', diachi = '$diachi' WHERE id = $id_donhang";
        $query = mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=donhang');
    }
}
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa đơn hàng</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa đơn hàng</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" type="text" name="ten_khachhang" value="<?php echo $row['ten_khachhang']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="sdt" value="<?php echo $row['sdt']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="diachi" value="<?php echo $row['diachi']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->