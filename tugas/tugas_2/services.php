<?php
// 1. KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// 2. AMBIL DATA LAYANAN
$query = "SELECT * FROM layanan ORDER BY nomor ASC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services & Solutions - ADY.STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glow-card:hover { box-shadow: 0 0 30px -5px rgba(14, 165, 233, 0.15); border-color: rgba(14, 165, 233, 0.3); }
    </style>
</head>
<body class="bg-[#020205] text-zinc-100 antialiased selection:bg-sky-500/30 selection:text-sky-300">

    <!-- CAHAYA LATAR DEKORATIF -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[500px] bg-gradient-to-b from-indigo-500/5 via-transparent to-transparent blur-3xl pointer-events-none"></div>

    <!-- NAVBAR PREMIUM -->
    <header class="border-b border-white/5 bg-[#020205]/60 backdrop-blur-xl sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="index.php" class="text-sm font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500">ADY.STUDIO</a>
            <nav class="hidden md:flex space-x-8 text-xs font-semibold uppercase tracking-wider text-zinc-400">
                <a href="index.php" class="hover:text-white transition duration-300">Home</a>
                <a href="about.php" class="hover:text-white transition duration-300">About</a>
                <a href="services.php" class="text-sky-400 font-bold">Services</a>
                <a href="index.php" class="hover:text-white transition duration-300">Portfolio</a>
            </nav>
            <button class="bg-white/5 hover:bg-white/10 text-white border border-white/10 px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition duration-300">
                Let's Talk
            </button>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-5xl mx-auto px-6 py-16 relative z-10">

        <!-- HERO SERVICES -->
        <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
            <span class="bg-sky-500/10 text-sky-400 border border-sky-500/20 text-[10px] uppercase tracking-widest font-extrabold px-3 py-1 rounded-md font-mono">
                Expertise & Capabilities
            </span>
            <h1 class="text-3xl md:text-5xl font-black tracking-tight text-white leading-tight">
                Layanan Digital <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">Skala Profesional</span>
            </h1>
            <p class="text-zinc-400 text-sm md:text-base font-light leading-relaxed">
                Menyediakan ekosistem solusi komplit dari perancangan antarmuka hingga sistem backend tangguh untuk mengakselerasi digitalisasi bisnis Anda.
            </p>
        </div>

        <!-- CORE SERVICES GRID (SEKARANG SUDAH DINAMIS DARI DATABASE) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-28">
            
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <!-- Card Layanan Otomatis Mengulang Sesuai Jumlah Data di Database -->
                <div class="glow-card bg-zinc-900/30 border border-white/5 p-8 rounded-2xl space-y-4 transition duration-300">
                    <div class="w-10 h-10 rounded-xl bg-sky-500/10 border border-sky-500/20 flex items-center justify-center text-sky-400 font-bold text-sm">
                        <?php echo htmlspecialchars($row['nomor']); ?>
                    </div>
                    <h3 class="text-lg font-bold text-white tracking-wide">
                        <?php echo htmlspecialchars($row['judul']); ?>
                    </h3>
                    <p class="text-zinc-400 text-xs md:text-sm leading-relaxed font-light">
                        <?php echo htmlspecialchars($row['deskripsi']); ?>
                    </p>
                </div>
            <?php endwhile; ?>

        </div>

        <!-- WORKFLOW PROCESS -->
        <div class="border-t border-white/5 pt-20 mb-28">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-4">
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-indigo-400 font-mono mb-2">Execution Map</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Bagaimana Saya Bekerja</h2>
                </div>
                <p class="text-zinc-500 text-xs max-w-sm font-light">Alur kerja sistematis dan transparan yang diterapkan pada setiap proyek guna memastikan hasil akhir sesuai standar.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 font-mono text-xs">
                <div class="p-6 rounded-xl bg-zinc-900/10 border border-white/[0.03] space-y-2">
                    <div class="text-sky-400 font-bold">STEP 01 / BRIEF</div>
                    <h4 class="text-white font-sans font-bold text-sm">Konsultasi</h4>
                    <p class="text-zinc-500 font-sans text-xs">Menganalisis kebutuhan fitur, target aplikasi, serta tenggat waktu proyek.</p>
                </div>
                <div class="p-6 rounded-xl bg-zinc-900/10 border border-white/[0.03] space-y-2">
                    <div class="text-indigo-400 font-bold">STEP 02 / PROTOTYPE</div>
                    <h4 class="text-white font-sans font-bold text-sm">Desain UI</h4>
                    <p class="text-zinc-500 font-sans text-xs">Menyusun kerangka visual halaman dan skema tata letak komponen.</p>
                </div>
                <div class="p-6 rounded-xl bg-zinc-900/10 border border-white/[0.03] space-y-2">
                    <div class="text-purple-400 font-bold">STEP 03 / CODE</div>
                    <h4 class="text-white font-sans font-bold text-sm">Koding & DB</h4>
                    <p class="text-zinc-500 font-sans text-xs">Implementasi skrip backend PHP, integrasi form, dan pembuatan database.</p>
                </div>
                <div class="p-6 rounded-xl bg-zinc-900/10 border border-white/[0.03] space-y-2">
                    <div class="text-emerald-400 font-bold">STEP 04 / SHIP</div>
                    <h4 class="text-white font-sans font-bold text-sm">Testing & Rilis</h4>
                    <p class="text-zinc-500 font-sans text-xs">Uji coba fungsional sistem secara menyeluruh sebelum serah terima.</p>
                </div>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="border-b border-white/5 py-8 text-center text-[10px] font-mono text-zinc-600 tracking-wider">
        &copy; 2026 ADY.STUDIO. All Rights Reserved.
    </footer>

</body>
</html>