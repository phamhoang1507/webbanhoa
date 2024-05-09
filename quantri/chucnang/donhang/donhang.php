<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowPerPage = 5;
$perPage = $page * $rowPerPage - $rowPerPage;

$sql = "SELECT donhang.id, donhang.ten_khachhang, donhang.email, donhang.sdt, donhang.diachi, chitietdonhang.ghi_chu, chitietdonhang.thanh_tien
        FROM donhang
        INNER JOIN chitietdonhang ON donhang.id = chitietdonhang.id_donhang
        LIMIT $perPage, $rowPerPage";
$query = mysqli_query($conn, $sql);

$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donhang"));
$totalPages = ceil($totalRows / $rowPerPage);
$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=donhang&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=donhang&page=' . $i . '">' . $i . '</a></li>';
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
        <h1 class="page-header">Quản lý đơn hàng</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" style="position: relative;">
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID đơn hàng</th>
                            <th data-sortable="true">Tên khách hàng</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Số điện thoại</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Ghi chú</th>
                            <th data-sortable="true">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['ten_khachhang']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['sdt']; ?></td>
                                <td><?php echo $row['diachi']; ?></td>
                                <td><?php echo $row['ghi_chu']; ?></td>
                                <td><?php echo $row['thanh_tien']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                    <?php echo $listPage; ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->