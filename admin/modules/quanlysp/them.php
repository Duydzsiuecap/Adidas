<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <style>
        /* Reset một số kiểu mặc định */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Kiểu chung */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
        }

        /* Kiểu cho form */
        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form td {
            padding: 10px;
            vertical-align: top;
        }

        .input-field,
        form input[type="number"],
        form textarea,
        form select,
        form input[type="file"] {
            width: calc(100% - 22px); /* Chiều rộng 100% trừ padding và border */
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #e9f5ff; /* Nền màu xanh nhạt */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-field:focus,
        form input[type="number"]:focus,
        form textarea:focus,
        form select:focus,
        form input[type="file"]:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
        }

        form textarea {
            resize: none;
        }

        form input[type="submit"] {
            background-color: #007BFF; /* Nền màu xanh */
            color: #fff;
            padding: 15px 30px; /* Padding lớn hơn để nút nổi bật */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px; /* Margin trên tăng thêm */
            font-size: 18px; /* Cỡ chữ lớn hơn */
        }

        form input[type="submit"]:hover {
            background-color: #0056b3; /* Màu xanh đậm hơn khi hover */
        }

        /* Kiểu cho bảng */
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

        /* Kiểu cho tiêu đề trang */
        .page-title {
            font-size: 24px; /* Cỡ chữ lớn hơn */
            color: #007BFF; /* Màu sắc tùy chỉnh */
            margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
            text-align: center; /* Căn giữa chữ */
        }

        .themsanphm {
            text-align: center; /* Căn giữa nội dung trong ô */
        }

        .themsanphm input[type="submit"] {
            padding: 10px 20px; /* Độ lớn của nút */
            background-color: #007bff; /* Màu nền của nút */
            color: #fff; /* Màu chữ của nút */
            border: none; /* Bỏ viền */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột vào */
            border-radius: 5px; /* Bo tròn viền */
            font-size: 14px; /* Cỡ chữ */
        }


       
    </style>
</head>
<body>
    <p class="page-title">Thêm Sản Phẩm</p>
    <table border="1" width="100%" style="border-collapse: collapse;">
        <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" name="tensanpham" class="input-field" required></td>
            </tr>
            <tr>
                <td>Mã Sản Phẩm</td>
                <td><input type="text" name="masp" class="input-field" required></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" name="giasp" class="input-field" required></td>
            </tr>
            <tr>
                <td>Số Lượng</td>
                <td><input type="text" name="soluong" class="input-field" required></td>
            </tr>
            <tr>
                <td>Nội Dung</td>
                <td><textarea rows="10" name="noidung" class="input-field" required></textarea></td>
            </tr>
            <tr>
                <td>Tóm Tắt</td>
                <td><textarea rows="10" name="tomtat" class="input-field" required></textarea></td>
            </tr>
            <tr>
                <td>Hình Ảnh</td>
                <td><input type="file"name="hinhanh" class="input-field" required></td>
            </tr>
            <tr>
                <td>Danh Mục Sản Phẩm</td>
                <td>
                    <select name="danhmuc" class="input-field">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            $selected = ($row_danhmuc['id_danhmuc'] == $danhmuc) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" <?php echo $selected ?>><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình Trạng</td>
                <td>
                    <select name="tinhtrang" class="input-field">
                        <option value="1">Còn Hàng</option>
                        <option value="0">Hết Hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="themsanphm" colspan="2"><input type="submit" name="themsanpham" value="Thêm Sản Phẩm"></td>
            </tr>
        </form>
    </table>
</body>
</html>
