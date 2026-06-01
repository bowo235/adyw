<?php

include 'koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

mysqli_query(
    $conn,
    "UPDATE mahasiswa SET
    nim='$nim',
    nama='$nama',
    jurusan='$jurusan'
    WHERE id='$id'"
);

header("Location:index.php");

?>