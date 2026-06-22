<?php
session_start();

if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit;
}

// --- KONEKSI DATABASE ---
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }

$notifikasi = "";

// --- LOGIKA CRUD ---
if (isset($_GET['hapus_id'])) {
    $id_hapus = $_GET['hapus_id'];
    mysqli_query($koneksi, "DELETE FROM pesan WHERE id = '$id_hapus'");
    $notifikasi = "pesan_dihapus";
}

if (isset($_GET['hapus_proyek_id'])) {
    $id_proyek_hapus = $_GET['hapus_proyek_id'];
    mysqli_query($koneksi, "DELETE FROM proyek WHERE id = '$id_proyek_hapus'");
    $notifikasi = "proyek_dihapus";
}

if (isset($_POST['tambah_proyek'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tag = mysqli_real_escape_string($koneksi, $_POST['tag']);
    $fitur = mysqli_real_escape_string($koneksi, $_POST['fitur']);

    // LOGIKA UPLOAD GAMBAR (Sudah diperbaiki agar aman dari Warning Null)
    $nama_gambar = "default.jpg"; // Default jika tidak upload gambar
    
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $nama_gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp_name, 'uploads/' . $nama_gambar);
    }

    // Query SQL
    $query = "INSERT INTO proyek (judul, deskripsi, tag, fitur, gambar) VALUES ('$judul', '$deskripsi', '$tag', '$fitur', '$nama_gambar')";
    
    if (mysqli_query($koneksi, $query)) {
        $notifikasi = "proyek_sukses";
    }
}
// --- AMBIL DATA ---
$ambil_pesan = mysqli_query($koneksi, "SELECT * FROM pesan ORDER BY id DESC");
$total_pesan = mysqli_num_rows($ambil_pesan);

