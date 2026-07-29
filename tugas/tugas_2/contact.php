<?php
// 1. KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$notifikasi = '';

// 2. PROSES FORM JIKA DIKIRIM BY USER
if (isset($_POST['kirim_pesan'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $subjek = trim($_POST['subjek']);
    $pesan = trim($_POST['pesan']);

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        // Amankan input menggunakan Prepared Statement
        $query = "INSERT INTO pesan (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $subjek, $pesan);
            
            if (mysqli_stmt_execute($stmt)) {
                $notifikasi = "sukses";
            } else {
                $notifikasi = "gagal";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $notifikasi = "kosong";
    }
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ADY.STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#020205] text-zinc-100 antialiased selection:bg-sky-500/30 selection:text-sky-300">

    <!-- Efek Cahaya Latar Belakang Estetik -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-indigo-500/5 blur-[150px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 left-1/4 w-[400px] h-[400px] bg-sky-500/5 blur-[130px] pointer-events-none"></div>

    <!-- NAVBAR PREMIUM -->
    <header class="border-b border-white/5 bg-[#020205]/70 backdrop-blur-md sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-5xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="index.php" class="text-sm font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500 uppercase">ADY.STUDIO</a>
            
            <nav class="hidden md:flex space-x-8 text-xs font-semibold uppercase tracking-wider text-zinc-400">
                <a href="index.php" class="hover:text-white transition duration-300">Home</a>
                <a href="about.php" class="hover:text-white transition duration-300">About</a>
                <a href="services.php" class="hover:text-white transition duration-300">Services</a>
                <a href="index.php#portofolio" class="hover:text-white transition duration-300">Portofolio</a>
                <a href="contact.php" class="text-sky-400 font-bold transition duration-300">Contact</a>
            </nav>
            
            <a href="https://wa.me/6281234567890?text=Halo%20Ady.Studio,%20saya%20tertarik%20ingin%20berkolaborasi%20mengenai%20pengembangan%20website." 
               target="_blank" 
               class="bg-sky-500 hover:bg-sky-600 text-white font-semibold text-xs px-5 py-2.5 rounded-xl uppercase tracking-wider shadow-lg shadow-sky-500/20 transition-all duration-300 text-center">
                Let's Talk
            </a>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-4xl mx-auto px-6 py-16 relative z-10 space-y-12">
        
        <!-- Header Judul Kontak -->
        <div class="text-center space-y-4 max-w-2xl mx-auto">
            <div class="inline-flex items-center gap-2 bg-sky-500/10 text-sky-400 border border-sky-500/30 text-[11px] uppercase tracking-widest font-extrabold px-4.5 py-2 rounded-full font-mono backdrop-blur-md">
                <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                Get In Touch &bull; Let's Connect
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
                Mulai Kolaborasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">Proyek Anda</span>
            </h1>
            <p class="text-zinc-400 text-xs md:text-sm font-light leading-relaxed">
                Punya ide cemerlang, butuh sistem informasi kustom, atau ingin mendiskusikan pengembangan web profesional? Sampaikan pesan Anda melalui formulir di bawah ini.
            </p>
        </div>

        <!-- Formulir Kontak dengan Database -->
        <div class="bg-zinc-900/30 border border-white/10 p-8 md:p-12 rounded-3xl backdrop-blur-xl shadow-2xl relative overflow-hidden">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Notifikasi Pesan -->
            <?php if ($notifikasi === 'sukses') : ?>
                <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs rounded-xl font-mono flex items-center gap-2">
                    <span>✓</span> Pesan Anda berhasil dikirim! Terima kasih sudah menghubungi saya.
                </div>
            <?php elseif ($notifikasi === 'gagal') : ?>
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-xl font-mono flex items-center gap-2">
                    <span>✕</span> Gagal mengirim pesan. Silakan coba lagi.
                </div>
            <?php elseif ($notifikasi === 'kosong') : ?>
                <div class="mb-6 p-4 bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs rounded-xl font-mono flex items-center gap-2">
                    <span>⚠</span> Harap isi semua kolom bertanda bintang (*).
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-mono font-bold tracking-wider text-zinc-300 uppercase">Nama Lengkap *</label>
                        <input type="text" name="nama" required placeholder="Masukkan nama Anda..." 
                               class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-sky-500 transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-mono font-bold tracking-wider text-zinc-300 uppercase">Alamat Email *</label>
                        <input type="email" name="email" required placeholder="nama@email.com" 
                               class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-sky-500 transition">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-mono font-bold tracking-wider text-zinc-300 uppercase">Subjek Keperluan</label>
                    <input type="text" name="subjek" placeholder="Contoh: Pembuatan Website E-Commerce / Sistem Akademik" 
                           class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-sky-500 transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-mono font-bold tracking-wider text-zinc-300 uppercase">Isi Pesan / Detail Proyek *</label>
                    <textarea name="pesan" rows="5" required placeholder="Ceritakan detail proyek atau kebutuhan sistem yang ingin Anda bangun..." 
                              class="w-full bg-black/50 border border-white/10 rounded-xl p-4 text-sm text-white placeholder-zinc-600 focus:outline-none focus:border-sky-500 transition resize-none"></textarea>
                </div>

                <button type="submit" name="kirim_pesan"
                        class="w-full bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-600 hover:to-indigo-700 text-white font-bold text-xs uppercase tracking-widest py-4 rounded-xl shadow-lg shadow-sky-500/25 transition-all duration-300 cursor-pointer">
                    Kirim Pesan Sekarang &rarr;
                </button>
            </form>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="border-t border-white/5 py-8 text-center text-[10px] font-mono text-zinc-600 tracking-wider">
        &copy; 2026 ADY.STUDIO. All Rights Reserved. Designed & Engineered by Ady Wibowo.
    </footer>

</body>
</html>