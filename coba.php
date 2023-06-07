<!DOCTYPE html>
<html>

<head>
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .product-list {
            list-style: none;
            padding: 0;
        }

        .product-list li {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .product-list li .product-image {
            flex: 0 0 100px;
            text-align: center;
        }

        .product-list li .product-image img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-list li .product-info {
            flex: 1;
            padding-left: 20px;
        }

        .product-list li .product-name {
            font-weight: bold;
            color: #333;
        }

        .product-list li .product-price {
            color: #666;
        }

        .product-list li .product-button {
            flex: 0 0 auto;
            margin-left: 20px;
        }

        .product-list li .product-button button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Produk</h1>
        <ul class="product-list">
            <li>
                <div class="product-image">
                    <img src="data:image/jpeg;base64,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" alt="Produk 1">
                </div>
                <div class="product-info">
                    <div class="product-name">Produk 1</div>
                    <div class="product-price">Rp 100.000</div>
                </div>
                <div class="product-button">
                    <button>Lihat</button>
                </div>
            </li>

            <!-- Tambahkan lebih banyak produk di sini -->
        </ul>
    </div>
</body>

</html>