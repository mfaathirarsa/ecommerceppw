<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_profile.css">

</head>
<body>
   
<!-- ==========[BUAT NAMPILAN NAVBAR dari (header.php)]========== -->
<?php include 'header3.php'; ?>
 


<div class="main-content">
   <div class="profile-header">
      <h2>Profile</h2>
      <div class="content">
         <h3>Hi, <span class="admin-text">admin</span></h3>
      </div>
      <div class="user-actions">
         <span><h3><?php echo $_SESSION['admin_name']; ?></h3></span>
         <img src="images/D-logo.jpg" alt="User Avatar" class="user-avatar">
      </div>
   </div>


   <div class="profile-content">
      <!-- Foto Profil Kosong Bulat -->
      <div class="profile-photo">
         <img src="images/profile.jpg" alt="Foto Profil" class="circular-photo">
      </div>
      <div class="profile-info">
         <p><strong>Nama:</strong> <?php echo $_SESSION['admin_name']; ?></p>
         <p><strong>Nomor Telepon:</strong> +62-1234567890</p>
         <p><strong>Alamat:</strong> Jl. Sudirman No.123, Jakarta, Indonesia</p>
         <button class="profile-edit-btn">Edit Profile</button>
      </div>
   </div>

   <!-- Menu Navigasi Profil -->
   <div class="profile-menu">
      <ul>
         <li><a href="transaction_history.php">Laporan Penjualan</a></li>
         <li><a href="favorite_products.php">Ulasan</a></li>
         <li><a href="address_list.php">Kelola Pesanan</a></li>
         <li><a href="bank_account.php">Rekening</a></li>
         <li><a href="account_security.php">Keamanan Akun</a></li>
         <li><a href="notifications.php">Notifikasi</a></li>
      </ul>
   </div>
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

</body>
</html>