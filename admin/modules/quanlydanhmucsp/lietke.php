<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê danh mục sản phẩm</title>
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
            margin-right: 5px;
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
    <p>Liệt kê danh mục sản phẩm</p>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>Tên Danh Mục</th>
            <th>Quản Lý</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['tendanhmuc']; ?></td>
                <td>
                    <a onclick="return confirm('Bạn có muốn xoá danh mục này không?');" class="action-link delete-link" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a>
                    <a class="action-link edit-link" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
