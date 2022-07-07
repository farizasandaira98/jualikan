<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\StokIkan;

class PenjualController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:penjual', ['except' => ['logout']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::sum('pemasukan');
        $pengeluaran = Pengeluaran::sum('pengeluaran');
        $sisakas = $pemasukan-$pengeluaran;
        $stokikan = StokIkan::sum('jumlah_ikan');
        $jumlahtransaksi = Pemasukan::count('id');
        return view('/penjual/home')
        ->with(compact('pemasukan'))
        ->with(compact('pengeluaran'))
        ->with(compact('sisakas'))
        ->with(compact('stokikan'))
        ->with(compact('jumlahtransaksi'));
    }
}
