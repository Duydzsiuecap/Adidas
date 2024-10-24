<?php
session_start();
if(isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];
    
    $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,dienthoai,diachi,matkhau) 
    VALUES('".$tenkhachhang."','".$email."','".$dienthoai."','".$diachi."','".$matkhau."')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
        /* Màu nền trắng */
        color: #000;
        /* Màu chữ đen */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .wrapper {
        background-color: #f0f0f0;
        /* Màu nền xám nhạt */
        padding: 20px;
        border-radius: 10px;
        border: 2px solid #000;
        /* Viền đậm */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
    }

    .wrapper h3 {
        margin-bottom: 20px;
        color: #000;
    }

    .dangky input[type="text"],
    .dangky input[type="password"],
    .dangky button {
        width: calc(100% - 20px);
        /* Giảm chiều rộng để tạo khoảng cách */
        padding: 10px;
        margin: 10px auto;
        /* Thêm khoảng cách phía trên và dưới, căn giữa */
        border-radius: 5px;
        display: block;
        /* Đảm bảo phần tử là block để căn giữa */
        border: 1px solid #ccc;
        /* Viền đường kẻ xám nhạt */
    }

    .dangky button {
        background-color: #000;
        /* Màu nền đen */
        color: #fff;
        /* Màu chữ trắng */
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .dangky button:hover {
        background-color: #333;
        /* Màu nền đen đậm khi di chuột vào */
    }

    .error {
        color: red;
        /* Màu chữ đỏ cho thông báo lỗi */
    }

    .login_khachhang {
        text-decoration: none;
        color: black;
        text-align: center
    }

    .login_khachhang:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <div class="wrapper">
        <h3>Đăng ký thành viên</h3>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="" method="POST" class="dangky">
            <?php
            if(isset($sql_dangky)) {
                if($sql_dangky) {
                    echo '<p style="color:green; margin-bottom: 20px;">Bạn đã đăng ký thành công!</p>';
                    $_SESSION['dangky'] = $tenkhachhang;
                    // header('Location: ../../index.php');
                } 
            }
            ?>
            <input type="text" name="hovaten" placeholder="Họ và tên" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="dienthoai" placeholder="Điện thoại" required>
            <input type="text" name="diachi" placeholder="Địa chỉ" required>
            <input type="password" name="matkhau" placeholder="Mật khẩu" required>
            <a class="login_khachhang" href="login_khachhang.php">Đăng nhập</a>
            <button type="submit" name="dangky">Đăng ký</button>
        </form>
    </div>

</body>

</html>