<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    private $data = [
        'nama prodi' => 'Teknik Informatika',
        'visi' => 'Menjadi program studi unggulan di bidang kecerdasan buatan'
    ];

    public function home(){
        return view('pages.home', ['data' => $this->data]);
    }

    public function kontak(){
        return view('pages.kontak', [
            'prodi' => $this->data['nama prodi']
        ]);
    }
}

