<?php
// Mendeteksi nama file yang sedang aktif saat ini
$cek_halaman = basename($_SERVER['SCRIPT_NAME']);
?>
<!-- FOOTER UTAMA - OTOMATIS SEMBUNYIKAN ALAMAT DI LUAR HOME -->
<footer class="relative z-10 bg-[#020205] border-t border-white/10 pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-8">
        
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 <?php echo ($cek_halaman == 'index.php') ? 'md:grid-cols-2 lg:grid-cols-4' : 'md:grid-cols-2'; ?> gap-12 mb-20">
            
            <!-- Branding & Sosmed (Selalu Muncul di Semua Halaman) -->
            <div class="space-y-6">
                <h3 class="text-white font-bold text-lg tracking-widest uppercase">ADY.STUDIO</h3>
                <p class="text-zinc-400 text-sm leading-relaxed">Solusi pengembangan web profesional dengan fokus pada performa, keamanan, dan desain modern untuk bisnis Anda.</p>
                
                <!-- Daftar Media Sosial Berwarna -->
                <div class="space-y-3 pt-2">
                     <h3 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Media Sosial</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed"></p>
                    <a href="https://instagram.com/mas_ady92" target="_blank" class="flex items-center gap-3 text-zinc-400 hover:text-white transition group">
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-pink-500/10 border border-pink-500/20 text-pink-500 group-hover:bg-pink-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-instagram text-lg"></i>
                        </span>
                        <span class="text-sm font-medium tracking-wide">Instagram</span>
                    </a>
                    <a href="https://wa.me/6282339670829" target="_blank" class="flex items-center gap-3 text-zinc-400 hover:text-white transition group">
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                        </span>
                        <span class="text-sm font-medium tracking-wide">WhatsApp</span>
                    </a>
                    <a href="https://github.com/bowo235/adyw" target="_blank" class="flex items-center gap-3 text-zinc-400 hover:text-white transition group">
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-zinc-100/10 border border-zinc-100/20 text-zinc-200 group-hover:bg-white group-hover:text-black transition-all duration-300">
                            <i class="fa-brands fa-github text-lg"></i>
                        </span>
                        <span class="text-sm font-medium tracking-wide">GitHub</span>
                    </a>
                    <a href="https://facebook.com/KaAdyw" target="_blank" class="flex items-center gap-3 text-zinc-400 hover:text-white transition group">
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-500 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-brands fa-facebook text-lg"></i>
                        </span>
                        <span class="text-sm font-medium tracking-wide">Facebook</span>
                    </a>
                </div>
            </div>

            <!-- LOGIKA PHP: ALAMAT & MAPS HANYA MUNCUL JIKA DI INDEX.PHP (HOME) -->
            <?php if ($cek_halaman == 'index.php') : ?>
                <!-- Lokasi -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-6 uppercase tracking-wider">Lokasi Kantor</h4>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Desa. Serakapi, Kec. Woja, <br>
                        Kota. Dompu, <br>
                        Provinsi. Nusa Tenggara Barat, <br>
                        Indonesia 84251
                    </p>
                </div>

                <!-- Peta Dompu NTB -->
                <div class="lg:col-span-2 h-56 rounded-3xl overflow-hidden border-4 border-white/5 shadow-2xl">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63107.0366657497!2d118.42318855!3d-8.52072235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6b37bc9e3b97b7%3A0x4030bfbc2e0d380!2sDompu%2C%20Kec.%20Dompu%2C%20Kabupaten%20Dompu%2C%20Nusa%20Tenggara%20Barat!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                        class="w-full h-full grayscale-[20%] hover:grayscale-0 transition-all duration-700 ease-in-out" 
                        style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            <?php else : ?>
                <!-- Tampilan Sisi Kanan Alternatif untuk Halaman Portofolio agar Tetap Seimbang & Rapi -->
                <div class="flex md:justify-end items-start pt-2">
                    <div class="text-left md:text-right space-y-3">
                        <h4 class="text-white font-semibold text-sm uppercase tracking-wider">Mulai Project Anda</h4>
                        <p class="text-zinc-400 text-sm max-w-xs leading-relaxed">Punya kebutuhan sistem informasi atau platform digital kustom? Mari berkolaborasi bersama kami.</p>
                        <a href="contact.php" class="inline-block text-xs font-bold text-sky-400 uppercase tracking-widest hover:text-white transition duration-300">Hubungi Ady.Studio ➔</a>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>

        <!-- Footer Rapi -->
<footer class="border-t border-white/5 mt-12 py-8 text-center bg-[#020205]">
    
    <!-- Tautan Legal -->
    <div class="space-x-6 text-xs text-zinc-500 uppercase tracking-widest mb-4">
        <a href="#" class="hover:text-white transition">Privacy Policy</a>
        <a href="#" class="hover:text-white transition">Terms of Service</a>
    </div>

    <!-- Copyright -->
    <p class="text-[10px] text-zinc-600">
        &copy; <?php echo date("Y"); ?> Ady Studio. All rights reserved.
    </p>

</footer>
        </div>
    </div>
</footer>

</body>
</html>