<?php
include "functions.php";

$quer = mysqli_query($conn, "SELECT * FROM musisi");
$query = mysqli_query($conn, "SELECT * FROM musisi");
$sql = mysqli_query($conn, "SELECT * FROM genre");
if (isset($_POST["cari"])) {
 $query = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Home-Spotify</title>
 <link rel="stylesheet" href="styleuas.css">
 <style>
  input {
   font-family: 'poppins';
   font-size: 12px;
   margin-top: -2px;
   border: none;
   padding: 3px;
   margin-left: 5px;
   width: 88%;
   outline: none;
  }

  .search img {
   width: 100%;
   height: 15px;
  }

  .search button {
   background-color: white;
   border: none;
   float: left;
   width: 28px;
   height: 20px;
  }
 </style>
</head>

<body>
 <!-- awal header -->
 <header>
  <img src="img/spot.png" alt="spotify">
  <div class="search">
   <form action="" method="post">
    <input type="text" placeholder="Search" name="keyword" autocomplete="off" autofocus>
    <button type="submit" name="cari"><img src="img/ser.png" alt="search"></button>
   </form>
  </div>
  <div class="icon">
   <a href="home.php"><button>DASHBOARD</button></a>
   <p>SM</p>
   <span>Sihabul Millah</span>
  </div>
 </header>
 <!-- Akhir Header -->
 <div class="container">
  <!-- awal sidebar -->
  <section>
   <div class="navigasi">
    <img src="img/home.png" alt="home">
    <h3>Home</h3>
   </div>
   <div class="menu">
    <p>MUSISI/GROUP</p>
    <ul>
     <?php foreach ($quer as $data) { ?>
      <li><?= $data["nama_musisi"] ?></li>
     <?php } ?>
    </ul>
   </div>
   <div class="navigasi">
    <img src="img/library.png" alt="library">
    <h3>Library</h3>
   </div>
   <div class="menu-1">
    <ul>
     <?php foreach ($quer as $row) { ?>
      <li><?php echo $row["nama_musisi"] . ' - ' . $row["judul_lagu"]; ?></li>
     <?php } ?>
    </ul>
   </div>
  </section>
  <!-- Akhir sidebar -->
  <!-- awal tampilan main -->
  <article>
   <h2>Your Top Genre</h2>
   <div class="parent">
    <?php foreach ($sql as $data) { ?>
     <div class="genre"><?= $data["genre"] ?></div>
    <?php } ?>
    <!-- <div class="genre"></div> -->
   </div>
   <h2>Mood Booster</h2>
   <p>Strength grows in the moments you think you con't go on,but you keep going anyway</p>
   <div class="parent">
    <?php foreach ($query as $row) { ?>
     <div class="music">
      <div class="latar"></div>
      <h3><?= $row["judul_lagu"] ?></h3>
      <p><?= $row["deskripsi"] ?></p>
     </div>
    <?php } ?>
   </div>
  </article> <!-- akhir tampilan main -->
 </div>
 <!--tutup container-->
 <div class="upgrade">
  <div class="footer">
   <p>Powered by : Sihabul Millah @2021</p>
  </div>
  <button>UPGRADE PREMIUM</button>
 </div>
</body>

</html>