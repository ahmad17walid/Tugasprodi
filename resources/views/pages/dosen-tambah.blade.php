@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl px-4 py-10">
    <h1 class="mb-6 text-2xl font-bold">Tambah Data Dosen</h1>

    <form action="{{ route('dosen.store') }}" method="POST"
          class="space-y-4">
        @csrf

        <div>
            <label for="nama" class="mb-1 block font-medium">
                Nama Dosen *
            </label>
            <input id="nama" name="nama" type="text"
                   value="{{ old('nama') }}" required
                   class="w-full rounded border px-3 py-2">
            @error('nama')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nidn" class="mb-1 block font-medium">NIDN</label>
            <input id="nidn" name="nidn" type="text"
                   value="{{ old('nidn') }}"
                   class="w-full rounded border px-3 py-2">
        </div>

        <div>
            <label for="jabatan" class="mb-1 block font-medium">Jabatan</label>
            <input id="jabatan" name="jabatan" type="text"
                   value="{{ old('jabatan') }}"
                   class="w-full rounded border px-3 py-2">
        </div>

        <div>
            <label for="email" class="mb-1 block font-medium">Email</label>
            <input id="email" name="email" type="email"
                   value="{{ old('email') }}"
                   class="w-full rounded border px-3 py-2">
            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="rounded bg-blue-600 px-5 py-2 text-white">
                Simpan
            </button>

            <a href="{{ route('dosen') }}"
               class="rounded border px-5 py-2">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection