
<?php
// Koneksi ke database
include 'config.php';

// Mendapatkan ID produk dari URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Query untuk mengambil data produk berdasarkan ID
    $product_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'") or die('query failed');
    
    // Memeriksa apakah produk ditemukan
    if (mysqli_num_rows($product_query) > 0) {
        $product = mysqli_fetch_assoc($product_query);
    } else {
        echo "<p>Produk tidak ditemukan.</p>";
        exit;
    }
} else {
    echo "<p>ID produk tidak diberikan.</p>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>


<!-- ==========[BUAT NAMPILAN NAVBAR dari (header.php)]========== -->
<?php include 'header4.php'; ?>


<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>


<div class="main-container">
    <div class="product-detail-container">
    <!-- Bagian Kiri - Gambar Produk -->
    <div class="product-image-section">
        <img src="uploaded_img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    </div>

    <!-- Bagian Kanan - Informasi Produk -->
    <div class="product-info-section">
        <h2><?php echo $product['name']; ?></h2>
        
        <!-- Rating Dummy (ganti sesuai kebutuhan) -->
        <div class="ratings">
            ★★★★☆ (4.0)
        </div>

        <!-- Deskripsi singkat produk -->
        <p>Deskripsi produk atau informasi akan ditambahkan di sini (Coming Soon).</p>
        
        <!-- Pilihan Varian Produk -->
        <div class="variant-options">
            <span>Pilih Varian Produk:</span>
            <div style="display: flex; gap: 10px;">
                <label>
                    <input type="radio" name="variant" value="Varian Produk 1" checked> Varian Produk 1
                </label>
                <label>
                    <input type="radio" name="variant" value="Varian Produk 2"> Varian Produk 2
                </label>
                <label>
                    <input type="radio" name="variant" value="Varian Produk 3"> Varian Produk 3
                </label>
            </div>
        </div>

        <!-- Harga produk -->
        <div class="price">Rp<?php echo $product['price']; ?>/-</div>

        <!-- Tombol "Add to Cart" -->
        <form action="user_page.php" method="POST">
            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
            <input type="hidden" name="product_variant" value="" id="selectedVariant">
            <input type="submit" class="add-to-cart-btn" value=" Add to Chart" name="add_to_cart">
        </form>

        
    </div>
</div>
    





<!-- <script>
    // Script untuk menangkap pilihan varian dan memasukkannya ke input tersembunyi sebelum submit
    const variantRadios = document.querySelectorAll('input[name="variant"]');
    const selectedVariantInput = document.getElementById('selectedVariant');

    variantRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            selectedVariantInput.value = this.value;
        });
    });

    // Set nilai awal sesuai dengan pilihan default
    selectedVariantInput.value = document.querySelector('input[name="variant"]:checked').value;
</script> -->

</body>
</html>

