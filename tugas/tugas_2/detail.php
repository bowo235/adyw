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
        /* Kustomisasi Scrollbar Modal agar rapi */
        .custom-scroll::-webkit-scrollbar { width: 8px; }
        .custom-scroll::-webkit-scrollbar-track { background: #0b0b14; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.15); border-radius: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.3); }
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
                <a href="index.php" class="text-sky-400 font-bold">Portofolio</a>
            </nav>
            <a href="contact.php" class="bg-white/5 hover:bg-white/10 text-white border border-white/10 px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition duration-300">
                Hubungi Saya
            </a>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-5xl mx-auto px-6 py-12 relative z-10">

        <!-- VARIABEL GAMBAR & KETERANGAN (MENGGUNAKAN JSON_ENCODE AGAR AMAN DARI ENTER & KUTIP) -->
        <?php 
            $g1 = (!empty($row['gambar'])) ? $row['gambar'] : 'default.jpg';
            $g2 = (!empty($row['gambar_2'])) ? $row['gambar_2'] : 'default.jpg';
            $g3 = (!empty($row['gambar_3'])) ? $row['gambar_3'] : 'default.jpg';
            
            $k1 = json_encode(isset($row['ket_1']) && $row['ket_1'] !== '' ? $row['ket_1'] : 'Tidak ada penjelasan.');
            $k2 = json_encode(isset($row['ket_2']) && $row['ket_2'] !== '' ? $row['ket_2'] : 'Tidak ada penjelasan.');
            $k3 = json_encode(isset($row['ket_3']) && $row['ket_3'] !== '' ? $row['ket_3'] : 'Tidak ada penjelasan.');
        ?>

        <!-- GRID ATAS: JUDUL & GALERI 3 GAMBAR -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-16">
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
                <button onclick='bukaSemua("uploads/<?php echo $g1; ?>", <?php echo $k1; ?>, "uploads/<?php echo $g2; ?>", <?php echo $k2; ?>, "uploads/<?php echo $g3; ?>", <?php echo $k3; ?>)' class="mt-2 inline-flex items-center gap-2 bg-sky-500/10 hover:bg-sky-500/20 text-sky-400 border border-sky-500/20 px-5 py-3 rounded-xl text-xs font-bold transition shadow-lg">
                    <span>🔍 Lihat Semua Dokumentasi Lengkap</span>
                </button>
            </div>
            
            <!-- 3 GAMBAR (DIKLIK SALAH SATU, SEMUA AKAN TERBUKA DI MODAL) -->
            <div class="lg:col-span-7 space-y-4">
                
                <!-- Gambar 1 (Utama) -->
                <div class="glow-box relative w-full rounded-2xl overflow-hidden bg-zinc-950 border border-white/10 aspect-[16/10] cursor-pointer group" onclick='bukaSemua("uploads/<?php echo $g1; ?>", <?php echo $k1; ?>, "uploads/<?php echo $g2; ?>", <?php echo $k2; ?>, "uploads/<?php echo $g3; ?>", <?php echo $k3; ?>)'>
                    <span class="absolute top-3 left-3 z-20 px-2.5 py-1 rounded bg-sky-500 text-black text-[9px] font-black uppercase tracking-widest shadow">1. Dashboard Utama</span>
                    <img src="uploads/<?php echo $g1; ?>" alt="Preview 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>

                <!-- 2 Gambar Pendukung Berjajar di Bawah -->
                <div class="grid grid-cols-2 gap-4">
                    
                    <!-- Gambar 2 -->
                    <div class="relative rounded-xl overflow-hidden bg-zinc-950 border border-white/10 aspect-[16/10] cursor-pointer group" onclick='bukaSemua("uploads/<?php echo $g1; ?>", <?php echo $k1; ?>, "uploads/<?php echo $g2; ?>", <?php echo $k2; ?>, "uploads/<?php echo $g3; ?>", <?php echo $k3; ?>)'>
                        <span class="absolute top-2 left-2 z-20 px-2 py-0.5 rounded bg-indigo-500 text-white text-[8px] font-black uppercase tracking-widest shadow">2. Tampilan Gambar</span>
                        <img src="uploads/<?php echo $g2; ?>" alt="Preview 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>

                    <!-- Gambar 3 -->
                    <div class="relative rounded-xl overflow-hidden bg-zinc-950 border border-white/10 aspect-[16/10] cursor-pointer group" onclick='bukaSemua("uploads/<?php echo $g1; ?>", <?php echo $k1; ?>, "uploads/<?php echo $g2; ?>", <?php echo $k2; ?>, "uploads/<?php echo $g3; ?>", <?php echo $k3; ?>)'>
                        <span class="absolute top-2 left-2 z-20 px-2 py-0.5 rounded bg-emerald-500 text-black text-[8px] font-black uppercase tracking-widest shadow">3. Tampilan Gambar</span>
                        <img src="uploads/<?php echo $g3; ?>" alt="Preview 3" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>

                </div>
            </div>
        </div>

        <!-- GRID UTAMA: DESKRIPSI & SIDEBAR -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 border-t border-white/5 pt-12">
            
            <!-- SISI KIRI: PENJELASAN -->
            <div class="lg:col-span-7 space-y-10">
                <div class="space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-sky-400 font-mono flex items-center gap-2">
                        <span class="w-4 h-[1px] bg-sky-400"></span> About The Project
                    </h3>
                    <p class="text-zinc-300 text-sm md:text-base leading-relaxed whitespace-pre-line font-normal bg-zinc-900/20 p-6 rounded-xl border border-white/[0.03]">
                        <?php echo htmlspecialchars($row['deskripsi']); ?>
                    </p>
                </div>

                <!-- Workflow Execution -->
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

            <!-- SISI KANAN: METADATA & ACTIONS -->
            <div class="lg:col-span-5 space-y-6">
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
                            <span class="text-indigo-400">JSON Encode & Sanitized</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <a href="#" target="_blank" class="flex justify-center items-center bg-sky-600 hover:bg-sky-500 text-white text-[10px] font-bold py-3 rounded-lg transition duration-300 uppercase tracking-widest">
                            Live Demo
                        </a>
                        <a href="https://drive.google.com/..." target="_blank" class="flex justify-center items-center bg-white/5 hover:bg-white/10 text-white border border-white/10 text-[10px] font-bold py-3 rounded-lg transition duration-300 uppercase tracking-widest">
                            Source Code
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BAGIAN TAMBAHAN: PROJECT DOCUMENTATION ANALYSIS -->
        <div class="mt-12 p-8 bg-[#090915] border border-white/10 rounded-2xl">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <span class="text-sky-500">#</span> Project Documentation Analysis
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-white font-bold mb-2">Latar Belakang & Masalah</h4>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Proyek ini dikembangkan untuk mengotomatisasi manajemen data yang sebelumnya dilakukan secara manual. 
                        Sistem ini menyelesaikan kendala efisiensi performa dan integrasi data yang terfragmentasi pada lingkungan operasional saat ini.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-2">Fitur Utama Sistem</h4>
                    <ul class="text-zinc-400 text-sm space-y-2">
                        <li class="flex items-center gap-2"><span class="text-sky-500">●</span> Integrasi Database Terpusat & Relasional</li>
                        <li class="flex items-center gap-2"><span class="text-sky-500">●</span> Keamanan Data dengan Enkripsi & Sanitasi</li>
                        <li class="flex items-center gap-2"><span class="text-sky-500">●</span> Dashboard Real-time untuk monitoring data</li>
                    </ul>
                </div>
            </div>
        </div>
        
    </main>

    <!-- MODAL POPUP MULTI-GAMBAR YANG TERSTRUKTUR RAPI DAN UKURAN BESAR -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-xl flex items-center justify-center p-4 md:p-6 overflow-y-auto">
        <div class="relative max-w-4xl w-full bg-[#0b0b14] border border-white/10 rounded-3xl p-6 md:p-10 space-y-10 shadow-2xl my-8 custom-scroll max-h-[92vh] overflow-y-auto">
            
            <!-- HEADER MODAL -->
            <div class="flex justify-between items-center border-b border-white/10 pb-6 sticky top-0 bg-[#0b0b14]/95 backdrop-blur-md z-20 -mt-2 pt-2">
                <div>
                    <span class="text-[10px] font-bold text-sky-400 uppercase tracking-widest font-mono">Simultaneous Showcase</span>
                    <h3 class="text-xl md:text-2xl font-black text-white tracking-tight">Dokumentasi & Analisis Visual Proyek</h3>
                </div>
                <button onclick="tutupModal()" class="text-zinc-400 hover:text-white text-xl font-bold bg-white/5 hover:bg-white/10 border border-white/10 w-11 h-11 rounded-full flex items-center justify-center transition">&times;</button>
            </div>
            
            <!-- KARTU SUSUNAN VERTIKAL (GAMBAR BESAR & RAPI) -->
            <div class="space-y-12">
                
                <!-- GAMBAR 1 -->
                <div class="bg-zinc-950/70 border border-white/10 rounded-2xl p-6 space-y-4 shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-sky-500/10 text-sky-400 border border-sky-500/20 text-xs font-bold uppercase tracking-widest">
                            01 / Tampilan Gambar
                        </span>
                    </div>
                    <div class="overflow-hidden rounded-xl border border-white/10 bg-black flex justify-center">
                        <img id="modalImg1" src="" class="w-full max-h-[500px] object-contain hover:scale-[1.01] transition duration-500">
                    </div>
                    <div class="bg-black/40 p-4 rounded-xl border border-white/5 space-y-1">
                        <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest font-mono">Penjelasan Fitur:</span>
                        <p id="modalDesc1" class="text-sm text-zinc-300 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>

                <!-- GAMBAR 2 -->
                <div class="bg-zinc-950/70 border border-white/10 rounded-2xl p-6 space-y-4 shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-xs font-bold uppercase tracking-widest">
                            02 / Tampilan Gambar
                        </span>
                    </div>
                    <div class="overflow-hidden rounded-xl border border-white/10 bg-black flex justify-center">
                        <img id="modalImg2" src="" class="w-full max-h-[500px] object-contain hover:scale-[1.01] transition duration-500">
                    </div>
                    <div class="bg-black/40 p-4 rounded-xl border border-white/5 space-y-1">
                        <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest font-mono">Penjelasan Fitur:</span>
                        <p id="modalDesc2" class="text-sm text-zinc-300 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>

                <!-- GAMBAR 3 -->
                <div class="bg-zinc-950/70 border border-white/10 rounded-2xl p-6 space-y-4 shadow-xl">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold uppercase tracking-widest">
                            03 / Tampilan Gambar
                        </span>
                    </div>
                    <div class="overflow-hidden rounded-xl border border-white/10 bg-black flex justify-center">
                        <img id="modalImg3" src="" class="w-full max-h-[500px] object-contain hover:scale-[1.01] transition duration-500">
                    </div>
                    <div class="bg-black/40 p-4 rounded-xl border border-white/5 space-y-1">
                        <span class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest font-mono">Penjelasan Fitur:</span>
                        <p id="modalDesc3" class="text-sm text-zinc-300 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>

            </div>
            
            <!-- FOOTER MODAL -->
            <div class="border-t border-white/10 pt-6 text-center">
                <button onclick="tutupModal()" class="px-8 py-3 bg-white/10 hover:bg-white/20 text-white text-xs font-bold uppercase tracking-widest rounded-xl transition border border-white/10">
                    Tutup Dokumentasi
                </button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT MODAL -->
    <script>
        function bukaSemua(img1, desc1, img2, desc2, img3, desc3) {
            // Masukkan gambar 1 dan keterangannya
            document.getElementById('modalImg1').src = img1;
            document.getElementById('modalDesc1').innerText = desc1 ? desc1 : 'Tidak ada penjelasan khusus.';
            
            // Masukkan gambar 2 dan keterangannya
            document.getElementById('modalImg2').src = img2;
            document.getElementById('modalDesc2').innerText = desc2 ? desc2 : 'Tidak ada penjelasan khusus.';
            
            // Masukkan gambar 3 dan keterangannya
            document.getElementById('modalImg3').src = img3;
            document.getElementById('modalDesc3').innerText = desc3 ? desc3 : 'Tidak ada penjelasan khusus.';
            
            // Tampilkan modal dan kunci scroll body utama
            document.getElementById('imageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function tutupModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Menutup modal jika mengklik area luar kotak popup
        window.onclick = function(event) {
            let modal = document.getElementById('imageModal');
            if (event.target == modal) {
                tutupModal();
            }
        }
    </script>
</body>
</html>