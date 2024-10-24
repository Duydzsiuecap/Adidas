<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])) {
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Adidas</title>
    <link rel="sylesheet" type="text/css" href="css/styleadmin.css">
</head>
<style >
    ul.admin_list{
    padding: 0;
    margin: 0;
    list-style: none;
}
ul.admin_list li {
    float: left;
    margin: 5px;
}
.clear{
    clear: both;
}
h3.tilte_admin{
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 20px;
    margin-top: 20px;
}
.wrapper{
    border:1px solid #000;
    height: auto;
    width: 90%;
    max-width:0  auto ;
}
</style>
<body>
    <h3 class ="tilte_admin">Chào Mừng Quay Trở Lại Sếp</h3>
    <div class="wrapper">
    <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/main.php");
            include("modules/footer.php");

     ?>
     </div>
</body>
</html>