<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_danhmuc = $_GET['id_danhmuc'];
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
} else {
    die("Không có ID danh mục được cung cấp.");
}
?>

<h2>Danh mục: <?php echo $row_title['tendanhmuc']; ?></h2>

<ul class="product_list">
    <?php
    // Lặp qua các sản phẩm và hiển thị
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="<?php echo $row_pro['tensanpham'] ?>">
                <p class="title_product">Tên Sản Phẩm: <?php echo $row_pro['tensanpham'] ?></p>
                <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' vnđ' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
