@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-900">
        <!-- Mengakses key 'nama prodi' dari array $data -->
        <h1 class="text-3xl font-bold text-blue-900 mb-2">
            Program Studi {{ $data['nama prodi'] }}
        </h1>
        
        <p class="text-gray-600 text-lg mb-4">
            Selamat datang di website resmi prodi kami!
        </p>

        <div class="bg-blue-50 p-4 rounded border border-blue-200">
            <h2 class="font-semibold text-blue-900 mb-1">Visi Prodi:</h2>
            <p class="italic text-gray-700">"{{ $data['visi'] }}"</p>
        </div>
    </div>
@endsection