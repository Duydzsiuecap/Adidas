<?php
include('../../config/config.php');

// Lấy dữ liệu từ form
$tensanpham = mysqli_real_escape_string($mysqli, $_POST['tensanpham']);
$masp = mysqli_real_escape_string($mysqli, $_POST['masp']);
$giasp = mysqli_real_escape_string($mysqli, $_POST['giasp']);
$soluong = mysqli_real_escape_string($mysqli, $_POST['soluong']);
$tomtat = mysqli_real_escape_string($mysqli, $_POST['tomtat']);
$noidung = mysqli_real_escape_string($mysqli, $_POST['noidung']);
$tinhtrang = mysqli_real_escape_string($mysqli, $_POST['tinhtrang']);
$danhmuc = mysqli_real_escape_string($mysqli, $_POST['danhmuc']);


// Xử lý hình ảnh
$hinhanh = isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] : '';
$hinhanh_tmp = isset($_FILES['hinhanh']['tmp_name']) ? $_FILES['hinhanh']['tmp_name'] : '';
$hinhanh_time = time() . '_' . $hinhanh;

if (isset($_POST['themsanpham'])) {
    // Thêm sản phẩm
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham, masp, giasp, soluong, tomtat, noidung, tinhtrang, hinhanh, id_danhmuc) 
                 VALUES ('$tensanpham', '$masp', '$giasp', '$soluong', '$tomtat', '$noidung', '$tinhtrang', '$hinhanh_time', '$danhmuc')";
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_time);
    mysqli_query($mysqli, $sql_them);
    $id_sanpham = $_GET['idsanpham'];
    header('Location:../../index.php?action=quanlysp&query=them');
    exit;
} elseif (isset($_POST['suasanpham'])) {
    $isFileUploaded = isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == UPLOAD_ERR_OK;
    $id_sanpham = $_GET['idsanpham'];
    
    if ($isFileUploaded) {
        // Xử lý tải lên hình ảnh
        $uploadDir = 'uploads/';
        $hinhanh = basename($_FILES['hinhanh']['name']);
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $uploadFile = $uploadDir . $hinhanh_time;

        if (move_uploaded_file($hinhanh_tmp, $uploadFile)) {
            // Chuẩn bị câu lệnh SQL để cập nhật sản phẩm với hình ảnh mới
            $sql_sua = $mysqli->prepare("UPDATE tbl_sanpham SET tensanpham = ?, masp = ?, giasp = ?, soluong = ?, hinhanh = ?, tomtat = ?, noidung = ?, tinhtrang = ?, id_danhmuc = ? WHERE id_sanpham = ?");
            $sql_sua->bind_param("sssssssssi", $tensanpham, $masp, $giasp, $soluong, $hinhanh_time, $tomtat, $noidung, $tinhtrang, $danhmuc, $_GET['idsanpham']);

            // Lấy hình ảnh hiện tại để xóa
            $sql = $mysqli->prepare("SELECT hinhanh FROM tbl_sanpham WHERE id_sanpham = ? LIMIT 1");
            $sql->bind_param("i", $_GET['idsanpham']);
            $sql->execute();
            $result = $sql->get_result();
            while ($row = $result->fetch_assoc()) {
                if (file_exists($uploadDir . $row['hinhanh'])) {
                    unlink($uploadDir . $row['hinhanh']);
                }
            }
        } else {
            // Xử lý lỗi tải lên tệp
            die("Lỗi khi tải tệp lên.");
        }
    } else {
        // Chuẩn bị câu lệnh SQL để cập nhật sản phẩm mà không thay đổi hình ảnh
        $sql_sua = $mysqli->prepare("UPDATE tbl_sanpham SET tensanpham = ?, masp = ?, giasp = ?, soluong = ?, tomtat = ?, noidung = ?, tinhtrang = ?, id_danhmuc = ? WHERE id_sanpham = ?");
        $sql_sua->bind_param("ssssssssi", $tensanpham, $masp, $giasp, $soluong, $tomtat, $noidung, $tinhtrang, $danhmuc, $_GET['idsanpham']);
    }

    // Thực hiện câu lệnh cập nhật
    if ($sql_sua->execute()) {
        header('Location:../../index.php?action=quanlysp&query=them');
    } else {
        // Xử lý lỗi thực thi câu lệnh
        die("Lỗi khi cập nhật sản phẩm.");
    }
} else {
    // Xóa sản phẩm
    $id = $_GET['idsanpham'];
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='$id'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>
