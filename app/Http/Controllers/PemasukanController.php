<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Masukan;


class PemasukanController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:penjual', ['except' => ['logout']]);
    }


    public function index()
    {
        $pemasukan = Pemasukan::paginate(5);
        return view('/penjual/pemasukan/index')
        ->with(compact('pemasukan'));
    }


    public function destroy($id)
    {
        $pemasukan = Pemasukan::where('id',$id)->first();
        $pemasukan->delete();

        if($pemasukan){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('penjual/pemasukan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/pemasukan');
        }
    }

    public function search(Request $request)
    {
        $cari = $request->date;
        $hasilcari = $stokikan = Pemasukan::where('created_at','LIKE','%'.$cari.'%')
        ->paginate(5);

        return view('/penjual/pemasukan/index', ['pemasukan' => $hasilcari]);
      }

      public function cetak()
    {
        $pemasukan = Pemasukan::where('status','Sudah Masuk')->get();
        $totalpemasukan = Pemasukan::sum('pemasukan');
        $pdf = PDF::loadview('/penjual/pemasukan/cetak',['pemasukan'=>$pemasukan, 'totalpemasukan'=>$totalpemasukan]);
        return $pdf->stream();
    }

    public function saran()
    {
        $masukan = Masukan::paginate(5);
        return view('/penjual/masukan/index')
        ->with(compact('masukan'));
    }

    public function deletesaran($id)
    {

        $masukan = Masukan::where('id',$id)->first();
        $masukan->delete();

        if($masukan){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('penjual/masukan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/masukan');
        }
    }
}
