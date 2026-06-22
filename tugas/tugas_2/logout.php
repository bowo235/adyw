<?php
session_start();

// Menghapus semua session login
$_SESSION = [];
session_unset();
session_destroy();

// Alihkan kembali ke halaman login setelah berhasil logout
header("Location: login.php");
exit;