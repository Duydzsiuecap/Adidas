
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('../../admin/config/config.php');


// Tăng số lượng sản phẩm
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $id) {
            $_SESSION['cart'][$key]['soluong']++;
            break;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Giảm số lượng sản phẩm
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $id) {
            if ($_SESSION['cart'][$key]['soluong'] > 1) {
                $_SESSION['cart'][$key]['soluong']--;
            } else {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Đánh chỉ mục lại mảng
            }
            break;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Xóa sản phẩm
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Đánh chỉ mục lại mảng
                break;
            }
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Xóa tất cả
if (isset($_GET['xoatatca']) && $_GET['xoatatca']) {
    unset($_SESSION['cart']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    $id = $_GET['idsanpham'];
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);

    if (!$query) {
        die('Error: ' . mysqli_error($mysqli));
    }

    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            'tensanpham' => $row['tensanpham'],
            'id' => $id,
            'soluong' => $soluong,
            'giasp' => $row['giasp'],
            'hinhanh' => $row['hinhanh'],
            'masp' => $row['masp']
        );

        // Kiểm tra sessions tồn tại
        if (isset($_SESSION['cart'])) {
            $found = false;

            foreach ($_SESSION['cart'] as &$cart_item) {
                // Nếu dữ liệu trùng
                if ($cart_item['id'] == $id) {
                    $cart_item['soluong'] += 1;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $_SESSION['cart'][] = $new_product;
            }
        } else {
            $_SESSION['cart'] = array($new_product);
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(); // Dừng thực thi mã sau khi chuyển hướng
} else {
    echo "Không có dữ liệu POST để thêm vào giỏ hàng.";
}
?>
