<?php
include('../../config/config.php');

// Xử lý thêm mới danh mục sản phẩm
if(isset($_POST['themdanhmuc'])){
    $tenloaisp = mysqli_real_escape_string($mysqli, $_POST['tendanhmuc']);
    $thutu = mysqli_real_escape_string($mysqli, $_POST['thutu']);
    
    $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUES ('$tenloaisp', '$thutu')";
    
    if (mysqli_query($mysqli, $sql_them)) {
        header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
        exit;
    } else {
        die("Lỗi khi thêm danh mục sản phẩm: " . mysqli_error($mysqli));
    }
}

// Xử lý sửa đổi danh mục sản phẩm
elseif(isset($_POST['suadanhmuc'])){
    $tenloaisp = mysqli_real_escape_string($mysqli, $_POST['tendanhmuc']);
    $thutu = mysqli_real_escape_string($mysqli, $_POST['thutu']);
    $iddanhmuc = $_GET['iddanhmuc']; // Chắc chắn rằng bạn đã kiểm tra và xử lý an toàn biến này
    
    $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc = '$tenloaisp', thutu = '$thutu' WHERE id_danhmuc = '$iddanhmuc'";
    
    if (mysqli_query($mysqli, $sql_update)) {
        header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
        exit;
    } else {
        die("Lỗi khi cập nhật danh mục sản phẩm: " . mysqli_error($mysqli));
    }
}

// Xử lý xóa danh mục sản phẩm
else {
    $id = $_GET['iddanhmuc']; // Chắc chắn rằng bạn đã kiểm tra và xử lý an toàn biến này
    
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '$id'";
    
    if (mysqli_query($mysqli, $sql_xoa)) {
        header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');
        exit;
    } else {
        die("Lỗi khi xóa danh mục sản phẩm: " . mysqli_error($mysqli));
    }
}

?>
