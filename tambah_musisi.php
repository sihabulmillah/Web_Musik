<?php
require "functions.php";

$data = mysqli_query($conn, "SELECT * FROM genre");
if (isset($_POST["submit"])) {
    tambah($_POST);
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
    <h1 style="margin: 20px 300px;">Tambah Data Musisi</h1>
    <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
    <a href="home.php"><button>
            << Back</button></a> <br><br>
    <form action="" method="post">
        <table cellpadding="5" style="margin-left: -6px;">
            <tr>
                <td><label for="nama">Nama Musisi</label></td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label for="judul">Judul Lagu</label></td>
                <td><input type="text" name="judul" id="judul"></td>
            </tr>
            <tr>
                <td><label for="genre">Genre</label></td>
                <td>
                    <select name="genre" id="genre">
                        <option hidden>--= Choose Genre =--</option>
                        <?php foreach ($data as $row) { ?>
                            <option value="<?= $row["id_genre"] ?>"><?= $row["genre"] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="desc">Deskripsi</label></td>
                <td><textarea name="desc" id="desc" cols="20" rows="5"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <p>////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
</body>

</html>