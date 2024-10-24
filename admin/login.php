<?php
    session_start();
    include('config/config.php');
    if (isset($_POST['dangnhap'])) {
        $taikhoan = $_POST['username'];
        $matkhau = $_POST['password'];
        $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if ($count > 0) {
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        }else{
            $_SESSION['error'] = "Tài khoản hoặc Mật khẩu không đúng , Vui lòng nhập lại.";
            header("Location:login.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
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
            <h3>Đăng nhập Admin</h3>
            <input type="text" name="username" placeholder="Tài khoản">
            <input type="password" name="password" placeholder="Mật khẩu">
            <button type="submit" name="dangnhap">Đăng nhập</button>
        </form>
    </div>

</body>

</html>

