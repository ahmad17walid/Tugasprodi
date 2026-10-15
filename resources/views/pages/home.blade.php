@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero -->
    <section class="bg-blue-900 text-white rounded-2xl px-6 py-12 md:px-12 md:py-16">
        <p class="text-blue-200 mb-3">STMIK Widya Cipta Dharma</p>
        <h1 class="text-3xl md:text-5xl font-extrabold leading-tight max-w-3xl">
            Program Studi {{ $data['nama prodi'] }}
        </h1>
        <p class="mt-5 text-lg text-blue-100 max-w-2xl">
            Selamat datang di website resmi prodi kami!
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('kurikulum') }}"
               class="bg-amber-400 text-blue-950 font-semibold px-5 py-3 rounded hover:bg-amber-300 transition">
                Lihat kurikulum
            </a>
            <a href="{{ route('kontak') }}"
               class="border border-white/40 px-5 py-3 rounded hover:bg-white/10 transition">
                Hubungi kami
            </a>
        </div>
    </section>

    <!-- Statistik -->
    <section class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4" aria-label="Data prodi">
        @foreach ($statistik as $s)
            <div class="bg-white rounded-lg shadow p-5 text-center">
                <p class="text-3xl font-bold text-blue-900">
                    <span class="hitung" data-target="{{ $s['angka'] }}">{{ $s['angka'] }}</span>
                </p>
                <p class="text-sm text-gray-600 mt-1">{{ $s['label'] }}</p>
            </div>
        @endforeach
    </section>

    <div class="mt-8 grid gap-6 lg:grid-cols-5">
        <!-- Visi & Misi -->
        <section class="lg:col-span-3 bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-900">
            <h2 class="text-2xl font-bold text-blue-900 mb-3">Visi</h2>
            <p class="italic text-gray-700 mb-6">"{{ $data['visi'] }}"</p>

            <h2 class="text-2xl font-bold text-blue-900 mb-3">Misi</h2>
            <ul class="space-y-3">
                @foreach ($misi as $m)
                    <li class="flex gap-3">
                        <span class="mt-2 w-2 h-2 rounded-full bg-blue-900 shrink-0"></span>
                        <span class="text-gray-700">{{ $m }}</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- Pengumuman -->
        <section class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Pengumuman</h2>
            <div class="divide-y">
                @foreach ($pengumuman as $p)
                    <article class="py-3 first:pt-0 last:pb-0">
                        <p class="text-xs text-gray-500">{{ $p['tanggal'] }}</p>
                        <h3 class="font-semibold text-gray-800">{{ $p['judul'] }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $p['isi'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
    // Angka statistik berhitung naik saat terlihat di layar
    (function () {
        const angka = document.querySelectorAll('.hitung');
        const kurangiGerak = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (kurangiGerak || !('IntersectionObserver' in window)) return;

        function hitung(el) {
            const target = parseInt(el.dataset.target, 10);
            const durasi = 1000;
            const mulai = performance.now();
            function langkah(sekarang) {
                const p = Math.min((sekarang - mulai) / durasi, 1);
                el.textContent = Math.round(target * p);
                if (p < 1) requestAnimationFrame(langkah);
            }
            requestAnimationFrame(langkah);
        }

        const pengamat = new IntersectionObserver(function (entri) {
            entri.forEach(function (e) {
                if (e.isIntersecting) {
                    hitung(e.target);
                    pengamat.unobserve(e.target);
                }
            });
        }, { threshold: 0.5 });

        angka.forEach(function (el) {
            el.textContent = '0';
            pengamat.observe(el);
        });
    })();
</script>
@endpush
