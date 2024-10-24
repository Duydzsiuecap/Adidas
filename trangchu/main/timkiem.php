
<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}

$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
$num_pro = mysqli_num_rows($query_pro);
?>

<style>
.search-keyword {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-top: 20px;
}

.product_list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
}

.product_list li {
    width: 200px;
    margin: 10px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product_list img {
    max-width: 100%;
    height: auto;
}

.title_product,
.price_product {
    margin: 10px 0;
}
</style>

<div class="search-keyword">
    <h3>Từ khoá tìm kiếm : <?php echo htmlspecialchars($tukhoa); ?></h3>
</div>

<?php
if ($num_pro > 0) {
    echo '<ul class="product_list">';
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
<li>
    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
        <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>"
            alt="<?php echo $row_pro['tensanpham'] ?>">
        <p class="title_product">Tên Sản Phẩm: <?php echo $row_pro['tensanpham'] ?></p>
        <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' vnđ' ?></p>
    </a>
</li>
<?php
    }
    echo '</ul>';
} else {
    echo '<div class="search-keyword"><p>Không tìm thấy sản phẩm này!</p></div>';
}
?>