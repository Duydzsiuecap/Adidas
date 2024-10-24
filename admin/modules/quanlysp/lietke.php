<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
if (!$query_lietke_sp) {
    die("Truy vấn bị lỗi: " . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê sản phẩm</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
        }

        /* Form Styles */
        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form td {
            padding: 10px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form input[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        form input[type="submit"]:hover {
            background-color: #333;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Styles for the action links */
        a.action-link {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
        }

        a.delete-link {
            background-color: #ff4d4d;
        }

        a.delete-link:hover {
            background-color: #ff1a1a;
        }

        a.edit-link {
            background-color: #4CAF50;
        }

        a.edit-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <p>Liệt kê sản phẩm</p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Giá Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Danh Mục</th>
            <th>Mã Sản Phẩm</th>
            <th>Tóm Tắt</th>
            <th>Trạng Thái</th>
            <th>Quản Lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_sp)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['tensanpham']; ?></td>
                <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
                <td><?php echo $row['giasp']; ?></td>
                <td><?php echo $row['soluong']; ?></td>
                <td><?php echo $row['tendanhmuc']; ?></td>
                <td><?php echo $row['masp']; ?></td>
                <td><?php echo $row['tomtat']; ?></td>
                <td><?php echo ($row['tinhtrang'] == 1) ? 'Còn Hàng' : 'Hết Hàng'; ?></td>
                <td>
                    <a onclick="return confirm('Bạn có muốn xoá danh mục này không?');" class="action-link delete-link" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a>
                    <a class="action-link edit-link" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