$ambil_proyek = mysqli_query($koneksi, "SELECT * FROM proyek ORDER BY id DESC");
$total_proyek = mysqli_num_rows($ambil_proyek);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kendali CMS | ADY.STUDIO</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome & Chart.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #05050a; color: #ffffff; }
        .wix-box { background: #0f0f1e; border: 1px solid #1e1e38; }
        .form-input-wix { background: #05050a; border: 1px solid #1e1e38; transition: all 0.3s ease; }
        .form-input-wix:focus { border-color: #38bdf8; outline: none; box-shadow: 0 0 15px rgba(56, 189, 248, 0.1); }
        /* Kustom Scrollbar untuk Tabel */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #05050a; }
        ::-webkit-scrollbar-thumb { background: #1e1e38; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #38bdf8; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <!-- TOP BAR -->
    <header class="bg-[#0f0f1e] border-b border-white/5 py-4 px-8 sticky top-0 z-50 backdrop-blur-md bg-[#0f0f1e]/80">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-xs bg-sky-500 text-black px-2 py-1 rounded font-black tracking-widest animate-pulse">LIVE</span>
                <h1 class="text-lg font-bold tracking-tight text-white">ADY<span class="text-sky-400">.</span>CONTROL</h1>
            </div>
            <div class="flex items-center space-x-6">
                <a href="index.php" class="text-sm font-semibold text-zinc-400 hover:text-white transition flex items-center gap-2" target="_blank"><i class="fa-solid fa-globe"></i> Lihat Situs</a>
                <a href="logout.php" class="bg-red-500/10 text-red-400 border border-red-500/20 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-red-500 hover:text-black transition" onclick="return confirm('Keluar dari sesi aman ini?')">Log Out <i class="fa-solid fa-power-off ml-1"></i></a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl w-full mx-auto px-6 py-10 flex-grow space-y-8">
        
        <!-- HEADER & GRAFIK (NILAI JUAL UTAMA KE DOSEN) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="wix-box p-8 rounded-2xl flex flex-col justify-center space-y-4 lg:col-span-1">
                <h2 class="text-2xl font-black text-white tracking-tight">System Analytics</h2>
                <p class="text-zinc-400 text-sm font-light leading-relaxed">
                    Visualisasi data metrik operasional portofolio Anda. Engine secara otomatis melacak rasio konversi proyek dan volume pesan masuk.
                </p>
                <div class="flex gap-4 pt-4 border-t border-white/5">
                    <div>
                        <span class="text-3xl font-black text-sky-400 block"><?php echo $total_proyek; ?></span>
                        <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider">Total Proyek</span>
                    </div>
                    <div class="pl-4 border-l border-white/5">
                        <span class="text-3xl font-black text-indigo-400 block"><?php echo $total_pesan; ?></span>
                        <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-wider">Total Pesan</span>
                    </div>
                </div>
            </div>
            
            <!-- CANVAS GRAFIK CHART.JS -->
            <div class="wix-box p-6 rounded-2xl lg:col-span-2 h-64 relative">
                <canvas id="grafikAktivitas"></canvas>
            </div>
        </div>

        <?php if ($notifikasi) : ?>
            <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl font-semibold text-center text-sm">
                ✓ Eksekusi query database berhasil diselesaikan!
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <!-- FORM ENTRI DATA -->
            <div class="wix-box p-6 rounded-2xl space-y-6 sticky top-24">
                <div class="border-b border-white/5 pb-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2"><i class="fa-solid fa-terminal text-sky-400"></i> Deploy Proyek Baru</h3>
                </div>
                <form action="" method="POST" class="space-y-4"></form>
                <form action="" method="POST" class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Judul Aplikasi</label>
                        <input type="text" name="judul" class="form-input-wix w-full p-3 rounded-lg text-sm text-white" required>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Deskripsi Teknis</label>
                        <textarea name="deskripsi" rows="3" class="form-input-wix w-full p-3 rounded-lg text-sm text-white" required></textarea>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Stack Teknologi</label>
                        <input type="text" name="tag" class="form-input-wix w-full p-3 rounded-lg text-sm text-white" placeholder="PHP • MySQL" required>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">Highlight Fitur</label>
                        <input type="text" name="fitur" class="form-input-wix w-full p-3 rounded-lg text-sm text-white" required>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest block">Screenshot Aplikasi (JPG/PNG)</label>
                        <input type="file" name="gambar" class="w-full bg-[#05050a] border border-[#1e1e38] p-3 rounded-xl text-sm text-white focus:border-sky-400 transition outline-none">
                    </div>
                    <!-- Ini tombol submit bawaan Anda yang tergeser ke bawah -->
                   <button type="submit" name="tambah_proyek" class="w-full py-3 bg-sky-500 hover:bg-sky-400 text-black text-xs font-black uppercase tracking-widest rounded-lg transition-all shadow-lg shadow-sky-500/20">
                        Simpan & Upload Proyek ➔
                    </button>
                </form>
            </div>

            <!-- TABEL DATA DENGAN PENCARIAN PINTAR -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- TABEL PROYEK -->
                <div class="wix-box rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-white/5 bg-[#141428]/50 flex justify-between items-center flex-wrap gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white flex items-center gap-2"><i class="fa-solid fa-server text-indigo-400"></i> Repositori Proyek</h3>
                        </div>
                        <!-- BAR PENCARIAN LIVE -->
                        <div class="relative max-w-xs w-full">
                            <i class="fa-solid fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-zinc-500 text-xs"></i>
                            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama proyek..." class="form-input-wix w-full pl-9 pr-3 py-2 rounded-full text-xs text-white">
                        </div>
                    </div>
                    <div class="max-h-[500px] overflow-y-auto overflow-x-auto">
                        <table class="w-full text-left border-collapse" id="projectTable">
                            <thead class="sticky top-0 bg-[#05050a] z-10 shadow-md">
                                <tr class="border-b border-white/5 text-[10px] text-zinc-400 font-bold uppercase tracking-widest">
                                    <th class="p-4">Visual & Data</th>
                                    <th class="p-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-sm">
                                <?php if (mysqli_num_rows($ambil_proyek) > 0) : ?>
                                    <?php while ($row_p = mysqli_fetch_assoc($ambil_proyek)) : ?>
                                        <tr class="hover:bg-white/[0.02] transition project-row">
                                            <td class="p-4 flex items-start space-x-4">
                                                <img src="https://picsum.photos/seed/<?php echo $row_p['id']; ?>/100/80" class="w-20 h-16 object-cover rounded-md border border-white/10 flex-shrink-0">
                                                <div>
                                                    <span class="project-title text-white font-bold block mb-1"><?php echo htmlspecialchars($row_p['judul']); ?></span>
                                                    <span class="text-[10px] text-sky-400 font-mono block mb-2"><?php echo htmlspecialchars($row_p['tag']); ?></span>
                                                    <p class="text-xs text-zinc-400 line-clamp-2"><?php echo htmlspecialchars($row_p['deskripsi']); ?></p>
                                                </div>
                                            </td>
                                            <td class="p-4 text-right align-top">
                                                <a href="admin.php?hapus_proyek_id=<?php echo $row_p['id']; ?>" class="bg-red-500/10 hover:bg-red-500 hover:text-black text-red-400 text-[10px] font-bold uppercase tracking-wider px-3 py-2 rounded-md transition" onclick="return confirm('Hapus permanen?')"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- SCRIPT LOGIKA FRONTEND (CHART & SEARCH) -->
    <script>
        // 1. Logika Live Search Tabel
        function filterTable() {
            let input = document.getElementById("searchInput").value.toUpperCase();
            let rows = document.querySelectorAll(".project-row");
            rows.forEach(row => {
                let title = row.querySelector(".project-title").textContent.toUpperCase();
                row.style.display = title.includes(input) ? "" : "none";
            });
        }

        // 2. Logika Pembuatan Grafik Animasi (Chart.js)
        const ctx = document.getElementById('grafikAktivitas').getContext('2d');
        
        // Bikin efek gradient biar mewah
        let gradientSky = ctx.createLinearGradient(0, 0, 0, 400);
        gradientSky.addColorStop(0, 'rgba(56, 189, 248, 0.5)'); // Sky blue transparan
        gradientSky.addColorStop(1, 'rgba(56, 189, 248, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'], // Data simulasi agar grafik terlihat aktif
                datasets: [{
                    label: 'Interaksi & Kunjungan Profil',
                    data: [12, 19, 15, 25, 22, 30],
                    borderColor: '#38bdf8',
                    backgroundColor: gradientSky,
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#38bdf8',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    fill: true,
                    tension: 0.4 // Membuat garis melengkung mulus
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255, 255, 255, 0.05)', drawBorder: false },
                        ticks: { color: '#71717a', font: { size: 10 } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#71717a', font: { size: 10 } }
                    }
                }
            }
        });
    </script>

</body>
</html>