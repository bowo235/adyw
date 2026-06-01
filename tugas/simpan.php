<?php

include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

mysqli_query(
    $conn,
    "INSERT INTO mahasiswa(nim,nama,jurusan)
    VALUES('$nim','$nama','$jurusan')"
);

header("Location:index.php");

?>