<?php
@include 'config.php';

// Koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'shop_db') or die('connection failed');

// Fungsi query
function query($query) {
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi search
function search($keyword) {
    global $conn;
    $keyword = mysqli_real_escape_string($conn, $keyword); // Sanitasi input
    $query = "SELECT * FROM products WHERE name LIKE '$keyword%'";
    return query($query);
}

// Data awal (semua produk)
$product = query("SELECT * FROM products");

// Data saat searching
if (isset($_GET["search"])) {
    $keyword = $_GET["keyword"];
    $product = search($keyword);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <!-- <style>
        #search_ {
            border: 1px solid black;
            width: 370px;
            height: 30px;
            border-radius: 10px;
        }

        #search_bar {
            width: 300px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid pink;
            padding-left: 10px;
            font-size: 18px;
        }

        .product {
            margin: 10px;
            padding: 10px;
            border: 1px solid gray;
            border-radius: 5px;
        }
    </style> -->
</head>
<body>

<!-- <div id="search_">
    <form action="" method="GET">
        <input type="text" name="keyword" id="search_bar" placeholder="Search">
        <button type="submit" name="search">Search</button>
    </form>
</div> -->

<!-- <div id="product_list">
    <?php if (!empty($product)): ?>
        <?php foreach ($product as $item): ?>
            <div class="product">
                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                <p>Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div> -->

<a href="detail.php?id=<?php echo $fetch_product['id']; ?>" class="product-link">
        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
        <h3><?php echo $fetch_product['name']; ?></h3>
    </a>
    <div class="price">Rp<?php echo $fetch_product['price']; ?>/-</div>


</body>
</html>
