<?php

namespace App\Http\Controllers;

class ProdiController extends Controller
{
    private $data = [
        'nama prodi' => 'Teknik Informatika',
        'visi' => 'Menjadi program studi unggulan di bidang kecerdasan buatan'
    ];

    // CONTOH DATA: ganti dengan misi asli prodi kalian
    private $misi = [
        'Menyelenggarakan pendidikan yang berfokus pada pemrograman dan kecerdasan buatan.',
        'Melaksanakan penelitian yang bermanfaat bagi masyarakat dan industri.',
        'Menjalin kerja sama dengan dunia usaha untuk magang dan penempatan lulusan.',
    ];

    // CONTOH DATA: ganti angkanya dengan data asli
    private $statistik = [
        ['angka' => 250, 'label' => 'Mahasiswa aktif'],
        ['angka' => 3,   'label' => 'Dosen tetap'],
        ['angka' => 8,   'label' => 'Semester pendidikan'],
        ['angka' => 144, 'label' => 'Total SKS lulus'],
    ];

    // CONTOH DATA: ganti dengan pengumuman asli
    private $pengumuman = [
        ['judul' => 'Pendaftaran mahasiswa baru dibuka', 'tanggal' => '1 Oktober 2026', 'isi' => 'Pendaftaran gelombang pertama sudah dibuka. Cek persyaratan di halaman kontak.'],
        ['judul' => 'Jadwal ujian tengah semester', 'tanggal' => '12 Oktober 2026', 'isi' => 'Ujian tengah semester ganjil mengikuti jadwal di kalender akademik.'],
        ['judul' => 'Workshop Laravel untuk mahasiswa', 'tanggal' => '20 Oktober 2026', 'isi' => 'Workshop pengenalan Laravel terbuka untuk semua mahasiswa Teknik Informatika.'],
    ];

    private $dosen = [
        ['nama' => 'Presa Taruna Oliver', 'gelar' => 'S. Kom., M.T.', 'jabatan' => 'Ketua Program Studi Bisnis Digital', 'bidang' => 'Struktur Data', 'email' => 'oliver@wicida.ac.id', 'foto' => null],
        ['nama' => 'Rizki Galang Ramadhani', 'gelar' => 'S. Kom., M. Kom.', 'jabatan' => 'Ketua Program Studi Teknik Informatika', 'bidang' => 'Laboratorium Komputer', 'email' => 'galang@wicida.ac.id', 'foto' => null],
        ['nama' => 'Pitrasacha Adytia', 'gelar' => 'S.T., M.T.', 'jabatan' => 'Kepala Pusat Komputer', 'bidang' => 'Pemograman Kerangka Kerja', 'email' => 'pitra@wicida.ac.id', 'foto' => null],
    ];

    // CONTOH DATA: sesuaikan dengan kurikulum asli (nama mata kuliah, SKS)
    private $kurikulum = [
        1 => [
            ['mk' => 'Pengantar Teknologi Informasi', 'sks' => 3],
            ['mk' => 'Algoritma dan Pemrograman', 'sks' => 4],
            ['mk' => 'Matematika Diskrit', 'sks' => 3],
            ['mk' => 'Bahasa Inggris', 'sks' => 2],
        ],
        2 => [
            ['mk' => 'Struktur Data', 'sks' => 4],
            ['mk' => 'Basis Data', 'sks' => 3],
            ['mk' => 'Pemrograman Berorientasi Objek', 'sks' => 4],
            ['mk' => 'Aljabar Linear', 'sks' => 3],
        ],
        3 => [
            ['mk' => 'Pemrograman Web', 'sks' => 4],
            ['mk' => 'Jaringan Komputer', 'sks' => 3],
            ['mk' => 'Sistem Operasi', 'sks' => 3],
            ['mk' => 'Statistika', 'sks' => 3],
        ],
        4 => [
            ['mk' => 'Pemrograman Kerangka Kerja', 'sks' => 4],
            ['mk' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
            ['mk' => 'Interaksi Manusia dan Komputer', 'sks' => 3],
            ['mk' => 'Kecerdasan Buatan', 'sks' => 3],
        ],
        5 => [
            ['mk' => 'Pemrograman Mobile', 'sks' => 4],
            ['mk' => 'Machine Learning', 'sks' => 3],
            ['mk' => 'Keamanan Informasi', 'sks' => 3],
            ['mk' => 'Metodologi Penelitian', 'sks' => 2],
        ],
        6 => [
            ['mk' => 'Data Mining', 'sks' => 3],
            ['mk' => 'Cloud Computing', 'sks' => 3],
            ['mk' => 'Manajemen Proyek TI', 'sks' => 3],
            ['mk' => 'Kerja Praktik', 'sks' => 2],
        ],
        7 => [
            ['mk' => 'Deep Learning', 'sks' => 3],
            ['mk' => 'Etika Profesi', 'sks' => 2],
            ['mk' => 'Kewirausahaan', 'sks' => 2],
            ['mk' => 'Mata Kuliah Pilihan', 'sks' => 3],
        ],
        8 => [
            ['mk' => 'Skripsi', 'sks' => 6],
            ['mk' => 'Seminar Tugas Akhir', 'sks' => 2],
        ],
    ];

    // Tiap kalender: judul + nama file foto di public/images/kalender
    private $kalender = [
        ['judul' => 'Kalender Akademik 2026/2027', 'foto' => 'kalender_akademik.jpg'],
    ];

    public function home()
    {
        return view('pages.home', [
            'data' => $this->data,
            'misi' => $this->misi,
            'statistik' => $this->statistik,
            'pengumuman' => $this->pengumuman,
        ]);
    }

    public function dosen()
    {
        return view('pages.dosen', ['dosen' => $this->dosen]);
    }

    public function kurikulum()
    {
        return view('pages.kurikulum', ['kurikulum' => $this->kurikulum]);
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
