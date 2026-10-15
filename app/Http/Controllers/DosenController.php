<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function create()
    {
        return view('pages.dosen-tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        Dosen::create($validated);

        return redirect()
            ->route('dosen')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        return view('pages.dosen-edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $dosen->update($validated);

        return redirect()
            ->route('dosen')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}