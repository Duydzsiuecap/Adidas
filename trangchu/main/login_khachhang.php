<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "web_mysqli");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['dangnhap'])) {
    if (isset($_POST['tenkhachhang']) && isset($_POST['email']) && isset($_POST['password'])) {
        $tenkhachhang = $_POST['tenkhachhang'];
        $email = $_POST['email'];
        $matkhau = $_POST['password'];
        
        // Sử dụng tên cột chính xác trong bảng
        $sql = "SELECT * FROM tbl_dangky WHERE tenkhachhang = '$tenkhachhang' AND email = '$email' AND matkhau = '$matkhau'";
        $result = mysqli_query($mysqli, $sql);
        
        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $_SESSION['dangnhap'] = $tenkhachhang;
                header("Location: ../../index.php");
            } else {
                $_SESSION['error'] = "Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.";
                header("Location: login_khachhang.php");
                exit();
            }
        } else {
            // Truy vấn không thành công, hiển thị lỗi
            die("Truy vấn không thành công: " . mysqli_error($mysqli));
        }
    } else {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin.";
        header("Location: login_khachhang.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Khách Hàng</title>
    <style type="text/css">
    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .wrapper-login {
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        border: 2px solid #000;
        /* Viền đậm */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .wrapper-login h3 {
        margin-bottom: 20px;
        color: #000;
    }

    .login-container input[type="text"],
    .login-container input[type="password"],
    .login-container button {
        width: calc(100% - 20px);
        /* Giảm chiều rộng để tạo khoảng cách */
        padding: 10px;
        margin: 10px auto;
        /* Thêm khoảng cách phía trên và dưới, căn giữa */
        border-radius: 5px;
        display: block;
        /* Đảm bảo phần tử là block để căn giữa */
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        border: 1px solid #ccc;
    }

    .login-container button {
        background-color: #000;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .login-container button:hover {
        background-color: #333;
    }

    .dangky {
        text-decoration: none;
        text-align: center;
        color: #000;
    }

    .dangky:hover {
        text-decoration: underline;
    }

    .error {
        color: #ff0000;
    }
    </style>
</head>

<body>

    <div class="wrapper-login">
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="error">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="" method="POST" class="login-container">
            <h3>Đăng nhập Khách Hàng</h3>
            <input type="text" name="tenkhachhang" placeholder="Tên Khách Hàng" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <a class="dangky" href="dangky.php">Đăng ký</a>
            <button type="submit" name="dangnhap">Đăng nhập</button>
        </form>
    </div>

</body>

</html>