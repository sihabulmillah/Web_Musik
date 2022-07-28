<?php
include "functions.php";

$query = mysqli_query($conn, "SELECT musisi.*,genre.* FROM musisi INNER JOIN genre ON musisi.genre_id = genre.id_genre");
$sql = mysqli_query($conn, "SELECT * FROM genre");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home-Spotify</title>
  <style>
    h1 {
      margin: 20px 350px;
    }


    .musisi,
    .genre {
      margin-top: 10px;
    }

    .musisi th {
      background-color: #6700ff;
      color: white;
    }

    .genre th {
      background-color: #009100;
      color: white;
    }
  </style>
</head>


<body>
  <h1>Spotify Dashboard</h1>

  <ol>
    <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
    <li>
      <h3>Daftar Musisi</h3>
    </li>
    <a href="tambah_musisi.php"><button style="margin-right: 10px;">Add Data</button></a>
    <a href="dashboard.php"><button>
        << Back to Home</button></a>
    <table border="1" cellpadding="5" class="musisi">
      <tr>
        <th width="25px">#</th>
        <th>Nama Musisi</th>
        <th>Judul Lagu</th>
        <th>Genre</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
      <?php
      $i = 1;
      foreach ($query as $data) { ?>
        <tr>
          <td align="center"><?= $i ?></td>
          <td><?= $data["nama_musisi"] ?></td>
          <td><?= $data["judul_lagu"] ?></td>
          <td><?= $data["genre"] ?></td>
          <td><?= $data["deskripsi"] ?></td>
          <td>
            <a href="edit_musisi.php?id=<?= $data["id_musisi"] ?>"><button>Edit</button></a> ||
            <a href="hapus.php?id=<?= $data["id_musisi"] ?>"><button onclick="return confirm('Are You Sure');">Delete</button></a>
          </td>
        </tr>
      <?php $i++;
      } ?>
    </table>
    <p style="margin: 15px 0 20px 0;">////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
    <li>
      <h3>Daftar Genre</h3>
    </li>
    <a href="tambah_genre.php"><button>Add Data</button></a>
    <table border="1" cellpadding="5" class="genre">
      <tr>
        <th>#</th>
        <th width="150px">Nama Genre</th>
        <th>Aksi</th>
      </tr>
      <?php
      $i = 1;
      foreach ($sql as $row) { ?>
        <tr>
          <td width="25px" align="center"><?= $i ?></td>
          <td><?= $row["genre"] ?></td>
          <td><a href="edit_genre.php?id=<?= $row["id_genre"] ?>"><button>Edit</button></a> ||
            <a href="hapus.php?id1=<?= $row["id_genre"] ?>"><button onclick="return confirm('Are You Sure');">Delete</button></a>
          </td>
        </tr>
      <?php $i++;
      } ?>
    </table>
    <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
  </ol>
</body>

</html>