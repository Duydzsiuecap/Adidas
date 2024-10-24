<p>Liệt Kê Đơn Hàng</p>
<?php

// Truy vấn danh sách đơn hàng và thông tin khách hàng
$sql_lietke_dh = "SELECT * FROM tbl_cart, tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky ORDER BY id_cart DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

// Kiểm tra truy vấn có thực thi thành công không
if (!$query_lietke_dh) {
    die("Query failed: " . mysqli_error($mysqli));
}
?>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Khách Hàng</th>
        <th>Địa Chỉ</th>
        <th>Email</th>
        <th>sđt</th>
        <th>Quản Lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['code_cart']; ?></td>
        <td><?php echo $row['tenkhachhang']; ?></td>
        <td><?php echo $row['diachi']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['dienthoai']; ?></td>
        <td><a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']; ?>">Xem đơn hàng</a></td>

    </tr>
    <?php
    }
    ?>
</table>
