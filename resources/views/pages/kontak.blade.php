@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="mx-auto max-w-lg rounded-lg bg-white p-6 shadow">
    <h1 class="mb-4 text-2xl font-bold text-gray-800">
        Hubungi Kami
    </h1>

    <form id="kontakForm" class="space-y-4">
        <div>
            <label for="nama"
                   class="block text-sm font-medium text-gray-700">
                Nama
            </label>

            <input
                id="nama"
                name="nama"
                type="text"
                required
                maxlength="100"
                class="mt-1 w-full rounded border p-2 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Masukkan nama kamu"
            >
        </div>

        <div>
            <label for="pesan"
                   class="block text-sm font-medium text-gray-700">
                Pesan
            </label>

            <textarea
                id="pesan"
                name="pesan"
                rows="4"
                required
                maxlength="2000"
                class="mt-1 w-full rounded border p-2 focus:border-blue-500 focus:ring-blue-500"
                placeholder="Tulis pesan..."
            ></textarea>
        </div>

        <button
            type="submit"
            class="w-full rounded bg-blue-900 py-3 text-white transition hover:bg-blue-800"
        >
            Kirim Pesan
        </button>
    </form>
</div>

<script>
    document.getElementById('kontakForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const nama = document.getElementById('nama').value.trim();
        const pesan = document.getElementById('pesan').value.trim();

        if (!nama || !pesan) {
            alert('Nama dan pesan wajib diisi.');
            return;
        }

        // Ganti dengan nomor WhatsApp resmi prodi.
        const nomorWhatsApp = '6281234567890';

        const teks = `Halo, saya ${nama}.\n\n${pesan}`;
        const url = `https://wa.me/${nomorWhatsApp}?text=${encodeURIComponent(teks)}`;

        window.open(url, '_blank', 'noopener,noreferrer');
    });
</script>
@endsection