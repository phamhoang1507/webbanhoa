<?php
    // Xác định trang hiện tại
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    // Số tin nhắn trên mỗi trang
    $rowPerPage = 5;
    
    // Tính toán vị trí bắt đầu của dữ liệu trên trang hiện tại
    $perPage = $page * $rowPerPage - $rowPerPage;
    
    // Truy vấn dữ liệu liên hệ với phân trang
    $sql = "SELECT * FROM lienhe LIMIT $perPage, $rowPerPage";
    $query = mysqli_query($conn, $sql);
    
    // Tính tổng số tin nhắn
    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lienhe"));
    
    // Tính tổng số trang
    $totalPages = ceil($totalRows / $rowPerPage);
    
    // Tạo danh sách các trang
    $listPage = "";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="quantri.php?page_layout=lienhe&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="quantri.php?page_layout=lienhe&page=' . $i . '">' . $i . '</a></li>';
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
        <h1 class="page-header">Liên hệ</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Danh sách liên hệ</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Tin nhắn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Hiển thị phân trang -->
            <div class="panel-footer">
                <ul class="pagination">
                    <?php echo $listPage; ?>
                </ul>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->