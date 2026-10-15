<?php

namespace App\Http\Controllers;

class ProdiController extends Controller
{
    private $data = [
        'nama prodi' => 'Teknik Informatika',
        'visi' => 'Menjadi program studi unggulan di bidang kecerdasan buatan'
    ];

    private $dosen = [
        ['nama' => 'Presa Taruna Oliver', 'gelar' => 'S. Kom., M.T.', 'jabatan' => 'Ketua Program Studi Bisnis Digital', 'bidang' => 'Struktur Data', 'email' => 'oliver@wicida.ac.id', 'foto' => null],
        ['nama' => 'Rizki Galang Ramadhani', 'gelar' => 'S. Kom., M. Kom.', 'jabatan' => 'Ketua Program Studi Teknik Informatika', 'bidang' => 'Laboratorium Komputer', 'email' => 'galang@wicida.ac.id', 'foto' => null],
        ['nama' => 'Pitrasacha Adytia', 'gelar' => 'S.T., M.T.', 'jabatan' => 'Kepala Pusat Komputer', 'bidang' => 'Pemograman Kerangka Kerja', 'email' => 'pitra@wicida.ac.id', 'foto' => null],
    ];

    // Tiap kalender: judul + nama file foto di public/images/kalender
    private $kalender = [
        ['judul' => 'Kalender Akademik 2026/2027', 'foto' => 'kalender_akademik.jpg'],
    ];

    public function home()
    {
        return view('pages.home', ['data' => $this->data]);
    }

    public function dosen()
    {
        return view('pages.dosen', ['dosen' => $this->dosen]);
    }

    public function kalender()
    {
        return view('pages.kalender', ['kalender' => $this->kalender]);
    }

    public function kontak()
    {
        return view('pages.kontak', [
            'prodi' => $this->data['nama prodi']
        ]);
    }
}