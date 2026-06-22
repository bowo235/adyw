<?php
// Memulai session untuk menyimpan status login
session_start();

// Jika admin sudah login sebelumnya, langsung lempar ke halaman admin.php
if (isset($_SESSION['login_admin'])) {
    header("Location: admin.php");
    exit;
}

// --- KONEKSI DATABASE ---
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

$error_message = "";

// --- LOGIKA PROSES LOGIN ---
if (isset($_POST['submit_login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Mencari data admin berdasarkan username di database
    // Catatan: Pastikan Anda sudah memiliki tabel bernama `admin` dengan kolom `username` dan `password`
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $eksekusi = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($eksekusi) === 1) {
        // Jika data cocok, buat session login dan pindah ke dashboard
        $_SESSION['login_admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        // Jika salah, tampilkan pesan error
        $error_message = "Kombinasi Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grup Otentikasi Keamanan | ADY.STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #05050a; }
        .glass-card { background: rgba(15, 15, 30, 0.6); border: 1px solid rgba(255, 255, 255, 0.05); backdrop-filter: blur(16px); }
        .input-premium { background: #0a0a14; border: 1px solid #1e1e38; transition: all 0.3s ease; }
        .input-premium:focus { border-color: #38bdf8; outline: none; box-shadow: 0 0 20px rgba(56, 189, 248, 0.15); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

    <div class="absolute -top-40 -left-40 w-96 h-96 bg-sky-500/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-indigo-500/10 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="w-full max-w-md glass-card p-8 md:p-10 rounded-3xl shadow-2xl relative z-10">
        
        <div class="text-center mb-8 space-y-2">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xl mb-2">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h2 class="text-xl font-black text-white tracking-tight uppercase">Gatekeeper Access</h2>
            <p class="text-xs text-zinc-500 font-light">Masukkan kredensial terenkripsi Anda untuk mengelola CMS</p>
        </div>

        <?php if (!empty($error_message)) : ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl text-xs font-semibold flex items-center gap-2 animate-shake">
                <i class="fa-solid fa-triangle-exclamation text-sm"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-5">
            <div class="space-y-2">
                <label class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Sistem Kunci (Username)</label>
                <div class="relative">
                    <i class="fa-solid fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-zinc-600 text-xs"></i>
                    <input type="text" name="username" required placeholder="admin" 
                        class="input-premium w-full pl-11 pr-4 py-3.5 rounded-xl text-sm text-white placeholder-zinc-700">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Kata Sandi (Password)</label>
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-zinc-600 text-xs"></i>
                    <input type="password" name="password" required placeholder="••••••••" 
                        class="input-premium w-full pl-11 pr-4 py-3.5 rounded-xl text-sm text-white placeholder-zinc-700">
                </div>
            </div>

            <button type="submit" name="submit_login" 
                class="w-full py-4 mt-2 bg-white text-black hover:bg-sky-400 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-white/5 hover:shadow-sky-500/10">
                Buka Panel Kendali <i class="fa-solid fa-arrow-right-to-bracket ml-1"></i>
            </button>
        </form>

        <div class="text-center mt-8 border-t border-white/5 pt-6">
            <a href="index.php" class="text-xs text-zinc-500 hover:text-white transition font-medium">
                <i class="fa-solid fa-arrow-left-long mr-1"></i> Kembali ke Beranda Utama
            </a>
        </div>
    </div>

</body>
</html>