<?php
/* ==========[BUAT MENGHUBUNGKAN KE (config.php)]========== */
@include 'config.php';

/* ==========[BUAT MENGARAHKAN KE (USER SECTION)]========== */
session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}



/* Menambahkan Produk Ke Cart (KERANJANG) */
if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
       $message[] = 'product added to cart succesfully';
    }
 
}









?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product page</title>

    <!-- CSS products.css -->
    <link rel="stylesheet" href="css/products.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>


<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};
?>

<!-- ==========[BUAT NAMPILAN NAVBAR dari (header.php)]========== -->
<?php include 'header4.php'; ?>


<!-- Banner Ad -->
<div class="banner-ad">
    <a href="#" target="_blank">
        <img src="images/SAMPUL.jpg" alt="Banner Ad">
    </a>
</div>




<div class="container">

<section class="products">

   <h1 class="heading">Produk Terbaru</h1>

   <div class="box-container">

      <?php
      /* Menghubungkan ke config.php dan Mysql */
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>


      <!-- Tampilan Product di View Products -->
      <form action="" method="post">

      <div class="box">
    <!-- Membungkus gambar dan nama produk dalam link ke detailproduk.php -->
    <a href="detail.php?id=<?php echo $fetch_product['id']; ?>" class="product-link">
        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
        <h3><?php echo $fetch_product['name']; ?></h3>
    </a>
    <div class="price">Rp<?php echo $fetch_product['price']; ?>/-</div>
    
    <!-- Hidden input untuk data produk yang diperlukan saat menambahkan ke cart -->
    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
    
    <!-- Tombol "Add to Cart" tetap berfungsi sebagai submit -->
    <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
    </div>

      </form>

      <?php
         };
      };
      ?>

   </div>

   
</section>

</div>
    





<footer class="footer">
  	 <div class="container-footer">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Dtastyum</h4>
  	 			<ul>
  	 				<li><a href="#">watch</a></li>
  	 				<li><a href="#">bag</a></li>
  	 				<li><a href="#">shoes</a></li>
  	 				<li><a href="#">dress</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
</footer>











<!-- link file js  -->
<script src="js/script.js"></script>



</body>
</html>