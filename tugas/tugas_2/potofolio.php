<?php 
include 'header.php'; 

$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");
$query = "SELECT * FROM proyek ORDER BY id DESC";
$ambil_data = mysqli_query($koneksi, $query);
?>

<div class="mb-16 space-y-3">
    <p class="text-xs font-bold uppercase tracking-widest text-sky-400">Selected Work</p>
    <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white">Karya & Proyek Terpilih</h2>
    <p class="text-zinc-400 max-w-xl font-light text-sm">Pilih salah satu proyek untuk melihat detail arsitektur dan dokumentasi fiturnya secara mendalam.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <?php if (mysqli_num_rows($ambil_data) > 0) : ?>
        <?php while ($row = mysqli_fetch_assoc($ambil_data)) : ?>
            <div class="wix-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                <div>
                    <!-- Visual Mockup -->
                    <div class="h-64 w-full bg-zinc-900 relative overflow-hidden">
                        <img src="https://picsum.photos/seed/<?php echo $row['id']; ?>/600/400" alt="Work Thumbnail" class="object-cover w-full h-full opacity-50 transition duration-700 group-hover:scale-110 group-hover:opacity-80">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1e] via-transparent to-transparent"></div>
                        
                        <!-- Tombol Hover Melayang ala Wix -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500 bg-black/40 backdrop-blur-sm">
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="glow-button bg-sky-500 text-black text-xs font-bold uppercase tracking-widest px-6 py-3 rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                                Lihat Detail Proyek
                            </a>
                        </div>
                    </div>
                    
                    <!-- Detail Teks -->
                    <div class="p-8 space-y-4 relative z-10 bg-[#0f0f1e]">
                        <span class="text-xs font-mono px-3 py-1 rounded-full bg-sky-500/10 text-sky-400 border border-sky-500/20">
                            <?php echo htmlspecialchars($row['tag']); ?>
                        </span>
                        <h3 class="text-2xl font-bold text-white tracking-tight"><?php echo htmlspecialchars($row['judul']); ?></h3>
                        <p class="text-sm text-zinc-400 leading-relaxed font-light line-clamp-2"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="col-span-full text-center py-20 bg-[#0f0f1e] rounded-2xl border border-dashed border-zinc-800">
            <p class="text-zinc-500 italic text-sm">Belum ada proyek di database Anda.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>