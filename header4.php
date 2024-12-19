<header class="header">
    <div class="flex">

      <a href="#" class="logo" style="display: flex; align-items: center;">
      <img src="images/D-logo.jpg" alt="Logo" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
        Dtastyum
      </a>

        <div id="search_">
         <form action="" method="GET">
            <input type="text" name="keyword" id="search_bar" placeholder="Search">
            <button type="submit" name="search"><i class='fas fa-search' style='background-color: white; width: 30px; height: 30px; margin-top: 0px; padding-top: 10px; '></i>
            </button>
         </form>
        </div>

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

<style>
        #search_ {
            border: 1px solid black;
            width: 370px;
            height: 35px;
            border-radius: 20px;
            background-color: white;
            margin-right: 80px;
        }

        #search_bar {
            width: 325px;
            height: 30px;
            border-radius: 20px;
            padding-left: 10px;
            padding-top: 3px;
            font-size: 18px;
        }
    </style>
