<?php

namespace App\Http\Controllers;

use DB;

use App\Buku;
use App\Anggota;
use App\Katalog;
use App\Penerbit;
use App\Pengarang;
use App\Peminjaman;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_anggota = Anggota::count();
        $total_buku = Buku::count();
        $total_peminjaman = Peminjaman::whereMonth('tgl_pinjam', '09')->count();
        $total_penerbit = Penerbit::count();
        $peminjaman = Peminjaman::count();

        $data_donut = Buku::select(DB::raw("COUNT(id_penerbit) as total"))->groupBy('id_penerbit')->orderBy('id_penerbit', 'ASC')->pluck('total');
        $label_donut = Penerbit::orderBy('penerbits.id', 'asc')->join('bukus', 'bukus.id_penerbit', '=', 'penerbits.id')->groupBy('nama_penerbit')->pluck('nama_penerbit');
        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60,141,188,0.9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Peminjaman::select(DB::raw("COUNT(*) as total"))->whereMonth('tgl_pinjam', $month)->first()->total;
                } else {
                    $data_month[] = Peminjaman::select(DB::raw("COUNT(*) as total"))->whereMonth('tgl_kembali', $month)->first()->total;
                }
            }
            $data_bar[$key]['data'] = $data_month;
        }
        return view('admin.dashboard', compact('total_buku', 'total_anggota', 'total_peminjaman', 'total_penerbit', 'data_donut', 'label_donut', 'label_bar', 'data_bar', 'peminjaman'));
    }
    public function buku()
    {
        $penerbit = Penerbit::all();
        $pengarang = Pengarang::all();
        $katalog = Katalog::all();

        return view('admin.buku', compact('penerbit', 'pengarang', 'katalog'));
    }
    public function katalog()
    {
        $data_katalog = Katalog::all();

        return view('admin.katalog', compact('data_katalog'));
    }
    public function penerbit()
    {
        $data_penerbit = Penerbit::all();
        return view('admin.penerbit', compact('data_penerbit'));
    }
    public function pengarang()
    {
        $data_pengarang = Pengarang::all();
        return view('admin.pengarang', compact('data_pengarang'));
    }
    public function anggota()
    {
        $data_anggota = Anggota::all();
        return view('admin.anggota', compact('data_anggota'));
    }
    public function peminjaman()
    {
        if (auth()->user()->can('index peminjaman')) {
            $anggota = DB::table('peminjamen')->join('anggotas', 'peminjamen.id', '=', 'anggotas.id')->select('anggotas.name')->get();
            $data_peminjaman = Peminjaman::all();
            return view('admin.peminjaman', compact('data_peminjaman', 'anggota'));
        } else {
            return abort('403');
        }
    }
    public function test_spatie()
    {
        // $role = Role::create(['name' => 'petugas']);
        // $permission = Permission::create(['name' => 'index peminjaman']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        $user = User::with('roles')->get();
        return $user;

        // $user = auth()->user();
        // $user->assignRole('petugas');
        // return $user;
    }
}