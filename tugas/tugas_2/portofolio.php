<?php 
// 1. PANGGIL HEADER BAWAAN
include 'header.php'; 

// 2. KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Menampilkan seluruh proyek dari database tanpa batas LIMIT
$query = "SELECT * FROM proyek ORDER BY id DESC";
$ambil_data = mysqli_query($koneksi, $query);
?>

<!-- KONTEN HALAMAN PORTOFOLIO PREMIUM -->
<div class="relative min-h-screen bg-[#020205] overflow-hidden">
    
    <!-- Efek Cahaya Latar Belakang (Ambient Cyber Light) -->
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-sky-500/5 blur-[150px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-1/3 right-1/4 w-[600px] h-[600px] bg-indigo-500/5 blur-[180px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-8 py-24 relative z-10">
        
        <!-- Header Judul Eksklusif -->
        <div class="relative mb-20 pb-8 border-b border-white/5 flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-sky-500/10 border border-sky-500/20 text-[10px] font-mono text-sky-400 uppercase tracking-widest">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span> Masterpiece Archive
                </div>
                <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white uppercase">
                    Karya & <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">Proyek</span>
                </h1>
                <p class="text-zinc-400 max-w-xl font-light text-sm md:text-base leading-relaxed">
                    Kumpulan sistem informasi eksklusif, arsitektur database, dan platform digital premium yang telah aktif dideploy oleh ADY.STUDIO.
                </p>
            </div>
            <div class="text-zinc-500 font-mono text-xs bg-white/5 border border-white/10 px-4 py-2 rounded-xl">
                Total Proyek: <span class="text-white font-bold"><?php echo mysqli_num_rows($ambil_data); ?> Unit</span>
            </div>
        </div>

        <!-- Grid Layout Kartu Portofolio Premium (Wix Card Style - Updated Button Layout) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <?php if ($ambil_data && mysqli_num_rows($ambil_data) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($ambil_data)) : ?>
                    
                    <!-- KARTU UTAMA -->
                    <div class="group bg-[#090915] border border-white/5 rounded-[32px] overflow-hidden transition-all duration-500 hover:border-sky-500/30 hover:shadow-2xl hover:shadow-sky-500/5 hover:-translate-y-1 flex flex-col justify-between">
                        
                        <!-- Bagian Gambar Proyek (Bersih & Elegan saat dihover) -->
                        <div class="h-80 w-full bg-zinc-900 relative overflow-hidden">
                            <!-- Status Live System -->
                            <span class="absolute top-5 left-5 z-20 px-3 py-1 rounded-md bg-emerald-500 text-black text-[9px] font-black uppercase tracking-widest flex items-center gap-1.5 shadow-lg shadow-emerald-500/10">
                                <span class="w-1.5 h-1.5 rounded-full bg-black animate-ping"></span> Live System
                            </span>
                            
                            <!-- Gambar Asli dari Database -->
                            <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-1000 ease-out" onerror="this.src='uploads/default.jpg'">
                            
                            <!-- Soft Gradient Layer overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-[#090915] via-transparent to-transparent opacity-80"></div>
                        </div>
                        
                        <!-- Bagian Teks Detail Konten + Tombol Baru di Bawah -->
                        <div class="p-8 space-y-5 bg-[#090915]">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-mono px-3 py-1 rounded-lg bg-sky-500/5 text-sky-400 border border-sky-500/10 font-bold uppercase tracking-wider">
                                    <?php echo htmlspecialchars($row['tag']); ?>
                                </span>
                                <span class="text-[10px] text-zinc-500 font-mono">Project ID: #00<?php echo $row['id']; ?></span>
                            </div>
                            
                            <div class="space-y-2">
                                <h3 class="text-2xl font-bold text-white tracking-tight group-hover:text-sky-400 transition duration-300">
                                    <?php echo htmlspecialchars($row['judul']); ?>
                                </h3>
                                <p class="text-sm text-zinc-400 leading-relaxed font-light line-clamp-2">
                                    <?php echo htmlspecialchars($row['deskripsi']); ?>
                                </p>
                            </div>
                            
                            <!-- BARIS BARU: TOMBOL UTAMA BERGAYA WIX SEKARANG SETELAH TEKS -->
                            <div class="pt-5 border-t border-white/5 flex justify-between items-center">
                                <span class="text-zinc-500 text-xs font-light italic">CMS Integrated</span>
                                
                                <!-- Tombol Biru Solid yang Mas Ady Inginkan -->
                                <a href="detail.php?id=<?php echo $row['id']; ?>" class="inline-flex items-center gap-2 px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-black font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-sky-500/10 hover:shadow-sky-500/20 transition-all duration-300">
                                    Lihat Detail Proyek <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Keadaan Jika Database Kosong -->
                <div class="col-span-2 text-center py-24 border border-dashed border-zinc-800 rounded-[32px] bg-[#090915]/50">
                    <i class="fa-solid fa-folder-open text-zinc-600 text-4xl mb-4"></i>
                    <p class="text-zinc-500 text-sm italic">Belum ada riwayat pesanan aplikasi di database.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- 3. PANGGIL FOOTER DINAMIS -->
<?php include 'footer.php'; ?>