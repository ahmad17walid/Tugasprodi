@extends('layouts.app')

@section('title', 'Dosen')

@section('content')
    <div class="flex flex-wrap items-end justify-between gap-4 mb-6">
        <h1 class="text-3xl font-bold text-blue-900">Dosen Program Studi</h1>

        <div class="w-full sm:w-72">
            <label for="cari" class="sr-only">Cari dosen</label>
            <input id="cari" type="search" autocomplete="off"
                   class="w-full p-2 border rounded bg-white focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Cari nama, jabatan, atau bidang">
        </div>
    </div>

    <div id="daftar-dosen" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($dosen as $d)
            <div class="kartu-dosen bg-white rounded-lg shadow-md p-6 text-center"
                 data-cari="{{ mb_strtolower($d['nama'] . ' ' . $d['jabatan'] . ' ' . $d['bidang']) }}">
                @if ($d['foto'])
                    <img src="{{ asset('images/dosen/' . $d['foto']) }}" alt="{{ $d['nama'] }}"
                         class="w-28 h-28 rounded-full object-cover mx-auto mb-4">
                @else
                    <div class="w-28 h-28 rounded-full bg-blue-900 text-white text-4xl font-bold flex items-center justify-center mx-auto mb-4">
                        {{ strtoupper(substr($d['nama'], 0, 1)) }}
                    </div>
                @endif

                <h2 class="text-lg font-semibold text-gray-800">{{ $d['nama'] }}, {{ $d['gelar'] }}</h2>
                <p class="text-blue-900 font-medium">{{ $d['jabatan'] }}</p>
                <p class="text-gray-600 text-sm mt-1">Bidang: {{ $d['bidang'] }}</p>
                <a href="mailto:{{ $d['email'] }}" class="text-gray-500 text-sm hover:text-blue-900 hover:underline">
                    {{ $d['email'] }}
                </a>
            </div>
        @endforeach
    </div>

    <p id="kosong" class="hidden text-center text-gray-600 bg-white rounded-lg shadow p-8">
        Tidak ada dosen yang cocok. Coba kata kunci lain.
    </p>
@endsection

@push('scripts')
<script>
    const kolomCari = document.getElementById('cari');
    const kartu = document.querySelectorAll('.kartu-dosen');
    const pesanKosong = document.getElementById('kosong');

    kolomCari.addEventListener('input', function () {
        const kata = kolomCari.value.trim().toLowerCase();
        let ada = 0;
        kartu.forEach(function (k) {
            const cocok = k.dataset.cari.indexOf(kata) !== -1;
            k.classList.toggle('hidden', !cocok);
            if (cocok) ada++;
        });
        pesanKosong.classList.toggle('hidden', ada > 0);
    });
</script>
@endpush
