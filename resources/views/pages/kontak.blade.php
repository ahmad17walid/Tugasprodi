@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Hubungi Kami</h1>
        
        <form class="space-y-4" action="#" method="POST">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama kamu">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea class="w-full mt-1 p-2 border rounded focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Tulis pesan..."></textarea>
            </div>
            <button type="button" class="w-full bg-blue-900 text-white py-2 rounded hover:bg-blue-800 transition">
                Kirim Pesan
            </button>
        </form>
    </div>
@endsection