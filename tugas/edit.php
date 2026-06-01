<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM mahasiswa
    WHERE id='$id'"
);

$d = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
Edit Mahasiswa
</div>

<div class="card-body">

<form action="update.php" method="POST">

<input type="hidden"
name="id"
value="<?= $d['id']; ?>">

<div class="mb-3">

<label>NIM</label>

<input type="text"
name="nim"
value="<?= $d['nim']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Nama</label>

<input type="text"
name="nama"
value="<?= $d['nama']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Jurusan</label>

<input type="text"
name="jurusan"
value="<?= $d['jurusan']; ?>"
class="form-control">

</div>

<button type="submit"
class="btn btn-primary">
Update
</button>

<a href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>
</html>