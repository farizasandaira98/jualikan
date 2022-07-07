<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth:penjual', ['except' => ['logout']]);
    }

    public function index()
    {
        $pengeluaran = Pengeluaran::paginate(5);
        return view('/penjual/pengeluaran/index')
        ->with(compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/penjual/pengeluaran/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'pengeluaran' => 'required',
            'deskripsi' => 'required',
            'foto_kwitansi' => 'required',
        ];

        $messages = [
            'pengeluaran.required'          => 'Pengeluaran wajib diisi',
            'deskripsi.required'          => 'Deskripsi wajib diisi',
            'foto_kwitansi.required'          => 'Foto kwitansi wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $this->validate($request,[
            'pengeluaran' => 'required',
            'deskripsi' => 'required',
            'foto_kwitansi' => 'required',
        ]);

        $file = $request->file('foto_kwitansi');
        $namafile = $file->getClientOriginalName();
        $namaasli = pathinfo($namafile, PATHINFO_FILENAME);
        $depan = "Pengeluaran";
        $ekstensi = $file->getClientOriginalExtension();
        $namafile = $depan."_".$namaasli.".".$ekstensi;
        $tujuan_upload = 'foto_kwitansi';
        $file->move($tujuan_upload,$namafile);



        $simpan = Pengeluaran::create([
            'pengeluaran' => $request->pengeluaran,
            'deskripsi' => $request->deskripsi,
            'foto_kwitansi' => $namafile,
        ]);

        if($simpan){
            Session::flash('success', 'Data Berhasil Ditambahkan');
            return redirect('penjual/pengeluaran');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/pengeluaran/tambah');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)->first();
        return view('/penjual/pengeluaran/edit')
        ->with(compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'pengeluaran' => 'required',
            'deskripsi' => 'required',
            'foto_kwitansi' => 'required',
        ];

        $messages = [
            'pengeluaran.required'          => 'Pengeluaran wajib diisi',
            'deskripsi.required'          => 'Deskripsi wajib diisi',
            'foto_kwitansi.required'          => 'Foto Kwitansi wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $pengeluaran = Pengeluaran::where('id', $id)->first();

        unlink(public_path("foto_kwitansi/".$pengeluaran->foto_kwitansi));

        $file = $request->file('foto_kwitansi');
        $namaasli = pathinfo($file, PATHINFO_FILENAME);
        $depan = "Pengeluaran";
        $ekstensi = $file->getClientOriginalExtension();
        $namafile = $depan."_".$namaasli.".".$ekstensi;
        $tujuan_upload = 'foto_kwitansi';
        $file->move($tujuan_upload,$namafile);

        $pengeluaran->pengeluaran = $request->pengeluaran;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->foto_kwitansi = $namafile;
        $simpan = $pengeluaran->save();

        if($simpan){
            Session::flash('success', 'Data Berhasil Diedit');
            return redirect('penjual/pengeluaran');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/pengeluaran/tambah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::where('id',$id)->first();
        $pengeluaran->delete();
        unlink(public_path("foto_kwitansi/".$pengeluaran->foto_kwitansi));

        if($pengeluaran){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('penjual/pengeluaran');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/pengeluaran');
        }
    }

    public function search(Request $request)
    {
        $cari = $request->search;
        $hasilcari = $pengeluaran = Pengeluaran::where('created_at','LIKE','%'.$cari.'%')
        ->paginate(5);
        return view('/penjual/pengeluaran/index', ['pengeluaran' => $hasilcari]);
      }

      public function cetak()
    {
        $pengeluaran = Pengeluaran::all();
        $totalpengeluaran = Pengeluaran::sum('pengeluaran');
        $pdf = PDF::loadview('/penjual/pengeluaran/cetak',['pengeluaran'=>$pengeluaran,'totalpengeluaran'=>$totalpengeluaran]);
        return $pdf->stream();
    }
}
