<?php

use App\Peminjaman;

function get_total_lewat()
{
    $hari = Peminjaman::join('anggotas', 'peminjamen.id', '=', 'anggotas.id')->select('peminjamen.*', DB::raw('DATEDIFF(tgl_kembali, tgl_pinjam) as telat_balik'))->get();
    return $hari;
}