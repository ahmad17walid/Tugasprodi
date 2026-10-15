@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-1">Hubungi Kami</h1>
        <p class="text-gray-600 mb-5">Pertanyaan seputar Program Studi {{ $prodi }}? Tulis di sini.</p>

        <!-- Pesan sukses (tersembunyi sampai form valid) -->
        <div id="sukses" class="hidden mb-4 p-4 rounded bg-green-50 border border-green-300 text-green-800" role="status">
            <!-- Catatan: ini baru simulasi, pesan belum disimpan ke database -->
            <p id="sukses-teks"></p>
        </div>

        <form id="form-kontak" class="space-y-4" action="#" method="POST" novalidate>
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input id="nama" name="nama" type="text"
                       class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Masukkan nama kamu">
                <p class="galat text-sm text-red-600 mt-1 hidden" data-untuk="nama"></p>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email"
                       class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                       placeholder="nama@email.com">
                <p class="galat text-sm text-red-600 mt-1 hidden" data-untuk="email"></p>
            </div>

            <div>
                <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea id="pesan" name="pesan" rows="4"
                          class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Tulis pesan..."></textarea>
                <div class="flex justify-between mt-1">
                    <p class="galat text-sm text-red-600 hidden" data-untuk="pesan"></p>
                    <p id="hitung-huruf" class="text-sm text-gray-500 ml-auto">0 / 500</p>
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-blue-900 text-white py-2 rounded hover:bg-blue-800 transition">
                Kirim pesan
            </button>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    const form = document.getElementById('form-kontak');
    const kotakSukses = document.getElementById('sukses');
    const teksSukses = document.getElementById('sukses-teks');
    const pesan = document.getElementById('pesan');
    const hitungHuruf = document.getElementById('hitung-huruf');
    const BATAS = 500;

    // Penghitung huruf pada kolom pesan
    pesan.addEventListener('input', function () {
        if (pesan.value.length > BATAS) {
            pesan.value = pesan.value.slice(0, BATAS);
        }
        hitungHuruf.textContent = pesan.value.length + ' / ' + BATAS;
    });

    function tampilkanGalat(id, teks) {
        const p = document.querySelector('.galat[data-untuk="' + id + '"]');
        const input = document.getElementById(id);
        if (teks) {
            p.textContent = teks;
            p.classList.remove('hidden');
            input.classList.add('border-red-500');
        } else {
            p.classList.add('hidden');
            input.classList.remove('border-red-500');
        }
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const nama = document.getElementById('nama').value.trim();
        const email = document.getElementById('email').value.trim();
        const isi = pesan.value.trim();
        let valid = true;

        if (nama.length < 3) {
            tampilkanGalat('nama', 'Nama minimal 3 huruf.');
            valid = false;
        } else {
            tampilkanGalat('nama', '');
        }

        if (!/^[^\s]+@[^\s]+\.[^\s]+$/.test(email)) {
            tampilkanGalat('email', 'Isi email dengan format yang benar, misalnya nama@email.com.');
            valid = false;
        } else {
            tampilkanGalat('email', '');
        }

        if (isi.length < 10) {
            tampilkanGalat('pesan', 'Pesan minimal 10 huruf.');
            valid = false;
        } else {
            tampilkanGalat('pesan', '');
        }

        if (!valid) {
            kotakSukses.classList.add('hidden');
            return;
        }

        teksSukses.textContent = 'Terima kasih, ' + nama + '! Pesan kamu sudah kami terima.';
        kotakSukses.classList.remove('hidden');
        form.reset();
        hitungHuruf.textContent = '0 / ' + BATAS;
    });
</script>
@endpush
