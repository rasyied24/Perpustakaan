<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';
    protected $fillable = [
        'id_anggota', 'tgl_kembali', 'tgl_pinjam', 'status'
    ];

    public function buku()
    {
        return $this->belongsToMany('App\Buku', 'detail_peminjamen', 'id_peminjaman', 'id_buku');
    }
    public function anggota()
    {
        return $this->belongsTo('App\Anggota', 'id_anggota');
    }
}