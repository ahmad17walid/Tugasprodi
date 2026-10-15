<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Prodi Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex flex-col min-h-screen">

    <!-- Header & Navbar -->
    <header class="bg-blue-900 text-white shadow">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-between items-center gap-2">
            <h1 class="text-xl font-bold">STMIK Widya Cipta Dharma</h1>
                <nav class="space-x-4">
                    <a href="{{ route('home') }}" class="hover:text-blue-200">Beranda</a>
                    <a href="{{ route('dosen') }}" class="hover:text-blue-200">Dosen</a>
                    <a href="{{ route('kalender') }}" class="hover:text-blue-200">Kalender</a>
                    <a href="{{ route('kontak') }}" class="hover:text-blue-200">Kontak</a>
                </nav>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="container mx-auto px-4 py-8 grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>&copy; {{ date('Y') }} Program Studi. All Rights Reserved.</p>
    </footer>

</body>
</html>