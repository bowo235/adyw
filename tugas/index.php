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

<title>Data Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<span class="navbar-brand">
Sistem Data Mahasiswa
</span>

<div>

<span class="text-white me-2">
    <i class="bi bi-person-circle"></i>
<?= $_SESSION['username']; ?>
</span>

<a href="logout.php"
class="btn btn-danger btn-sm ms-3">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">

<h3>Data Mahasiswa</h3>

<a href="tambah.php"
class="btn btn-success">
Tambah Data
</a>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Aksi</th>
</tr>

<?php

$no = 1;

$data = mysqli_query(
    $conn,
    "SELECT * FROM mahasiswa"
);

while($d = mysqli_fetch_assoc($data))
{
?>

<tr>

<td><?= $no++; ?></td>
<td><?= $d['nim']; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['jurusan']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini ?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</body>
</html>