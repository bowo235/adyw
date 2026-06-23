<?php
session_start();

// 1. SINKRONISASI PROTEKSI (Sudah disamakan dengan admin.php menggunakan login_admin)
if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit;
}

// 2. KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "db_potofolio");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$notifikasi = '';

// 3. LOGIKA HAPUS PESAN
if (isset($_GET['hapus_id'])) {
    $id_hapus = intval($_GET['hapus_id']);
    
    $query_hapus = "DELETE FROM pesan WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query_hapus);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_hapus);
        if (mysqli_stmt_execute($stmt)) {
            $notifikasi = "sukses_hapus";
        } else {
            $notifikasi = "gagal_hapus";
        }
        mysqli_stmt_close($stmt);
    }
}

// 4. AMBIL DATA PESAN
$query_tampil = "SELECT * FROM pesan ORDER BY id DESC";
$result = mysqli_query($koneksi, $query_tampil);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kendali CMS | Pesan Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #05050a; color: #ffffff; }
        .wix-box { background: #0f0f1e; border: 1px solid #1e1e38; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <!-- TOP BAR (Sama persis dengan admin.php agar sinkron) -->
    <header class="bg-[#0f0f1e] border-b border-white/5 py-4 px-8 sticky top-0 z-50 backdrop-blur-md bg-[#0f0f1e]/80">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-xs bg-sky-500 text-black px-2 py-1 rounded font-black tracking-widest animate-pulse">LIVE</span>
                <h1 class="text-lg font-bold tracking-tight text-white">ADY<span class="text-sky-400">.</span>CONTROL</h1>
            </div>
            <div class="flex items-center space-x-6">
                <a href="admin.php" class="text-sm font-semibold text-zinc-400 hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-table-columns"></i> Kelola Proyek</a>
                <a href="admin_pesan.php" class="text-sm font-semibold text-sky-400 flex items-center gap-2"><i class="fa-solid fa-envelope"></i> Pesan Masuk</a>
                <a href="index.php" class="text-sm font-semibold text-zinc-400 hover:text-white transition flex items-center gap-2" target="_blank"><i class="fa-solid fa-globe"></i> Lihat Situs</a>
                <a href="logout.php" class="bg-red-500/10 text-red-400 border border-red-500/20 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-red-500 hover:text-black transition" onclick="return confirm('Keluar dari sesi aman ini?')">Log Out <i class="fa-solid fa-power-off ml-1"></i></a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-7xl w-full mx-auto px-6 py-10 flex-grow space-y-8">
        <div>
            <h2 class="text-2xl font-black text-white tracking-tight">Inbox Pesan Masuk</h2>
            <p class="text-zinc-400 text-sm font-light leading-relaxed">Membaca pesan kiriman dan tawaran kerja sama dari formulir kontak situs.</p>
        </div>

        <?php if ($notifikasi === 'sukses_hapus') : ?>
            <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl font-semibold text-center text-sm">
                ✓ Pesan berhasil dihapus secara permanen dari database!
            </div>
        <?php endif; ?>

        <!-- LIST BOX PESAN -->
        <div class="space-y-4">
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="wix-box p-6 rounded-2xl space-y-4">
                        <div class="flex justify-between items-start border-b border-white/5 pb-4 flex-wrap gap-2">
                            <div>
                                <h3 class="text-base font-bold text-white"><?= htmlspecialchars($row['nama']); ?></h3>
                                <span class="text-xs text-sky-400 font-mono"><?= htmlspecialchars($row['email']); ?></span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-xs text-zinc-500 font-mono"><?= $row['tanggal']; ?></span>
                                <a href="admin_pesan.php?hapus_id=<?= $row['id']; ?>" onclick="return confirm('Hapus pesan ini?')" class="bg-red-500/10 hover:bg-red-500 hover:text-black text-red-400 text-xs px-3 py-1.5 rounded-md transition">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest block mb-1">Subjek: <?= htmlspecialchars($row['subjek'] ?: '-'); ?></span>
                            <p class="text-sm text-zinc-300 leading-relaxed bg-[#05050a] p-4 rounded-xl border border-white/[0.02] whitespace-pre-line"><?= htmlspecialchars($row['pesan']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="wix-box p-12 rounded-2xl text-center text-zinc-500 font-mono text-sm">
                    Belum ada pesan masuk di database.
                </div>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>