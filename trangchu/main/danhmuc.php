<?php


// Lấy danh sách sản phẩm theo danh mục
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' ORDER BY tbl_sanpham.id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);

// Lấy tên danh mục
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc ='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        ul.danhmuc {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        ul.danhmuc li {
            margin: 0 10px;
        }

        ul.danhmuc li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            background-color: #FF0000; /* Blue background */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        ul.danhmuc li a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        ul.sanpham {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        ul.sanpham li {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            width: calc(16.66% - 20px); /* Điều chỉnh độ rộng để phù hợp với 6 sản phẩm một hàng */
            box-sizing: border-box;
            text-align: center;
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        ul.sanpham li:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        ul.sanpham li img {
            max-width: 100%;
            height: 300px; /* Chỉnh kích thước ảnh lớn hơn */
            object-fit: contain; /* Đảm bảo ảnh không bị méo */
        }

        ul.sanpham li .title_product {
            font-size: 14px;
            margin: 10px 0;
            color: #333;
        }

        ul.sanpham li .price_product {
            font-size: 16px;
            color: #f00;
        }

        ul.sanpham li a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h2>Danh mục: <?php echo $row_title['tendanhmuc']; ?></h2>

    <ul class="sanpham">
        <?php
        while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
            <li class="sanpham">
                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                    <img class="product_image" src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="<?php echo $row_pro['tensanpham'] ?>">
                    <p class="title_product">Tên Sản Phẩm: <?php echo $row_pro['tensanpham'] ?></p>
                    <p class="price_product">Giá: <?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' vnđ' ?></p>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</body>
</html>

<?php

?>
