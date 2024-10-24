<?php
include('../../config/config.php');

$sql = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = (SELECT id FROM tbl_danhmuc WHERE tendanhmuc = 'Nam')";
$query = mysqli_query($mysqli, $sql);
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
            width: calc(25% - 20px); /* Adjust the width to fit 4 products per row */
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
    </style>
</head>
<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <div class="product">
                <img src="uploads/<?php echo $row['hinhanh']; ?>" alt="<?php echo $row['tensanpham']; ?>">
                <div class="info">
                    <p class="price"><?php echo number_format($row['giasp'], 0, ',', '.'); ?>₫</p>
                    <p class="name"><?php echo $row['tensanpham']; ?></p>
                    <p class="category"><?php echo $row['id_danhmuc']; ?></p>
                    <p class="details"><?php echo $row['tomtat']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
