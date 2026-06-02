<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Mahasiswa Tersimpan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h3>Data Mahasiswa Tersimpan</h3>

<table class="table table-bordered">

<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jurusan</th>
</tr>

<?php

$no=1;

$data=mysqli_query(
$conn,
"SELECT * FROM mahasiswa ORDER BY id DESC"
);

while($d=mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nim']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['jurusan']; ?></td>
</tr>

<?php } ?>

</table>

<a href="index.php" class="btn btn-primary">
Kembali
</a>

</div>

</body>
</html>