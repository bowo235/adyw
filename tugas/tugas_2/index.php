<?php 
include 'header.php'; 

// --- KONEKSI DATABASE ---
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

// Menampilkan 6 proyek terbaru dengan formasi yang disukai (2 kolom) agar gambar tetap besar
$query_terbaru = "SELECT * FROM proyek ORDER BY id DESC LIMIT 6";
$ambil_terbaru = mysqli_query($koneksi, $query_terbaru);
?>

<div class="relative py-24 lg:py-32 flex flex-col items-center text-center space-y-8 overflow-hidden">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-sky-500/10 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="relative z-10 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#141428]/80 border border-white/10 text-xs font-mono text-sky-400 backdrop-blur-md">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
        Available for Freelance & Contract
    </div>

    <h1 class="relative z-10 text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter text-white max-w-5xl leading-[1.1]">
        Arsitektur Kode.<br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-400 to-purple-500">Solusi Bisnis Nyata.</span>
    </h1>

    <p class="relative z-10 text-base md:text-lg text-zinc-400 max-w-2xl font-light leading-relaxed">
        Halo, saya <strong class="text-white font-semibold">Ady Wibowo</strong>. Di bawah ini adalah 6 sistem informasi terintegrasi dan platform digital yang telah dipesan, dideploy, dan aktif digunakan oleh klien kami.
    </p>

    <div class="relative z-10 pt-4 flex flex-wrap justify-center gap-5">
        <a href="#showcase" class="px-8 py-4 bg-white text-black font-black uppercase tracking-widest rounded-xl text-xs transition-all hover:-translate-y-1 shadow-lg shadow-white/5">
            Lihat 6 Aplikasi Klien ➔
        </a>
    </div>
</div>

<div class="max-w-6xl mx-auto px-6 mb-24">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-8 bg-[#0f0f1e] rounded-3xl border border-white/5 text-center">
        <div>
            <h3 class="text-3xl md:text-4xl font-black text-white tracking-tight">100%</h3>
            <p class="text-[10px] text-zinc-500 uppercase tracking-widest font-bold mt-1">Client Satisfaction</p>
        </div>
        <div>
            <h3 class="text-3xl md:text-4xl font-black text-sky-400 tracking-tight">12+</h3>
            <p class="text-[10px] text-zinc-500 uppercase tracking-widest font-bold mt-1">Apps Deployed</p>
        </div>
        <div>
            <h3 class="text-3xl md:text-4xl font-black text-indigo-400 tracking-tight">6 Proyek</h3>
            <p class="text-[10px] text-zinc-500 uppercase tracking-widest font-bold mt-1">Featured Showcase</p>
        </div>
        <div>
            <h3 class="text-3xl md:text-4xl font-black text-emerald-400 tracking-tight">24/7</h3>
            <p class="text-[10px] text-zinc-500 uppercase tracking-widest font-bold mt-1">Server Uptime</p>
        </div>
    </div>
</div>

<div id="showcase" class="py-12 max-w-7xl mx-auto px-6 space-y-12 mb-24">
    <div class="text-center space-y-3 max-w-2xl mx-auto">
        <span class="text-xs font-bold text-sky-400 uppercase tracking-widest">Production Ready</span>
        <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white">Sistem & Aplikasi Pesanan</h2>
        <p class="text-zinc-400 text-sm font-light">Eksplorasi visual dari 6 modul perangkat lunak yang dirancang khusus untuk memenuhi kebutuhan digitalisasi mitra kami.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6">
        <?php if ($ambil_terbaru && mysqli_num_rows($ambil_terbaru) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($ambil_terbaru)) : ?>
                <div class="group bg-[#0f0f1e] border border-white/5 rounded-3xl overflow-hidden transition-all duration-500 hover:border-sky-500/30 hover:shadow-2xl hover:shadow-sky-500/5 flex flex-col justify-between">
                    
                    <div class="h-72 w-full bg-zinc-900 relative overflow-hidden border-b border-white/5">
                        <span class="absolute top-4 left-4 z-20 px-3 py-1 rounded-md bg-emerald-500 text-black text-[9px] font-black uppercase tracking-widest flex items-center gap-1.5 shadow-lg">
                            <span class="w-1.5 h-1.5 rounded-full bg-black animate-ping"></span> Live System
                        </span>
                        
                        <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>" class="object-cover w-full h-full opacity-40 transition duration-700 group-hover:scale-105 group-hover:opacity-75">
                           
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1e] via-transparent to-transparent"></div>
                    </div>
                    
                    <div class="p-8 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] font-mono px-2.5 py-1 rounded-md bg-sky-500/10 text-sky-400 border border-sky-500/20 font-bold uppercase">
                                <?php echo htmlspecialchars($row['tag']); ?>
                            </span>
                            <span class="text-[10px] text-zinc-500 font-mono">ID Proyek: #00<?php echo $row['id']; ?></span>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-white tracking-tight group-hover:text-sky-400 transition">
                            <?php echo htmlspecialchars($row['judul']); ?>
                        </h3>
                        
                        <p class="text-sm text-zinc-400 leading-relaxed font-light line-clamp-3">
                            <?php echo htmlspecialchars($row['deskripsi']); ?>
                        </p>
                        
                        <div class="pt-4 border-t border-white/5 flex justify-between items-center">
                            <span class="text-xs text-zinc-500 font-light italic">Dipesan melalui CMS</span>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="inline-flex items-center gap-2 text-xs font-bold text-white uppercase tracking-widest hover:text-sky-400 transition">
                                Analisis Fitur <i class="fa-solid fa-arrow-right text-sky-400 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-span-2 text-center py-20 border border-dashed border-zinc-800 rounded-3xl">
                <p class="text-zinc-500 text-sm italic">Belum ada riwayat pesanan aplikasi di database.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="max-w-5xl mx-auto px-6 pb-24">
    <div class="bg-gradient-to-br from-[#0f0f1e] to-[#141428] border border-white/10 p-12 rounded-3xl text-center space-y-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 blur-[80px] rounded-full pointer-events-none"></div>
        <h2 class="text-3xl font-black text-white">Ingin Membangun Aplikasi Serupa?</h2>
        <p class="text-zinc-400 text-sm max-w-xl mx-auto">Konsultasikan kebutuhan sistem informasi institusi atau bisnis Anda. Dapatkan integrasi database yang solid dan antarmuka premium.</p>
        <div class="pt-4">
            <a href="contact.php" class="inline-block px-8 py-4 bg-sky-500 text-black hover:bg-white text-xs font-black uppercase tracking-widest rounded-xl transition-all shadow-lg shadow-sky-500/20">
                Ajukan Kontrak Pemesanan
            </a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>