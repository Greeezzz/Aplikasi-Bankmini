<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $semuaTransaksi = Transaksi::where('user_id', $user->id)->get();
        return view('nasabah.index')->with('semuaTransaksi', $semuaTransaksi);  
    }

    public function laporan()
    {
        $user = auth()->user();
        $semuaTransaksi = Transaksi::where('user_id', $user->id)->get();
        return view('nasabah.laporan')->with('semuaTransaksi', $semuaTransaksi);  
    }

    public function cetakLaporan()
    {
        $user = auth()->user();
        $semuaTransaksi = Transaksi::where('user_id', $user->id)->get();
        $pdf = Pdf::loadView('nasabah.laporan', ['semuaTransaksi' => $semuaTransaksi]);
        return $pdf->stream('Laporan Nasabah.pdf');
    }

    public function laporanTransaksiAdmin()
    {
        $semuaTransaksi = Transaksi::all();
        return view('nasabah.laporan')->with('semuaTransaksi', $semuaTransaksi);
    }

    public function cetakLaporanAdmin()
    {
        $semuaTransaksi = Transaksi::all();
        $pdf = Pdf::loadView('admin.laporan', ['semuaTransaksi' => $semuaTransaksi]);
        return $pdf->stream('Laporan Semua Transaksi.pdf');
    }

    public function cetakLaporanPilih($id)
    {
        $user = User::find($id);
        $semuaTransaksi = Transaksi::where('user_id', $user->id)->get();
        $pdf = Pdf::loadView('admin.laporan', ['semuaTransaksi' => $semuaTransaksi]);
        return $pdf->stream('Laporan Tiap Nasabah.pdf');
    }
}