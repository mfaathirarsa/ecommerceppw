<header class="header">
    <div class="flex">

      <a href="#" class="logo" style="display: flex; align-items: center;">
      <img src="images/D-logo.jpg" alt="Logo" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
        Dtastyum
      </a>

      <nav class="navbar">
         <a href="user_page.php">Products</a>
      </nav>

      <!-- Menambahkan Produk Ke Chart -->
      <?php
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>

      <a href="cart.php" class="cart">cart <span><!--(Countdown Cart di Navbar)--><?php echo $row_count; ?></span> </a>

      <nav class="navbar">
      <a href="user_profile.php">Profile</a>
      <a href="logout.php">Logout</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div> 

   </div>
</header>