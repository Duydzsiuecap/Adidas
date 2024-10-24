<?php
session_start();
include("../../admin/config/config.php");

// Lấy ID khách hàng từ session
$id_khachhang = $_SESSION['id_khachhang'];

// Tạo mã đơn hàng ngẫu nhiên
$code_order = rand(0, 9999);

// Thêm thông tin đơn hàng vào bảng tbl_cart
$insert_cart = "INSERT INTO tbl_cart (id_khachhang, code_cart, cart_status) VALUES ('".$id_khachhang."', '".$code_order."', 1)";
$cart_query = mysqli_query($mysqli, $insert_cart);

if ($cart_query) {
    // Thêm chi tiết đơn hàng vào bảng tbl_cart_details
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details (id_sanpham, code_cart, soluongmua) VALUES ('".$id_sanpham."', '".$code_order."', '".$soluong."')";
        mysqli_query($mysqli, $insert_order_details);
    }
}

// Xóa giỏ hàng khỏi session
unset($_SESSION['cart']);

// Chuyển hướng đến trang cảm ơn
//header('Location: camon.php');
exit();
?>
