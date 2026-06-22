<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ady Wibowo | Portofolio Digital</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #05050a; color: #ffffff; }
        .glow-button { transition: all 0.3s ease; box-shadow: 0 0 15px rgba(56, 189, 248, 0.2); }
        .glow-button:hover { box-shadow: 0 0 25px rgba(56, 189, 248, 0.4); transform: translateY(-2px); }
        .wix-card { background: #0f0f1e; border: 1px solid #1e1e38; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        .wix-card:hover { border-color: #38bdf8; transform: translateY(-8px); box-shadow: 0 30px 60px -15px rgba(56, 189, 248, 0.15); }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <!-- NAV BAR ALA WIX -->
    <header class="sticky top-0 z-50 bg-[#05050a]/70 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="index.php" class="text-xl font-extrabold tracking-tighter text-white">
                ADY<span class="text-sky-400">.</span>STUDIO
            </a>
            <nav>
                <ul class="flex space-x-8 text-sm font-medium text-zinc-400">
                    <li><a href="index.php" class="hover:text-white transition">Home</a></li>
                    <li><a href="about.php" class="hover:text-white transition">About</a></li>
                    <li><a href="services.php" class="hover:text-white transition">Services</a></li>
                    <li><a href="potofolio.php" class="hover:text-white transition">Potofolio</a></li>
                    <li><a href="contact.php" class="hover:text-white transition">Contact</a></li>
                </ul>
            </nav>
            <div>
                <a href="contact.php" class="glow-button hidden md:inline-block bg-sky-500 text-black text-xs font-bold uppercase tracking-widest px-5 py-2.5 rounded-full">
                    Let's Talk
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl w-full mx-auto px-6 py-16 flex-grow">