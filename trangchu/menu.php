
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
        unset($_SESSION['dangnhap']);
        header('Location:login_khachhang.php');
    }
?>

<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
 ?>


<div id="menu">
    <a href="index.php"><img src="anh/logo.png" alt="Adidas Logo"></a>
    <ul>
       <li><a href="index.php">Trang Chủ</a></li>
       <?php 
       while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
       ?>
       <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
       
       <?php
       }
       ?>
    </ul>
    <div class="timkiem">
        <form action="index.php?quanly=timkiem" method="POST">
        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
        <button type="submit" name="timkiem">Tìm</button>
        </form>
    </div>
    
    <div class="icons">
        <a href="trangchu/main/login_khachhang.php"><img src="anh/icondangnhap.png" alt="Đăng nhập"></a>
        <a href="trangchu/giohang.php"><img src="anh/icongiohang.png" alt="Giỏ hàng"></a>
        <a href="trangchu/main/login_khachhang.php"><img src="anh/icon_logout.jpg" alt="Đăng xuất"></a>
    </div>