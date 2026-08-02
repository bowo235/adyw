<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me & Studio - ADY.STUDIO</title>
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
                <a href="about.php" class="text-sky-400 font-bold transition duration-300">About</a>
                <a href="services.php" class="hover:text-white transition duration-300">Services</a>
                <a href="index.php#portofolio" class="hover:text-white transition duration-300">Portofolio</a>
                <a href="contact.php" class="hover:text-white transition duration-300">Contact</a>
            </nav>
            
            <a href="https://wa.me/6281234567890?text=Halo%20Ady.Studio,%20saya%20tertarik%20ingin%20berkolaborasi%20mengenai%20pengembangan%20website." 
               target="_blank" 
               class="bg-sky-500 hover:bg-sky-600 text-white font-semibold text-xs px-5 py-2.5 rounded-xl uppercase tracking-wider shadow-lg shadow-sky-500/20 transition-all duration-300 text-center">
                Let's Talk
            </a>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-5xl mx-auto px-6 py-16 relative z-10 space-y-24">
        
        <!-- SEKSI 1: HERO CINEMATIC (TATA LETAK TENGAH / CENTERED & STYLISH) -->
        <section class="relative rounded-3xl overflow-hidden border border-white/10 px-8 py-24 md:py-36 shadow-2xl text-center">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center z-0 filter brightness-40 scale-105" style="background-image: url('uploads/default.jpg');"></div>
            
            <!-- Lapisan Gradasi Gelap Menyeluruh agar Teks Sangat Kontras di Tengah -->
            <div class="absolute inset-0 bg-black/75 z-0"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#020205] via-transparent to-black/40 z-0"></div>

            <!-- Konten Tengah (Centered & Styled) -->
            <div class="relative z-10 max-w-3xl mx-auto space-y-8 flex flex-col items-center">
                
                <!-- Badge Profesional -->
                <div class="inline-flex items-center gap-2 bg-sky-500/10 text-sky-400 border border-sky-500/30 text-[11px] uppercase tracking-widest font-extrabold px-4.5 py-2 rounded-full font-mono backdrop-blur-md shadow-lg shadow-sky-500/10">
                    <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                    Professional Profile &bull; Who I Am
                </div>
                
                <!-- Judul Utama dengan Efek Gradasi Warna -->
                <h1 class="text-3xl sm:text-4xl md:text-6xl font-black tracking-tight text-white leading-[1.15] drop-shadow-lg">
                    Mengubah Baris Kode Menjadi <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-300 to-purple-400">Solusi Digital Bernilai Tinggi.</span>
                </h1>
                
                <!-- Paragraf Deskripsi yang Elegan -->
                <p class="text-zinc-300 text-sm md:text-base leading-relaxed font-light max-w-2xl drop-shadow">
                    Selamat datang di <strong class="text-white font-semibold">ADY.STUDIO</strong>. Saya adalah seorang Software Engineer independen yang mendedikasikan keahlian dalam merancang, membangun, dan mengoptimalkan ekosistem aplikasi web berkinerja tinggi. Berbekal penguasaan mendalam pada arsitektur Full-Stack PHP dan basis data relasional, setiap sistem dikembangkan secara presisi untuk menjamin keamanan, kecepatan, dan kenyamanan pengguna secara optimal.
                </p>
                
                <!-- Author Tag di Tengah -->
                <div class="pt-2">
                    <div class="text-xs font-mono text-sky-300 bg-black/60 px-6 py-3 rounded-2xl border border-white/10 inline-flex items-center gap-3 backdrop-blur-md shadow-2xl">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-400 animate-ping"></span>
                        <span class="tracking-widest uppercase font-bold text-white">Lead Developer &bull; Ady Wibowo</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- SEKSI 2: STATISTIK & METRIK PENCAPAIAN -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-zinc-900/40 border border-white/5 p-6 rounded-2xl text-center space-y-1 hover:border-sky-500/30 transition">
                <div class="text-3xl md:text-4xl font-black text-white font-mono">7+</div>
                <div class="text-xs text-sky-400 font-bold uppercase tracking-wider">Unit Proyek Aktif</div>
                <p class="text-[11px] text-zinc-500">Telah dideploy ke produksi</p>
            </div>
            <div class="bg-zinc-900/40 border border-white/5 p-6 rounded-2xl text-center space-y-1 hover:border-indigo-500/30 transition">
                <div class="text-3xl md:text-4xl font-black text-white font-mono">100%</div>
                <div class="text-xs text-indigo-400 font-bold uppercase tracking-wider">Native PHP</div>
                <p class="text-[11px] text-zinc-500">Struktur kode bersih & aman</p>
            </div>
            <div class="bg-zinc-900/40 border border-white/5 p-6 rounded-2xl text-center space-y-1 hover:border-purple-500/30 transition">
                <div class="text-3xl md:text-4xl font-black text-white font-mono">24/7</div>
                <div class="text-xs text-purple-400 font-bold uppercase tracking-wider">Sistem Stabil</div>
                <p class="text-[11px] text-zinc-500">Optimasi performa maksimal</p>
            </div>
            <div class="bg-zinc-900/40 border border-white/5 p-6 rounded-2xl text-center space-y-1 hover:border-emerald-500/30 transition">
                <div class="text-3xl md:text-4xl font-black text-white font-mono">Top</div>
                <div class="text-xs text-emerald-400 font-bold uppercase tracking-wider">UI/UX Design</div>
                <p class="text-[11px] text-zinc-500">Berorientasi pengguna</p>
            </div>
        </section>

        <!-- SEKSI 3: KEAHLIAN INTI & CORE STACK -->
        <section class="border-t border-white/5 pt-16">
            <div class="mb-12 text-center md:text-left space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-sky-400 font-mono">Technical Arsenal & Capabilities</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Keahlian Inti & Standar Mutu Teknologi</h2>
                <p class="text-zinc-400 text-xs md:text-sm max-w-2xl font-light">
                    Kombinasi antara logika pemrograman tingkat lanjut dan estetika desain antarmuka guna menciptakan pengalaman digital yang luar biasa bagi klien.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-sky-500/30 transition duration-300">
                    <div class="w-10 h-10 rounded-xl bg-sky-500/10 border border-sky-500/20 flex items-center justify-center text-sky-400 text-sm font-bold font-mono">PHP</div>
                    <h4 class="text-sm font-bold text-white">Backend Engineering</h4>
                    <p class="text-zinc-400 text-xs leading-relaxed">Pengembangan arsitektur logika aplikasi secara mandiri (Native), pengamanan sistem autentikasi, serta pengelolaan manajemen sesi tingkat lanjut.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-indigo-500/30 transition duration-300">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 text-sm font-bold font-mono">SQL</div>
                    <h4 class="text-sm font-bold text-white">Database MySQL</h4>
                    <p class="text-zinc-400 text-xs leading-relaxed">Perancangan skema basis data relasional yang efisien, pencegahan redundansi data, serta optimalisasi query untuk eksekusi data super cepat.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-purple-500/30 transition duration-300">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 text-sm font-bold font-mono">TW</div>
                    <h4 class="text-sm font-bold text-white">Tailwind CSS</h4>
                    <p class="text-zinc-400 text-xs leading-relaxed">Implementasi kerangka kerja utilitas modern untuk membangun antarmuka web yang sangat responsif, dinamis, dan memiliki performa pemuatan kilat.</p>
                </div>
                <!-- Card 4 -->
                <div class="bg-zinc-900/30 border border-white/5 p-6 rounded-2xl space-y-4 hover:border-emerald-500/30 transition duration-300">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-sm font-bold font-mono">UI</div>
                    <h4 class="text-sm font-bold text-white">UI/UX Architecture</h4>
                    <p class="text-zinc-400 text-xs leading-relaxed">Penyusunan tata letak visual berbasis riset kenyamanan pengguna (*user-centric*) guna menciptakan alur navigasi aplikasi yang intuitif.</p>
                </div>
            </div>
        </section>

        <!-- SEKSI 4: PRINSIP & NILAI KERJA (CORE VALUES) -->
        <section class="border-t border-white/5 pt-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-3 bg-zinc-900/20 border border-white/5 p-6 rounded-2xl">
                    <div class="text-sky-400 font-mono text-xs font-bold uppercase tracking-widest">01 / Quality</div>
                    <h3 class="text-base font-bold text-white">Kualitas Tanpa Kompromi</h3>
                    <p class="text-zinc-400 text-xs leading-relaxed">Setiap baris kode ditulis dengan standar pemeliharaan tinggi agar sistem mudah dikembangkan di masa depan.</p>
                </div>
                <div class="space-y-3 bg-zinc-900/20 border border-white/5 p-6 rounded-2xl">
                    <div class="text-indigo-400 font-mono text-xs font-bold uppercase tracking-widest">02 / Security</div>
                    <h3 class="text-base font-bold text-white">Keamanan Data Utama</h3>
                    <p class="text-zinc-400 text-xs leading-relaxed">Penerapan proteksi berlapis pada input data dan pengelolaan sesi database guna mencegah celah kerentanan.</p>
                </div>
                <div class="space-y-3 bg-zinc-900/20 border border-white/5 p-6 rounded-2xl">
                    <div class="text-purple-400 font-mono text-xs font-bold uppercase tracking-widest">03 / Performance</div>
                    <h3 class="text-base font-bold text-white">Kecepatan Eksekusi</h3>
                    <p class="text-zinc-400 text-xs leading-relaxed">Optimasi aset dan query database yang efisien memastikan aplikasi memuat halaman dengan sangat cepat.</p>
                </div>
            </div>
        </section>

        <!-- SEKSI 5: TIMELINE & PERJALANAN PROFESIONAL -->
        <section class="border-t border-white/5 pt-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4 space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-indigo-400 font-mono">Career & Milestone</span>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Riwayat & Komitmen Kerja</h2>
                    <p class="text-zinc-400 text-xs md:text-sm leading-relaxed font-light">
                        Jejak langkah konsistensi dalam mengeksplorasi teknologi web modern guna menghasilkan produk digital yang kredibel dan fungsional.
                    </p>
                </div>
                
                <div class="lg:col-span-8 space-y-8 pl-4 border-l border-white/10 ml-2 sm:ml-0">
                    <!-- Item 1 -->
                    <div class="relative pl-6 before:absolute before:left-[-31px] before:top-1.5 before:w-3 before:h-3 before:rounded-full before:bg-sky-500 before:border-4 before:border-[#020205]">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-sky-400 uppercase bg-sky-500/10 px-2.5 py-1 rounded border border-sky-500/20">2026 - Sekarang</span>
                        <h4 class="text-base font-bold text-white mt-2">Founder & Full-Stack Developer ADY.STUDIO</h4>
                        <p class="text-zinc-300 text-xs mt-1 leading-relaxed">Memimpin perancangan sistem informasi akademik, aplikasi kasir pintar (POS), dashboard analitik bisnis, dan arsitektur database skala profesional untuk berbagai kebutuhan klien.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="relative pl-6 before:absolute before:left-[-31px] before:top-1.5 before:w-3 before:h-3 before:rounded-full before:bg-indigo-500 before:border-4 before:border-[#020205]">
                        <span class="text-[10px] font-mono font-bold tracking-wider text-indigo-400 uppercase bg-indigo-500/10 px-2.5 py-1 rounded border border-indigo-500/20">2026</span>
                        <h4 class="text-base font-bold text-white mt-2">Eksplorasi Framework & Optimasi Performa Web</h4>
                        <p class="text-zinc-300 text-xs mt-1 leading-relaxed">Fokus mendalam pada penguasaan utilitas Tailwind CSS, teknik optimasi struktur direktori file, serta pengamanan celah kerentanan dasar web (*SQL Injection defense*).</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="border-t border-white/5 py-8 text-center text-[10px] font-mono text-zinc-600 tracking-wider">
        &copy; 2026 ADY.STUDIO. All Rights Reserved. Designed & Engineered by Ady Wibowo.
    </footer>

</body>
</html>