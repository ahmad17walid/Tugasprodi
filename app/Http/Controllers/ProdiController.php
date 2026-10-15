<?php

namespace App\Http\Controllers;

use App\Models\Dosen;

class ProdiController extends Controller
{
    private $data = [
        'nama prodi' => 'Teknik Informatika',
        'visi' => 'Menjadi program studi unggulan di bidang kecerdasan buatan'
    ];

    private $kalender = [
        [
            'judul' => 'Kalender Akademik 2026/2027',
            'foto' => 'kalender_akademik.jpg'
        ],
    ];

    public function home()
    {
        return view('pages.home', [
            'data' => $this->data
        ]);
    }

    public function dosen()
    {
        $dosen = Dosen::all();

        return view('pages.dosen', [
            'dosen' => $dosen
        ]);
    }

    public function kalender()
    {
        return view('pages.kalender', [
            'kalender' => $this->kalender
        ]);
    }

    public function kontak()
    {
        return view('pages.kontak', [
            'prodi' => $this->data['nama prodi']
        ]);
    }
}