<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])) {
        header('Location:login_khachhang.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adidas Vietnam</title>
    <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #menu {
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        #menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        #menu li {
            margin: 0 15px;
        }
        #menu a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            padding: 15px 0;
            display: block;
        }
        #menu a:hover {
            color: #ff0000; /* màu khi di chuột */
        }
        #menu img {
            height: 40px; 
        }
        .timkiem {
            display: flex;
            align-items: center;
        }
        .timkiem input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .timkiem button {
            padding: 5px 10px;
            margin-left: 5px;
            background-color: #ebeaea;
            color: #0c0c0c;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .timkiem button:hover {
            background-color: #555;
        }
        .icons {
            display: flex;
            align-items: center;
        }
        .icons a {
            margin-left: 15px;
            display: flex;
            align-items: center;
        }
        .icons a img {
            width: 40px; /* Điều chỉnh kích thước ảnh nếu cần */
            height: auto;
            margin-right: 5px;
        }
        .textbox {
            position: relative;
            text-align: center;
            color: white;
        }
        .textbox img {
            width: 100%;
            height: auto;
        }
        .textbox-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .textbox-text h1 {
            font-size: 50px;
            margin: 0;
        }
        .textbox-text p {
            font-size: 20px;
        }
        .textbox-text button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
        .textbox-text button:hover {
            background-color: #555;
        }
        .video-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
        }
        .video-container video {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .video-overlay button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
        }
        .video-overlay h1 {
            font-size: 50px;
            margin: 0;
        }
        .video-container {
            position: relative;
            width: 100%;
            max-width: 100%;
        }
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 40%;
            height: 150%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #fff;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        h1 {
            width: 100%;
            text-align: center;
            color: #f4efef;
            font-weight: 700;
        }
        .card {
            display: flex;
            flex-direction: column;
            width: 24%; 
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card img,
        .card video {
            width: 100%;
            height: auto;
        }
        .text {
            padding: 20px;
            text-align: center;
        }
        .text h2 {
            color: #333;
            margin: 0 0 10px;
            font-weight: 500;
        }
        .text p {
            color: #666;
            font-weight: 400;
        }
        .text a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        .text a:hover {
            background-color: #333;
        }
        .footer-container {
            width: 100%;
            padding: 20px 0;
            background-color: #f7f7f7;
        }
        .footer-top {
            text-align: center;
            padding: 20px;
        }
        .footer-top h2 {
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .footer-top p {
            font-weight: 400;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .signup {
            background-color: #ffd500;
            padding: 20px;
            display: inline-block;
            width: 100%;
            text-align: center;
        }
        .signup span {
            font-weight: 700;
            font-size: 18px;
            margin-right: 20px;
        }
        .signup a {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
        }
        .signup a:hover {
            background-color: #333;
        }
        .footer-bottom {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .footer-column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }
        .footer-column h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }
        .footer-column ul {
            list-style-type: none;
            padding: 0;
        }
        .footer-column ul li {
            margin-bottom: 5px;
            font-weight: 400;
            font-size: 14px;
        }
        

    </style>
</head>
<body>
    <?php
     include ("admin/config/config.php");
     include ("trangchu/menu.php"); 
     include ("trangchu/header.php");
     include ("trangchu/main.php");
     include ("trangchu/content.php");
     include ("trangchu/footer.php");
    
    
    
     
     
     ?>
</body>
</html>
