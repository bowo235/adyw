<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Profil Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<div class="card">

<div class="card-header">
Profil Admin
</div>

<div class="card-body">

<h4>Username :</h4>

<p>
<?= $_SESSION['username']; ?>
</p>

<a href="index.php"
class="btn btn-primary">
Kembali
</a>

</div>

</div>

</div>

</body>
</html>