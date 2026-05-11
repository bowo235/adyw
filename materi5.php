<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $sql = "INSERT INTO belajar (username, password, nama, email) VALUES ('$username', '$password', '$nama', '$email')";
    $query = mysqli_query($conn, $sql);
    
    if ($query) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
    }
}

?>
<form method="POST">
    username : <input type=" text" name="username">
    password : <input type="password" name="password">
    nama : <input type="text" name="nama">
    email : <input type="email" name="email">
    <input type="submit" name="kirim" value="kirim data">
</form>
 