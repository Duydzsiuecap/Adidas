<?php

$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

$id_danhmuc = $_GET['id'];
$sql_pro = "SELECT * FROM tbl_sanpham WHERE id_danhmuc = '$id_danhmuc' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</html>

<div class="video-container">
        <video autoplay loop muted>
            <source src="../video/anhreal.mp4" type="video/mp4">
        </video>
        <div class="video-overlay">
            <h1>YOU GOT THIS</h1>
            <button>Khám Phá Ngay</button>
        </div>
    </div>
    <section class="filter-sort">
        <button>Filter & Sort</button>
    </section>
    <main>
    <div>
            <h1 style="font-style: italic; font-family: 'Arial', sans-serif;">MEN'S NEW ARRIVALS: RUNNING SHOES, SHOES & MORE</h1>
            <p style="font-style: italic; font-family: 'Arial', sans-serif;">If you're bored with what's in your closet, it's time to shake things up with adidas new releases for men. Find the latest clothing, shoes and athletic gear designed to bring out your A game.</p>
    </div>
    <ul class="danhmuc">
        <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php } ?>
    </ul>

    <ul class="sanpham">
        <?php while ($row_pro = mysqli_fetch_array($query_pro)) { ?>
            <li>
                <a href="#">
                    <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="<?php echo $row_pro['tensanpham'] ?>">
                    <p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
                    <p class="price_product"><?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' vnđ' ?></p>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>

    