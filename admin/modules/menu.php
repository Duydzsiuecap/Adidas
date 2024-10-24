<style>
    /* CSS cho danh sách quản trị viên */
.admin_list {
    list-style-type: none; /* Bỏ dấu chấm đầu dòng */
    padding: 0; /* Bỏ khoảng cách trong */
    margin: 20px 0; /* Thêm khoảng cách bên ngoài */
    background-color: #fff; /* Màu nền trắng */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho danh sách */
    border-radius: 10px; /* Bo tròn các góc */
    overflow: hidden; /* Đảm bảo các mục không tràn ra ngoài */
}

.admin_list li {
    border-bottom: 1px solid #ddd; /* Đường viền dưới cho mỗi mục */
}

.admin_list li:last-child {
    border-bottom: auto; /* Bỏ đường viền cho mục cuối cùng */
}

.admin_list a {
    display: block; /* Chuyển các liên kết thành khối */
    padding: 15px; /* Thêm khoảng cách trong */
    text-decoration: none; /* Bỏ gạch chân */
    color: #333; /* Màu chữ */
    font-weight: bold; /* Chữ đậm */
}

.admin_list a:hover {
    background-color: #f1f1f1; /* Màu nền khi di chuột */
    color: #000; /* Màu chữ khi di chuột */
}



</style>

<ul class="admin_list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản Lý Danh Mục Sản Phẩm</a></li>
    <li><a href="index.php?action=quanlysp&query=them">Quản Lý Sản Phẩm</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý Bài Viết</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý Danh Mục Bài Viết</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản Lý don Hang</a></li>
    <li><a href="index.php?dangxuat=1">Đăng Xuất</a></li>
</ul>