@extends('layouts.app')

@section('title', 'Kurikulum')

@section('content')
    @php
        $totalSks = 0;
        foreach ($kurikulum as $daftar) {
            foreach ($daftar as $mk) {
                $totalSks += $mk['sks'];
            }
        }
    @endphp

    <div class="flex flex-wrap items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-blue-900">Kurikulum</h1>
            <p class="text-gray-600 mt-1">{{ count($kurikulum) }} semester, total {{ $totalSks }} SKS.</p>
        </div>
        <div class="flex gap-2">
            <button type="button" id="buka-semua"
                    class="px-4 py-2 rounded bg-blue-900 text-white hover:bg-blue-800 transition">
                Buka semua
            </button>
            <button type="button" id="tutup-semua"
                    class="px-4 py-2 rounded border border-blue-900 text-blue-900 hover:bg-blue-50 transition">
                Tutup semua
            </button>
        </div>
    </div>

    <div class="space-y-3">
        @foreach ($kurikulum as $semester => $daftar)
            <details class="semester bg-white rounded-lg shadow" {{ $loop->first ? 'open' : '' }}>
                <summary class="cursor-pointer select-none px-5 py-4 flex justify-between items-center font-semibold text-gray-800">
                    <span>Semester {{ $semester }}</span>
                    <span class="text-sm font-normal text-gray-500">{{ array_sum(array_column($daftar, 'sks')) }} SKS</span>
                </summary>
                <div class="px-5 pb-4 overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b text-sm text-gray-500">
                                <th class="py-2 font-medium">Mata kuliah</th>
                                <th class="py-2 font-medium text-right">SKS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($daftar as $mk)
                                <tr>
                                    <td class="py-2">{{ $mk['mk'] }}</td>
                                    <td class="py-2 text-right">{{ $mk['sks'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </details>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
    const semuaSemester = document.querySelectorAll('details.semester');
    document.getElementById('buka-semua').addEventListener('click', function () {
        semuaSemester.forEach(function (d) { d.open = true; });
    });
    document.getElementById('tutup-semua').addEventListener('click', function () {
        semuaSemester.forEach(function (d) { d.open = false; });
    });
</script>
@endpush
