<?php  
if(isset($_POST['submit'])){
    $ten_khachhang = $_POST['ten_khachhang'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $ngay_dat = date('Y-m-d H:i:s');
    
    // Thêm đơn hàng vào bảng donhang
    $sql_donhang = "INSERT INTO donhang (ten_khachhang, email, sdt, diachi) VALUES ('$ten_khachhang', '$email', '$sdt', '$diachi')";
    $query_donhang = mysqli_query($conn, $sql_donhang);
    $donhang_id = mysqli_insert_id($conn); // Lấy ID của đơn hàng vừa được thêm

    $ghi_chu = $_POST['ghi_chu'];
    $thanh_tien = $_POST['thanh_tien'];

    // Thêm chi tiết đơn hàng vào bảng chitietdonhang
    $sql_chitietdonhang = "INSERT INTO chitietdonhang (id_donhang, ghi_chu, thanh_tien) VALUES ('$donhang_id', '$ghi_chu', '$thanh_tien')";
    $query_chitietdonhang = mysqli_query($conn, $sql_chitietdonhang);

    header('location: quantri.php?page_layout=donhang');
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
        <h1 class="page-header">Thêm đơn hàng</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm đơn hàng</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" type="text" name="ten_khachhang" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" name="sdt" required="">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="diachi" required="">
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" rows="3" name="ghi_chu"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Thành tiền</label>
                            <input class="form-control" type="text" name="thanh_tien" required="">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->