@extends('layouts.app')

@section('title', 'Dosen')

@section('content')
    <h1 class="text-3xl font-bold text-blue-900 mb-6">Dosen Program Studi</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($dosen as $d)
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
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
                <p class="text-gray-500 text-sm">{{ $d['email'] }}</p>
            </div>
        @endforeach
    </div>
@endsection