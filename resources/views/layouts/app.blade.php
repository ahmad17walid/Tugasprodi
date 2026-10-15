<!DOCTYPE html>
<html lang="id" class="scroll-smooth motion-reduce:scroll-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Prodi Website') | Teknik Informatika</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex flex-col min-h-screen">

    @php
        $menu = [
            ['route' => 'home',      'label' => 'Beranda'],
            ['route' => 'dosen',     'label' => 'Dosen'],
            ['route' => 'kurikulum', 'label' => 'Kurikulum'],
            ['route' => 'kalender',  'label' => 'Kalender Akademik'],
            ['route' => 'kontak',    'label' => 'Kontak'],
        ];
    @endphp

    <!-- Header & Navbar -->
    <header class="bg-blue-900 text-white shadow sticky top-0 z-40">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-lg md:text-xl font-bold">STMIK Widya Cipta Dharma</a>

            <!-- Menu desktop -->
            <nav class="hidden md:flex items-center gap-1" aria-label="Menu utama">
                @foreach ($menu as $m)
                    <a href="{{ route($m['route']) }}"
                       class="px-3 py-2 rounded transition {{ request()->routeIs($m['route']) ? 'bg-white/15 font-semibold' : 'hover:bg-white/10' }}">
                        {{ $m['label'] }}
                    </a>
                @endforeach
            </nav>

            <!-- Tombol menu HP -->
            <button id="menu-btn" type="button"
                    class="md:hidden p-2 rounded hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                    aria-label="Buka menu" aria-expanded="false" aria-controls="menu-hp">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Menu HP -->
        <nav id="menu-hp" class="hidden md:hidden border-t border-white/10 px-4 pb-3" aria-label="Menu utama HP">
            @foreach ($menu as $m)
                <a href="{{ route($m['route']) }}"
                   class="block px-3 py-2 mt-1 rounded {{ request()->routeIs($m['route']) ? 'bg-white/15 font-semibold' : 'hover:bg-white/10' }}">
                    {{ $m['label'] }}
                </a>
            @endforeach
        </nav>
    </header>

    <!-- Konten Utama -->
    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 mt-8">
        <div class="container mx-auto px-4 py-8 grid gap-6 md:grid-cols-2">
            <div>
                <p class="text-white font-semibold">Program Studi Teknik Informatika</p>
                <p class="text-sm mt-1">STMIK Widya Cipta Dharma</p>
            </div>
            <div class="md:text-right text-sm space-x-4">
                @foreach ($menu as $m)
                    <a href="{{ route($m['route']) }}" class="hover:text-white">{{ $m['label'] }}</a>
                @endforeach
            </div>
        </div>
        <div class="border-t border-gray-700 text-center text-sm py-4">
            &copy; {{ date('Y') }} Program Studi Teknik Informatika. All Rights Reserved.
        </div>
    </footer>

    <!-- Tombol kembali ke atas -->
    <button id="ke-atas" type="button"
            class="hidden fixed bottom-6 right-6 z-40 bg-blue-900 text-white p-3 rounded-full shadow-lg hover:bg-blue-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400"
            aria-label="Kembali ke atas">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
        </svg>
    </button>

    <script>
        // Buka/tutup menu di HP
        const menuBtn = document.getElementById('menu-btn');
        const menuHp = document.getElementById('menu-hp');
        menuBtn.addEventListener('click', function () {
            const terbuka = menuHp.classList.toggle('hidden') === false;
            menuBtn.setAttribute('aria-expanded', terbuka ? 'true' : 'false');
        });

        // Tombol kembali ke atas: muncul setelah scroll 300px
        const keAtas = document.getElementById('ke-atas');
        window.addEventListener('scroll', function () {
            keAtas.classList.toggle('hidden', window.scrollY < 300);
        });
        keAtas.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

    @stack('scripts')
</body>
</html>
