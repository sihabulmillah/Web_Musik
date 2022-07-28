<?php
include "functions.php";
$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * FROM genre WHERE id_genre = $id");
if (isset($_POST["submit"])) {
  editGen($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="margin-left: 50px;">
  <h1 style="margin: 20px 300px;">Tambah Data Genre</h1>
  <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
  <a href="home.php"><button>
      << Back</button></a> <br><br>
  <form action="" method="post">
    <table cellpadding="5" style="margin-left: -6px;">
      <?php foreach ($query as $data) { ?>
        <input type="hidden" name="id" value="<?= $data["id_genre"] ?>">
        <tr>
          <td><label for="nama">Nama Genre</label></td>
          <td><input type="text" name="nama" id="nama" value="<?= $data["genre"] ?>"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><button type="submit" name="submit">Submit</button></td>
        </tr>
      <?php } ?>
    </table>
  </form>
  <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
</body>

</html>