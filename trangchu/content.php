

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm Nam</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
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
        .buy-button {
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }
        .buy-button:hover {
            background-color: #e91e63;
        }
        .detail-button {
            background-color: #2196f3; /* Blue background for detail button */
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 10px;
        }
        .detail-button:hover {
            background-color: #1976d2; /* Darker blue on hover */
        }
    </style>
</head>


<div class="video-container">
    <video autoplay loop muted>
        <source src="video/234.mp4" type="video/mp4">
    </video>
    <div class="video-overlay">
        <h1>ARSENAL 24/25 HOME KIT</h1>
        <button>Mua Ngay</button>
    </div>
</div>

<div class="container">
    <h1>WHAT'S HOT</h1>
    <div class="card">
        <img src="anh/duxa.avif" alt="Workout">
        <div class="text">
            <h2>Cảm nhận sức mạnh</h2>
            <p>Nâng cấp buổi tập của bạn trong từng động tác.</p>
            <a href="#">MUA NGAY</a>
        </div>
    </div>
    <div class="card">
        <img src="anh/tenis.avif" alt="Padel">
        <div class="text">
            <h2>Trang phục padel mới</h2>
            <p>Ra sân trong dáng vẻ sản phẩm mới của chúng tôi.</p>
            <a href="#">SEE ALL</a>
        </div>
    </div>
    <div class="card">
        <video src="video/boxtext1.mp4" autoplay loop muted></video>
        <div class="text">
            <h2>MOVE FOR THE PLANET</h2>
            <p>Tất cả vì hành động tác nào. Tham gia ngay trên ứng dụng adidas Running.</p>
            <a href="#">THAM GIA NGAY</a>
        </div>
    </div>
    <div class="card">
        <video src="video/bayen.mp4" autoplay loop muted></video>
        <div class="text">
            <h2>FC Bayern 24/25 Home Kit</h2>
            <p>Mang dấu ấn sắc đỏ Bayern, cam kết hướng tới tương lai.</p>
            <a href="#">MUA NGAY</a>
        </div>
    </div>
</div>
</body>
</html>
