<?php
// Peta peran dan layar Figma "BUMDes Desa Ibru"
return [
    'roles' => [
        'admin'     => ['label'=>'Admin',     'home'=>'akun.index',          'goal'=>'Manajemen Akun dan Peran',    'desc'=>'Kelola pengguna & hak akses'],
        'pengelola' => ['label'=>'Pengelola', 'home'=>'dashboard.pengelola', 'goal'=>'Dashboard Operasional Unit', 'desc'=>'Pencatatan kas harian & inventaris'],
        'direktur'  => ['label'=>'Direktur',  'home'=>'dashboard.direktur',  'goal'=>'Dashboard Direktur BUMDes',   'desc'=>'Ringkasan kinerja & laporan'],
        'pemdes'    => ['label'=>'Pemdes',    'home'=>'dashboard.pemdes',    'goal'=>'Dashboard Pemerintah Desa',   'desc'=>'Pemantauan keuangan desa'],
    ],
];
