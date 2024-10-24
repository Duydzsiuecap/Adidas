<div id = "main" >
    
    <div class = "maincontent" >
        <?php
        if (isset($_GET["quanly"])){
        $tam = $_GET["quanly"];
        }else{
        $tam = '';
        }
        if($tam == 'danhmucsanpham'){
         include ("main/danhmuc.php");
         } elseif($tam == 'tintuc'){
         include ("main/thanhvien.php");
        } elseif($tam == 'lienhe'){
         include ("main/lienhe.php");
        } elseif($tam == 'sanpham'){
         include ("main/sanpham.php");
        }elseif($tam == 'timkiem'){
            include ("main/timkiem.php");
        }elseif($tam == 'dangky'){
            include ("main/dangky.php");
        }elseif($tam == 'camon'){
            include ("main/camon.php");
         } elseif($tam == 'login_khachhang'){
                include ("main/login_khachhang.php");
            }else {
                include ("trangsanpham.php");
               }
        
            
            
        
         ?>
</div>
    </div>
