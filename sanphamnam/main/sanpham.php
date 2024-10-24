<?php

$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tb;_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
$query_chitiet = $mysqli_query($mysqli,$sql_chitiet);
while ($row_chitiet = $mysqli_fetch_array($query_chtiet)) {


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm Nam</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            width: calc(25% - 20px);
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .product:hover {
            transform: scale(1.05);
        }
        .product img {
            width: 100%;
            border-bottom: 1px solid #ddd;
            border-radius: 8px 8px 0 0;
        }
        .info {
            padding: 10px;
        }
        .price {
            font-size: 18px;
            color: #d32f2f;
            font-weight: bold;
        }
        .name {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0 5px;
        }
        .category, .details {
            font-size: 14px;
            color: #757575;
            margin: 5px 0;
        }
        .buy-button, .detail-button {
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
        }
        .buy-button:hover {
            background-color: #e91e63;
        }
        .detail-button {
            background-color: #2196f3;
        }
        .detail-button:hover {
            background-color: #1976d2;
        }
    </style>
</head>
<body>
    <p>chi tiet san pham</p>
    <div class="container">
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="product">
                <img src="admin/modules/quanlysp/uploads/<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="<?php echo htmlspecialchars($row['tensanpham']); ?>">
                <div class="info">
                    <p class="price"><?php echo number_format($row['giasp'], 0, ',', '.'); ?>₫</p>
                    <p class="name"><?php echo htmlspecialchars($row['tensanpham']); ?></p>
                    <p class="category"><?php echo htmlspecialchars($row['id_danhmuc']); ?></p>
                    <p class="details"><?php echo htmlspecialchars($row['tomtat']); ?></p>
                    <a href="muangay.php?id=<?php echo $row['id_sanpham']; ?>" class="buy-button">Mua Ngay</a>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>" class="detail-button">Xem Chi Tiết</a>
                </div>
            </div>
        <?php }  }?>
    </div>
</body>
</html>
