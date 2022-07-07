<?php

namespace App\Http\Controllers;

use App\Models\StokIkan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class StokIkanController extends Controller
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
        $stokikan = StokIkan::paginate(5);
        return view('/penjual/stokikan/index')
        ->with(compact('stokikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/penjual/stokikan/tambah');
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
            'jenis_ikan' => 'required',
            'jumlah_ikan' => 'required',
            'harga_satuan' => 'required'
        ];

        $messages = [
            'jenis_ikan.required'          => 'Jenis ikan wajib diisi',
            'jumlah_ikan.required'          => 'Jumlah ikan wajib diisi',
            'harga_satuan.required'          => 'Harga satuan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $this->validate($request,[
            'jenis_ikan' => 'required',
            'jumlah_ikan' => 'required',
            'harga_satuan' => 'required'
        ]);

        $simpan = StokIkan::create([
            'jenis_ikan' => $request->jenis_ikan,
            'jumlah_ikan' => $request->jumlah_ikan,
            'harga_satuan' => $request->harga_satuan
        ]);

        if($simpan){
            Session::flash('success', 'Data Berhasil Ditambahkan');
            return redirect('penjual/ikan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/ikan/tambah');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokIkan  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stokikan = StokIkan::where('id', $id)->first();
        return view('/penjual/stokikan/edit')
        ->with(compact('stokikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokIkan  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'jenis_ikan' => 'required',
            'jumlah_ikan' => 'required',
            'harga_satuan' => 'required'
        ];

        $messages = [
            'jenis_ikan.required'          => 'Jenis ikan wajib diisi',
            'jumlah_ikan.required'          => 'Jumlah ikan wajib diisi',
            'harga_satuan.required'          => 'Harga satuan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $stokikan = StokIkan::where('id', $id)->first();
        $stokikan->jenis_ikan = $request->jenis_ikan;
        $stokikan->jumlah_ikan = $request->jumlah_ikan;
        $stokikan->harga_satuan = $request->harga_satuan;
        $simpan = $stokikan->save();

        if($simpan){
            Session::flash('success', 'Data Berhasil Diedit');
            return redirect('penjual/ikan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/ikan/tambah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokIkan  $stokIkan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stokikan = StokIkan::where('id',$id)->first();
        $stokikan->delete();

        if($stokikan){
            Session::flash('success', 'Data Berhasil Dihapus');
            return redirect('penjual/ikan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('penjual/ikan');
        }
    }

    public function search(Request $request)
    {
        $cari = $request->search;
        $hasilcari = $stokikan = StokIkan::where('jenis_ikan','LIKE','%'.$cari.'%')
        ->paginate(5);

        return view('/penjual/stokikan/index', ['stokikan' => $hasilcari]);
      }
}
