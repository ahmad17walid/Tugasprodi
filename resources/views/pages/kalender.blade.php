@extends('layouts.app')

@section('title', 'Kalender Akademik')

@section('content')
    <h1 class="text-3xl font-bold text-blue-900 mb-6">Kalender Akademik</h1>

    <div class="space-y-8">
        @foreach ($kalender as $k)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $k['judul'] }}</h2>

                @if (file_exists(public_path('images/kalender/' . $k['foto'])))
                    <a href="{{ asset('images/kalender/' . $k['foto']) }}" target="_blank">
                        <img src="{{ asset('images/kalender/' . $k['foto']) }}" alt="{{ $k['judul'] }}"
                             class="w-full h-auto rounded border">
                    </a>
                    <p class="text-sm text-gray-500 mt-2">Klik gambar untuk melihat ukuran penuh.</p>
                @else
                    <div class="bg-gray-100 border border-dashed border-gray-400 rounded p-8 text-center text-gray-500">
                        Foto belum tersedia (cek nama file: {{ $k['foto'] }})
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection