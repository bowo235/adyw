<?php
// 1. KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// 2. AMBIL DATA PROYEK
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM proyek WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Jika proyek tidak ada, kembali ke index.php
if (!$row) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['judul']); ?> - Showcase Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glow-box { box-shadow: 0 0 40px -10px rgba(14, 165, 233, 0.12); }
    </style>
</head>
<body class="bg-[#020205] text-zinc-100 antialiased selection:bg-sky-500/30 selection:text-sky-300">

    <!-- DEKORASI BACKGROUND GLOW -->
    <div class="absolute top-0 left-1/4 w-[400px] h-[400px] bg-sky-500/5 blur-[120px] pointer-events-none"></div>
    <div class="absolute top-1/3 right-1/4 w-[300px] h-[300px] bg-indigo-500/5 blur-[100px] pointer-events-none"></div>

    <!-- NAVBAR HERO -->
    <header class="border-b border-white/5 bg-[#020205]/60 backdrop-blur-xl sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="index.php" class="text-sm font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500">ADY.STUDIO</a>
            <nav class="hidden md:flex space-x-8 text-xs font-semibold uppercase tracking-wider text-zinc-400">
                <a href="index.php" class="hover:text-white transition duration-300">Home</a>
                <a href="#" class="hover:text-white transition duration-300">About</a>
                <a href="#" class="hover:text-white transition duration-300">Services</a>
                <a href="index.php" class="text-sky-400 font-bold">Portfolio</a>
            </nav>
            <button class="bg-white/5 hover:bg-white/10 text-white border border-white/10 px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition duration-300">
                Hubungi Saya
            </button>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-5xl mx-auto px-6 py-12 relative z-10">
        
        <!-- Tombol Kembali -->
        <a href="index.php" class="inline-flex items-center text-[10px] font-bold tracking-widest uppercase text-zinc-500 hover:text-sky-400 mb-8 transition duration-300 group">
            <span class="mr-2 transform group-hover:-translate-x-1 transition duration-300">←</span> Back to Dashboard
        </a>

        <!-- GRID ATAS: JUDUL & GAMBAR BERSANDINGAN -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center mb-16">
            <div class="lg:col-span-5 space-y-4">
                <div class="flex items-center gap-2">
                    <span class="bg-sky-500/10 text-sky-400 border border-sky-500/10 text-[9px] uppercase tracking-widest font-extrabold px-2.5 py-1 rounded-md">
                        Case Study Realized
                    </span>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white capitalize leading-tight">
                    <?php echo htmlspecialchars($row['judul']); ?>
                </h1>
                <p class="text-zinc-400 text-sm font-light leading-relaxed">
                    Sistem aplikasi dinamis terintegrasi database yang dirancang untuk efisiensi performa dan kemudahan manajemen data.
                </p>
            </div>
            
            <div class="lg:col-span-7">
                <div class="glow-box relative w-full rounded-2xl overflow-hidden bg-zinc-950 border border-white/10 aspect-[16/10]">
                    <?php $gambar_proyek = (!empty($row['gambar'])) ? $row['gambar'] : 'default.jpg'; ?>
                    <img src="uploads/<?php echo $gambar_proyek; ?>" alt="Preview" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <!-- SEKSI SEKARANG: ABOUT THE PROJECT (VARIASI BARU AGAR TIDAK POLOS) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 border-t border-white/5 pt-12">
            
            <!-- SISI KIRI: PENJELASAN MENDALAM & TIMELINE -->
            <div class="lg:col-span-7 space-y-10">
                
                <!-- Blok Deskripsi Dinamis -->
                <div class="space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-sky-400 font-mono flex items-center gap-2">
                        <span class="w-4 h-[1px] bg-sky-400"></span> About The Project
                    </h3>
                    <p class="text-zinc-300 text-sm md:text-base leading-relaxed whitespace-pre-line font-normal bg-zinc-900/20 p-6 rounded-xl border border-white/[0.03]">
                        <?php echo htmlspecialchars($row['deskripsi']); ?>
                    </p>
                </div>

                <!-- Variasi Tambahan: Alur Pengembangan (Static Infographic) -->
                <div class="space-y-6">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-zinc-400 font-mono flex items-center gap-2">
                        <span class="w-4 h-[1px] bg-zinc-400"></span> Workflow Execution
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 rounded-xl bg-zinc-900/40 border border-white/5 space-y-2">
                            <div class="text-sky-400 font-mono text-xs font-bold">01 / Arsitektur</div>
                            <p class="text-zinc-500 text-[11px] leading-relaxed">Perancangan skema relasi database MySQL yang dinamis.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-zinc-900/40 border border-white/5 space-y-2">
                            <div class="text-indigo-400 font-mono text-xs font-bold">02 / Logika CRUD</div>
                            <p class="text-zinc-500 text-[11px] leading-relaxed">Penyusunan kode PHP native yang aman dengan enkripsi string.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-zinc-900/40 border border-white/5 space-y-2">
                            <div class="text-emerald-400 font-mono text-xs font-bold">03 / UI Integration</div>
                            <p class="text-zinc-500 text-[11px] leading-relaxed">Penyelarasan visual antarmuka menggunakan Tailwind CSS framework.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- SISI KANAN: METADATA & METRICS CARD -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Kartu Spek & Fitur Utama -->
                <div class="bg-gradient-to-b from-zinc-900/60 to-zinc-950/80 border border-white/10 p-6 rounded-2xl space-y-6">
                    
                    <div>
                        <h4 class="text-[10px] font-bold uppercase tracking-widest text-zinc-500 mb-2 font-mono">Engine Base / Stack</h4>
                        <span class="inline-block bg-sky-500/10 text-sky-400 text-xs font-bold px-3 py-1.5 rounded-lg border border-sky-500/20 shadow-sm">
                            <?php echo htmlspecialchars($row['tag']); ?>
                        </span>
                    </div>

                    <div class="border-t border-white/5 pt-4">
                        <h4 class="text-[10px] font-bold uppercase tracking-widest text-zinc-500 mb-2 font-mono">Core System Feature</h4>
                        <div class="flex items-start text-xs text-zinc-300 leading-relaxed bg-black/40 p-4 rounded-xl border border-white/5">
                            <span class="text-sky-400 mr-2 font-bold">✦</span>
                            <span><?php echo htmlspecialchars($row['fitur']); ?></span>
                        </div>
                    </div>

                    <!-- Variasi Tambahan: Spesifikasi Tambahan Otomatis -->
                    <div class="border-t border-white/5 pt-4 space-y-2 text-[11px] font-mono">
                        <div class="flex justify-between py-1 text-zinc-500">
                            <span>Database Engine</span>
                            <span class="text-zinc-300">MySQLi Client</span>
                        </div>
                        <div class="flex justify-between py-1 text-zinc-500">
                            <span>Render Speed</span>
                            <span class="text-emerald-400">~0.02s (Optimized)</span>
                        </div>
                        <div class="flex justify-between py-1 text-zinc-500">
                            <span>Security Level</span>
                            <span class="text-indigo-400">Real Escape String</span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="index.php" class="block w-full text-center bg-white text-black hover:bg-zinc-200 text-xs font-bold tracking-wider uppercase py-4 rounded-xl transition duration-300 shadow-xl shadow-white/5">
                            Project Deployment Overview
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </main>

</body>
</html>