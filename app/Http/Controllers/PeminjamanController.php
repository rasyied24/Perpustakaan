<?php

namespace App\Http\Controllers;

use DB;
use App\Peminjaman;
use App\DetailPeminjaman;
use App\Anggota;
use App\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $peminjaman = Peminjaman::with('anggota')->select('peminjamen.*', DB::raw('DATEDIFF(tgl_kembali, tgl_pinjam) as lama_pinjam'));
        if ($request->status == 1 || $request->status == 0 && $request->status == 2) {
            $peminjaman = $peminjaman->where('status', $request->status);
        }
        $peminjaman = $peminjaman->get();
        foreach ($peminjaman as $data) {
            $data->nama_anggota = $data->anggota->name;
            $data->total_buku = DetailPeminjaman::where('id_peminjaman', $data->id)->count();
            $data->total_bayar = DetailPeminjaman::select(DB::raw('SUM(harga_pinjam) as total_bayar'))->where('id_peminjaman', $data->id)->join('bukus', 'bukus.id', '=', 'detail_peminjamen.id_buku')->groupBy('detail_peminjamen.id_peminjaman')->first()->total_bayar;
        }
        $datatables = datatables()->of($peminjaman)->addIndexColumn();
        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $peminjaman = Peminjaman::all();
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('admin.peminjaman.add_peminjaman', compact('anggota', 'peminjaman', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_anggota' => ['required'],
            'tgl_pinjam' => ['required'],
            'tgl_kembali' => ['required'],
        ]);
        $peminjaman = new Peminjaman;
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->tgl_kembali = date("Y-m-d", strtotime($request->tgl_kembali));
        $peminjaman->tgl_pinjam = date("Y-m-d", strtotime($request->tgl_pinjam));
        $peminjaman->status = 0;
        $peminjaman->save();
        foreach ($request->judul as $data) {
            $detail_peminjaman = new DetailPeminjaman;
            $detail_peminjaman->id_peminjaman = $peminjaman->id;
            $detail_peminjaman->id_buku = $data;
            $detail_peminjaman->qty = 1;
            $detail_peminjaman->save();
        };

        return redirect('peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        $buku = Buku::all();
        $anggota = Anggota::all();

        $buku1 = DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->pluck('id_buku');

        return view('admin.peminjaman.edit_peminjaman', compact('peminjaman', 'anggota', 'buku', 'buku1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
            'id_anggota' => ['required'],
            'tgl_pinjam' => ['required'],
            'tgl_kembali' => ['required'],
        ]);

        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->tgl_kembali = $request->tgl_kembali;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->status = $request->status;
        $peminjaman->save();
        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();
        foreach ($request->judul as $data) {
            $detail_peminjaman = new DetailPeminjaman;
            $detail_peminjaman->id_peminjaman = $peminjaman->id;
            $detail_peminjaman->id_buku = $data;
            $detail_peminjaman->qty = 1;
            $detail_peminjaman->save();
        };

        return redirect('peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();
        $peminjaman->delete();
        return back();
    }
}