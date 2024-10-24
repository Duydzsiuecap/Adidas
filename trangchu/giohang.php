<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include($_SERVER['DOCUMENT_ROOT'].'/web_mysqli/admin/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Giỏ Hàng</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}
table {
    width: 100%;
    text-align: center;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    padding: 10px;
    border: 1px solid #ccc;
}
th {
    background-color: #f2f2f2;
}
img {
    max-width: 100px;
    height: auto;
}
.alert {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    margin-bottom: 15px;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin: 5px;
    text-decoration: none;
    color: #fff;
    border-radius: 4px;
}
.price {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}
.btn-increase {
    background-color: blue;
    color: white;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-increase:hover {
    background-color: darkblue;
}

.btn-decrease {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-decrease:hover {
    background-color: darkred;
}
.home-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: blue;
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.home-button:hover {
    background-color: darkblue;
}
.btn-delete-all {
    color: white;
    background-color: red;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-delete-all:hover {
    background-color: darkred;
}
.btn-delete {
    color: white;
    background-color: red;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-delete:hover {
    background-color: darkred;
}
</style>
</head>
<body>
<a class="home-button" href="../index.php">Quay lại trang chủ</a>

<div class="container">
    <?php
    // Kiểm tra và hiển thị thông báo
    if (isset($_SESSION['message'])) {
        echo "<div class='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị
    }
    ?>

    <?php
    if (isset($_SESSION['dangky'])) {
        echo 'Xin chào: <span style="color:red">' . $_SESSION['dangky'] . '</span>';
    }
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Mã Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số Lượng</th>
            <th>Giá Sản Phẩm</th>
            <th>Thành Tiền</th>
            <th>Quản Lý</th>
        </tr>
        <?php 
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            $i = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                $tongtien += $thanhtien;
                $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $cart_item['tensanpham']; ?></td>
            <td><?php echo $cart_item['masp']; ?></td>
            <td><img src="/web_mysqli/admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"></td>
            <td>
                <a class="btn btn-default btn-increase" href="main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>">Cộng</a>
                <?php echo $cart_item['soluong']; ?>
                <a class="btn btn-default btn-decrease" href="main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>">Trừ</a>
            </td>
            <td class="price"><?php echo number_format($cart_item['giasp'], 0, ',', '.') . ' VND'; ?></td>
            <td class="price"><?php echo number_format($thanhtien, 0, ',', '.') . ' VND'; ?></td>
            <td><a class="btn-delete" href="main/themgiohang.php?xoa=<?php echo $cart_item['id']; ?>">Xóa</a></td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="8">
                <p class="price">Tổng Tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VND'; ?></p>
                <p><a class="btn-delete-all" href="main/themgiohang.php?xoatatca=1">Xóa Tất Cả</a></p>
                <p><a href="main/thanhtoan.php">Đặt Hàng</a></p>
            </td>
        </tr>
        <?php
        } else {
        ?>
        <tr>
            <td colspan="8"><p>Hiện tại Giỏ Hàng Trống</p></td>
        </tr>
        <?php 
        }
        ?>
    </table>
</div>

</body>
</html>
