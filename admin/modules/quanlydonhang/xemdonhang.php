<p>Xem Đơn Hàng</p>
<?php


$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM tbl_cart_details, tbl_sanpham 
                  WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham 
                  AND tbl_cart_details.code_cart = '$code' 
                  ORDER BY tbl_cart_details.id_cart_details DESC";

// Kiểm tra truy vấn có thực thi thành công không
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

if (!$query_lietke_dh) {
    die("Query failed: " . mysqli_error($mysqli));
}
?>
<table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã Đơn Hàng</th>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Đơn Giá</th>
        <th>Thành Tiền</th>
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        $thanhtien = $row['giasp']*$row['soluongmua'];
        $tongtien += $thanhtien;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['code_cart']; ?></td>
        <td><?php echo $row['tensanpham']; ?></td>
        <td><?php echo $row['soluongmua']; ?></td>
        <td><?php echo $row['giasp']; ?></td>
        <td><?php echo number_format ($row['giasp'] * $row['soluongmua'],0,',','.'); ?></td>
        <td><?php echo number_format ($thanhtien,0,',','.'); ?></td>
       
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="6">
            <p>Tổng Tiền : <?php echo number_format($tongtien,0,',','.').'vnđ'?></p>

        </td>
    </tr>
</table>
