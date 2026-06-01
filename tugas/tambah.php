<!DOCTYPE html>
<html>
<head>

<title>Tambah Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">
Tambah Mahasiswa
</div>

<div class="card-body">

<form action="simpan.php" method="POST">

<div class="mb-3">

<label>NIM</label>

<input type="text"
name="nim"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nama</label>

<input type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jurusan</label>

<input type="text"
name="jurusan"
class="form-control"
required>

</div>

<button type="submit"
class="btn btn-success">
Simpan
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