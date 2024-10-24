<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        
        .wrapper_chitiet {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background-color: #fff;
            max-width: 1200px;
        }

        .hinhanh_sanpham {
            flex: 1;
            max-width: 600px;
            padding: 20px;
        }

        .hinhanh_sanpham img {
            max-width: 100%;
            border-radius: 10px;
        }

        .chitietsanpham {
            flex: 1;
            max-width: 600px;
            padding: 20px;
        }

        .chitietsanpham h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .chitietsanpham p {
            color: #666;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .chitietsanpham .gia_sanpham {
            color: #e74c3c;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .themsgiohang {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }

        .themsgiohang:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php 
$sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";

$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img src="admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']; ?>">
    </div>
    <form method="POST" action="trangchu/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']; ?>">

        <div class="chitietsanpham">
            <h3>Tên Sản Phẩm: <?php echo $row_chitiet['tensanpham']; ?></h3>
            <p>Mã Sản Phẩm: <?php echo $row_chitiet['masp']; ?></p>
            <p class="gia_sanpham">Giá Sản Phẩm: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . ' vnđ'; ?></p>
            <p>Mô Tả Sản Phẩm: <?php echo $row_chitiet['tomtat']; ?></p>
            <p>Số Lượng: <?php echo $row_chitiet['soluong']; ?></p>
            <p>Danh Mục Sản Phẩm: <?php echo $row_chitiet['tendanhmuc']; ?></p>
            <p><input type="submit" name="themgiohang" class="themgiohang" value="Thêm Giỏ Hàng"></p>
        </div>
    </form>
</div>
<?php   
}
?>

</body>
</html>
