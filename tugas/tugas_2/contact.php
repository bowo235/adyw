<?php 
include 'header.php'; 

// --- KONEKSI DATABASE ---
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$notifikasi = "";

// --- LOGIKA MENERIMA PESAN ---
if (isset($_POST['kirim_pesan'])) {
    // Mengamankan input dari karakter berbahaya (Syarat wajib keamanan web)
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    $query = "INSERT INTO pesan (nama_pengirim, email, isi_pesan) VALUES ('$nama', '$email', '$pesan')";
    
    if (mysqli_query($koneksi, $query)) {
        $notifikasi = "sukses";
    } else {
        $notifikasi = "gagal";
    }
}
?>

<div class="max-w-7xl mx-auto px-6 py-16 mb-16">
    <!-- Header Bagian Kontak -->
    <div class="text-center mb-16 space-y-4">
        <span class="inline-block px-4 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/20 text-xs font-mono text-sky-400 uppercase tracking-widest">
            Mari Berkolaborasi
        </span>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight text-white">Mulai Percakapan.</h1>
        <p class="text-zinc-400 max-w-2xl mx-auto font-light leading-relaxed">
            Punya ide proyek, tawaran pekerjaan, atau pertanyaan teknis? Isi formulir di bawah ini dan pesan Anda akan langsung masuk ke sistem dashboard kendali saya.
        </p>
    </div>

    <!-- Grid Layout: Kiri (Info), Kanan (Form) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-start">
        
        <!-- KOLOM KIRI: Informasi Kontak Tambahan -->
        <div class="space-y-10">
            <div class="space-y-6">
                <h3 class="text-2xl font-bold text-white">Hubungi Saya Langsung</h3>
                <p class="text-zinc-400 text-sm leading-loose">
                    Saya selalu terbuka untuk mendiskusikan peluang kolaborasi baru. Jangan ragu untuk menghubungi saya melalui saluran alternatif di bawah ini.
                </p>
            </div>

            <div class="space-y-6 text-sm">
                <!-- Item Info -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#141428] border border-white/5 flex items-center justify-center text-sky-400">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Email Resmi</span>
                        <a href="mailto:hello@adystudio.com" class="text-white font-semibold hover:text-sky-400 transition">hello@adystudio.com</a>
                    </div>
                </div>
                <!-- Item Info -->
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#141428] border border-white/5 flex items-center justify-center text-indigo-400">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-zinc-500 font-bold uppercase tracking-widest">Lokasi Studio</span>
                        <span class="text-white font-semibold">Jakarta, Indonesia</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN: Formulir Kontak -->
        <div class="bg-[#0f0f1e] p-8 md:p-10 rounded-3xl border border-white/5 relative overflow-hidden shadow-2xl">
            <!-- Efek Cahaya Latar Formulir -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-sky-500/10 blur-3xl rounded-full pointer-events-none"></div>

            <form action="" method="POST" class="space-y-6 relative z-10">
                
                <!-- Notifikasi Pengiriman (Muncul jika ada aksi) -->
                <?php if ($notifikasi == "sukses") : ?>
                    <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl font-semibold text-center text-sm flex items-center justify-center gap-2">
                        <i class="fa-solid fa-circle-check"></i> Pesan Anda berhasil dikirim ke server!
                    </div>
                <?php elseif ($notifikasi == "gagal") : ?>
                    <div class="p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl font-semibold text-center text-sm flex items-center justify-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation"></i> Terjadi kesalahan teknis. Pesan gagal dikirim.
                    </div>
                <?php endif; ?>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Nama Lengkap</label>
                    <input type="text" name="nama" required placeholder="Cth: Dosen Penguji" 
                        class="w-full bg-[#05050a] border border-[#1e1e38] p-4 rounded-xl text-sm text-white focus:border-sky-400 focus:ring-1 focus:ring-sky-400 transition outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Alamat Email</label>
                    <input type="email" name="email" required placeholder="Cth: dosen@kampus.ac.id" 
                        class="w-full bg-[#05050a] border border-[#1e1e38] p-4 rounded-xl text-sm text-white focus:border-sky-400 focus:ring-1 focus:ring-sky-400 transition outline-none">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Isi Pesan / Kebutuhan</label>
                    <textarea name="pesan" rows="5" required placeholder="Tuliskan detail pertanyaan atau penawaran Anda di sini..." 
                        class="w-full bg-[#05050a] border border-[#1e1e38] p-4 rounded-xl text-sm text-white focus:border-sky-400 focus:ring-1 focus:ring-sky-400 transition outline-none resize-none"></textarea>
                </div>

                <button type="submit" name="kirim_pesan" class="w-full py-4 bg-white text-black hover:bg-sky-400 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg hover:shadow-sky-500/20">
                    Kirim Transmisi Pesan ➔
                </button>
            </form>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>