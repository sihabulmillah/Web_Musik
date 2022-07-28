<?php
$conn = mysqli_connect("localhost", "sihab", "password", "u_uas21");

function hapus($id)
{
    global $conn;
    $query = mysqli_query($conn, "DELETE FROM musisi WHERE id_musisi = $id");

    if ($query) {
        header('location:home.php');
    } else {
        // echo "gagal hapus data"
        echo mysqli_error($conn);
    }
}

function tambah($data)
{
    global $conn;
    $nama = $_POST["nama"];
    $judul = $_POST["judul"];
    $genre = $_POST["genre"];
    $desc = $_POST["desc"];

    $query = mysqli_query($conn, "INSERT INTO musisi VALUES(NULL,'$nama','$judul','$desc',$genre)");
    if ($query) {
        header("location:home.php");
    } else {
        "data gagal ditambahkan";
    }
}
function edit($data)
{
    global $conn;
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $judul = $_POST["judul"];
    $genre = $_POST["genre"];
    $desc = $_POST["desc"];

    $sql = "UPDATE musisi SET nama_musisi = '$nama',
            judul_lagu = '$judul',deskripsi = '$desc',genre_id = '$genre' WHERE id_musisi = $id";
    $query  = mysqli_query($conn, $sql);
    if ($query) {
        header("location:home.php");
    } else {
        "gagal merubah data";
    }
}
function tambahGen($data)
{
    global $conn;
    $nama = $_POST["nama"];
    $query = mysqli_query($conn, "INSERT INTO genre VALUES(NULL,'$nama')");
    if ($query) {
        header("location:home.php");
    } else {
        "gagal menambah data";
    }
}
function hapusGen($id)
{
    global $conn;
    $query = mysqli_query($conn, "DELETE FROM genre WHERE id_genre = $id");

    if ($query) {
        header('location:home.php');
    } else {
        // echo "gagal hapus data"
        echo mysqli_error($conn);
    }
}
function editGen($data)
{
    global $conn;
    $id = $_POST["id"];
    $nama = $_POST["nama"];

    $sql = "UPDATE genre SET genre = '$nama' WHERE id_genre = $id";
    $query  = mysqli_query($conn, $sql);
    if ($query) {
        header("location:home.php");
    } else {
        "gagal merubah data";
    }
}
function cari($keyword)
{
    global $conn;
    return  mysqli_query($conn, "SELECT musisi.*,genre.* FROM musisi INNER JOIN genre ON musisi.genre_id = genre.id_genre WHERE nama_musisi LIKE '%$keyword%' OR judul_lagu LIKE '%$keyword%' OR genre LIKE '%$keyword%'");
}
