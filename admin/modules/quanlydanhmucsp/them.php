<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục Sản Phẩm</title>
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
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        form td {
            padding: 10px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-field:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
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

        .themdanhmucsp {
            text-align: center; /* Căn giữa nội dung trong ô */
            padding: 10px; /* Độ lớn khoảng cách bên trong ô */
        }

        .themdanhmucsp input[type="submit"] {
            padding: 10px 20px; /* Độ lớn của nút */
            background-color: #28a745; /* Màu nền của nút */
            color: #fff; /* Màu chữ của nút */
            border: none; /* Bỏ viền */
            cursor: pointer; /* Hiển thị con trỏ khi di chuột vào */
            border-radius: 5px; /* Bo tròn viền */
            font-size: 14px; /* Cỡ chữ */
        }

        .themdanhmucsp input[type="submit"]:hover {
            background-color: #218838; /* Màu nền khi di chuột vào */
        }

        .page-title {
            font-size: 24px; /* Cỡ chữ lớn hơn */
            color: #007BFF; /* Màu tùy chỉnh */
            margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
            text-align: center; /* Căn giữa chữ */
        }
    </style>
</head>
<body>
    <p class="page-title">Thêm danh mục sản phẩm</p>
    <table border="1" width="50%" style="border-collapse: collapse;">
        <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
            <tr>
                <td>Tên Danh Mục</td>
                <td><input type="text" name="tendanhmuc" class="input-field" required></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><input type="text" name="thutu" class="input-field" required></td>
            </tr>
            <tr>
                <td class="themdanhmucsp" colspan="2"><input type="submit" name="themdanhmuc" value="Thêm Danh Mục Sản Phẩm"></td>
            </tr>
        </form>
    </table>
</body>
</html>
