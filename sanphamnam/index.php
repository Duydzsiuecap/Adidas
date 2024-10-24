<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
       body {
    font-family: 'Roboto', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
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

.video-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: hidden;
}

.video-container video {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    text-align: center;
}

.video-overlay h1 {
    font-size: 50px;
    margin: 0;
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

.filter-sort {
    text-align: right;
    padding: 10px 20px;
    background-color: #f8f8f8;
}

.filter-sort button {
    padding: 10px 20px;
    cursor: pointer;
    border: 1px solid #ccc;
    background-color: white;
}
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.product {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 10px;
    width: calc(25% - 20px); /* Adjust the width to fit 4 products per row */
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.2s;
}

.product:hover {
    transform: scale(1.05);
}

.product img {
    width: 100%;
    border-bottom: 1px solid #ddd;
    border-radius: 8px 8px 0 0;
}

.info {
    padding: 10px;
}

.price {
    font-size: 18px;
    color: #d32f2f;
    font-weight: bold;
}

.name {
    font-size: 16px;
    font-weight: bold;
    margin: 10px 0 5px;
}

.category, .details {
    font-size: 14px;
    color: #757575;
    margin: 5px 0;
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
</style>
<body>
<?php
     include ("../admin/config/config.php");
     include ("phantren.php"); 
     include ("phangiua.php");
     include ("phanduoi.php");
     ?>
</body>
</html>