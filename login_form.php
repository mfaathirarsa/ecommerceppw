<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : null;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : null;
    $pass = isset($_POST['password']) ? md5($_POST['password']) : null;
    $cpass = isset($_POST['password']) ? md5($_POST['password']) : null;
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : null;
    

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_id'] = $row['id'];

         /* Tandain */
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         // $_SESSION['admin_name'] = $row['name'];


         // untuk menghubungkan ke user_page
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

}
?>


<?php
   // Menyesuaikan Jam
   date_default_timezone_set('Asia/Jakarta');

   // GOOGLE API  

   date_default_timezone_set('Asia/Jakarta');

   $conn = mysqli_connect('localhost', 'root', '', 'db_login_google');
    if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
   }


   require __DIR__ . "/vendor/autoload.php";

   $client_id      = '983399981610-6rne3bh7b7d8d6ftj0h1lpueff4rd2s4.apps.googleusercontent.com';
   $client_secret  = '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';
   $redirect_uri    = 'http://localhost/dtastyum/login_form.php';

   // Inisiasi Google Client
   $client = new Google_Client();

   // Konfigurasi Google Client
   $client->setClientId("$client_id");
   $client->setClientSecret("$client_secret");
   $client->setRedirectUri("$redirect_uri");

   $client->addScope("email");
   $client->addScope("profile");

   
   if (isset($_GET['code'])) {

      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);


      // echo "<pre>";
      // print_r($token);
      // echo "</pre>";

      if (!isset($token['error'])) {

         $client->setAccessToken($token['access_token']);

         // inisiasi Google Service oauth2
         $service = new Google_Service_Oauth2($client);
         $profile = $service->userinfo->get();

         // echo "<pre>";
         // print_r($profile);
         // echo "</pre>";

         // Tampung data respon dari akun google
         $g_name  = $profile['name'];
         $g_email = $profile['email'];
         $g_id    = $profile['id'];

         $currtime = date('Y-m-d H:i:s');



         // Jika id sudah ada di tabel user, maka lakukan update data
         // jika id belum ada di table user, maka lakukan insert data

         $query_check = 'select * from users where oauth_id = "'.$g_id.'"';
         $run_query_check = mysqli_query($conn, $query_check);
         $d = mysqli_fetch_object($run_query_check);

         if($d){
            $query_update = 'update users set fullname = "'.$g_name.'", email = "'.$g_email.'", last_login = "'.$currtime.'" where oauth_id = "'.$g_id.'"   ';
            $run_query_update = mysqli_query($conn, $query_update);



         }else{
            $query_insert = 'insert into users (fullname, email, oauth_id, last_login) value("'.$g_name.'", "'.$g_email.'", "'.$g_id.'", "'.$currtime.'")';
            $run_query_check = mysqli_query($conn, $query_insert);
         }


         // daftar Session
         $_SESSION['logged_in'] = true;
         $_SESSION['access_token'] = $token['access_token'];
         $_SESSION['uname'] = $g_name;

         header('location: user_page.php');

      }else{

         echo "Login gagal cik";
      }



      
  
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- CAPTCHA -->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>
<body>

<!-- ==========[BUAT NAMPILAN NAVBAR 2 dari (header.php)]========== -->
<?php include 'header2.php' ?>


<!-- CAPTCHA -->



   
<div class="form-container">

   <form action="" method="post">
     <!-- Logo Bulat -->
     <img src="images/D-logo.jpg" alt="Logo" class="login-logo">
   

      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <div class="g-recaptcha" data-sitekey="6Lcc9nEqAAAAAHGBKzGcvlDm5meKyVVd-aV56HpG"></div>
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>

      <br>
      <p><b>OR</b></p>
      <br>
      

      <a href="<?= $client->createAuthUrl(); ?>"><img src="google/btn_google_dark.png" alt="button google" style="width: 200px; height: auto;"></a>

      

      

      <!-- <a href=""><img src="google/btn_google.png" alt="button google"></a> -->
   </form>

</div>





</body>
</html>