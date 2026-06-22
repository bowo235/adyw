<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - ADY.STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glow-radial { bg-gradient-to-r from-sky-500/10 to-transparent; }
    </style>
</head>
<body class="bg-[#020205] text-zinc-100 antialiased selection:bg-sky-500/30 selection:text-sky-300">

    <!-- Efek Cahaya Latar Belakang -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-indigo-500/5 blur-[150px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 left-1/4 w-[400px] h-[400px] bg-sky-500/5 blur-[130px] pointer-events-none"></div>

    <!-- NAVBAR HERO -->
    <header class="border-b border-white/5 bg-[#020205]/60 backdrop-blur-xl sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="index.php" class="text-sm font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-zinc-500">ADY.STUDIO</a>
            <nav class="hidden md:flex space-x-8 text-xs font-semibold uppercase tracking-wider text-zinc-400">
                <a href="index.php" class="hover:text-white transition duration-300">Home</a>
                <a href="about.php" class="text-sky-400 font-bold">About</a>
                <a href="#" class="hover:text-white transition duration-300">Services</a>
                <a href="index.php" class="hover:text-white transition duration-300">Portfolio</a>
            </nav>
            <button class="bg-white/5 hover:bg-white/10 text-white border border-white/10 px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition duration-300">
                Let's Talk
            </button>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-5xl mx-auto px-6 py-16 relative z-10">
        
        <!-- SEKSI 1: INTRODUKSI UTAMA (HERO) -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 items-center mb-24">
            <!-- Foto Profil / Placeholder Visual -->
            <div class="md:col-span-5 relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-sky-500 to-indigo-500 rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition duration-500"></div>
                <div class="relative rounded-3xl overflow-hidden bg-zinc-900 border border-white/10 aspect-[4/5] flex items-center justify-center">
                    <!-- Mas Ady bisa ganti src ke foto asli nanti, saat ini pakai gambar default -->
                    <img src="uploads/default.jpg" alt="Ady Wibowo" class="w-full h-full object-cover opacity-80 filter grayscale hover:grayscale-0 transition duration-500">
                    <div class="absolute bottom-4 left-4 right-4 bg-black/60 backdrop-blur-md p-4 rounded-xl border border-white/5">
                        <p class="text-xs font-mono text-sky-400">Software Engineer</p>
                        <h4 class="text-sm font-bold text-white">Ady Wibowo</h4>
                    </div>
                </div>
            </div>

            <!-- Teks Singkat Filosofi -->
            <div class="md:col-span-7 space-y-6">
                <span class="bg-sky-500/10 text-sky-400 border border-sky-500/20 text-[10px] uppercase tracking-widest font-extrabold px-3 py-1 rounded-md font-mono">
                    Who I Am
                </span>
                <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white leading-tight">
                    Mengubah Baris Kode Menjadi Solusi Digital.
                </h2>
                <p class="text-zinc-400 text-sm md:text-base leading-relaxed font-light">
                    Saya adalah seorang developer dan desainer perangkat lunak yang berfokus pada pembangunan aplikasi web berkinerja tinggi, bersih, dan berorientasi pada kenyamanan pengguna. Berbekal keahlian di bidang pengembangan Full-Stack PHP dan arsitektur database modern.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-4 font-mono">
                    <div class="border-l-2 border-sky-500 pl-4">
                        <div class="text-2xl font-black text-white">100%</div>
                        <div class="text-[10px] text-zinc-500 uppercase tracking-wider">Native PHP & Clean Code</div>
                    </div>
                    <div class="border-l-2 border-indigo-500 pl-4">
                        <div class="text-2xl font-black text-white">Tailwind</div>
                        <div class="text-[10px] text-zinc-500 uppercase tracking-wider">Modern UI Framework</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKSI 2: KEAHLIAN & TEKNOLOGI (BANYAK VARIASI) -->
        <div class="border-t border-white/5 pt-16 mb-24">
            <div class="mb-10 text-center md:text-left">
                <h3 class="text-xs font-bold uppercase tracking-widest text-sky-400 font-mono mb-2">Technical Arsenal</h3>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Keahlian & Core Stack</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Backend -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-white/10 transition">
                    <div class="w-8 h-8 rounded-lg bg-sky-500/10 border border-sky-500/20 flex items-center justify-center text-sky-400 text-sm font-bold font-mono">PHP</div>
                    <h4 class="text-sm font-bold text-white">Backend Engineering</h4>
                    <p class="text-zinc-500 text-xs leading-relaxed">Pembuatan logika sistem CRUD, pengamanan session login, dan penataan query database terintegrasi.</p>
                </div>
                <!-- Card 2: Database -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-white/10 transition">
                    <div class="w-8 h-8 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 text-sm font-bold font-mono">SQL</div>
                    <h4 class="text-sm font-bold text-white">Database MySQL</h4>
                    <p class="text-zinc-500 text-xs leading-relaxed">Perancangan skema tabel relasional, optimalisasi indexing data, serta manajemen foreign key.</p>
                </div>
                <!-- Card 3: Frontend -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-white/10 transition">
                    <div class="w-8 h-8 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 text-sm font-bold font-mono">TW</div>
                    <h4 class="text-sm font-bold text-white">Tailwind CSS</h4>
                    <p class="text-zinc-500 text-xs leading-relaxed">Penyusunan komponen antarmuka responsif tingkat tinggi tanpa membebani ukuran file CSS eksternal.</p>
                </div>
                <!-- Card 4: Architecture -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-white/10 transition">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-sm font-bold font-mono">UI</div>
                    <h4 class="text-sm font-bold text-white">UI/UX Layout</h4>
                    <p class="text-zinc-500 text-xs leading-relaxed">Konseptualisasi struktur navigasi berorientasi kepuasan pengguna akhir (*user-centric design*).</p>
                </div>
            </div>
        </div>

        <!-- SEKSI 3: TIMELINE PERJALANAN / WORKFLOW -->
        <div class="border-t border-white/5 pt-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4 space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-indigo-400 font-mono">Development Path</h3>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Riwayat & Alur Kerja</h2>
                    <p class="text-zinc-500 text-xs leading-relaxed font-light">
                        Proses konsisten dalam mempelajari dan mengimplementasikan teknologi guna menghasilkan luaran platform yang kokoh dan siap uji.
                    </p>
                </div>
                
                <div class="lg:col-span-8 space-y-8 pl-2 border-l border-white/10 ml-2 sm:ml-0">
                    <!-- Item 1 -->
                    <div class="relative pl-6 before:absolute before:left-[-29px] before:top-1.5 before:w-3 before:h-3 before:rounded-full before:bg-sky-500 before:border-4 before:border-[#020205]">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-zinc-500 uppercase">2025 - Sekarang</span>
                        <h4 class="text-sm font-bold text-white mt-1">Full-Stack Web Developer (Independent)</h4>
                        <p class="text-zinc-400 text-xs mt-1 leading-relaxed">Aktif membangun sistem dashboard admin, manajemen database relasi kompleks, dan integrasi antar halaman dinamis PHP.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="relative pl-6 before:absolute before:left-[-29px] before:top-1.5 before:w-3 before:h-3 before:rounded-full before:bg-indigo-500 before:border-4 before:border-[#020205]">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-zinc-500 uppercase">2024</span>
                        <h4 class="text-sm font-bold text-white mt-1">Eksplorasi Framework & Interaktivitas UI</h4>
                        <p class="text-zinc-400 text-xs mt-1 leading-relaxed">Mendalami teknik kustomisasi utilitas Tailwind CSS, optimasi aset gambar dinamis, serta validasi sisi klien (*client-side validation*).</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- FOOTER SEDERHANA -->
    <footer class="border-t border-white/5 py-8 text-center text-[10px] font-mono text-zinc-600 tracking-wider">
        &copy; 2026 ADY.STUDIO. All Rights Reserved.
    </footer>

</body>
</html>