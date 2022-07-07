<?php

namespace App\Http\Controllers;
use App\Models\StokIkan;
use App\Models\Masukan;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function Index () {
        $ikan = StokIkan::all()->take(3);
        return view('welcome')
        ->with(compact('ikan'));
    }

    public function listikan()
    {
        $ikan = StokIkan::all();
        return view('listikan')
        ->with(compact('ikan'));
    }



    public function about()
    {
        return view('about');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function masukan(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];

        $messages = [
            'name.required'          => 'Nama wajib diisi',
            'email.required'          => 'Email wajib diisi',
            'phone.required'          => 'Nomor Telepon wajib diisi',
            'subject.required'          => 'Subjek wajib diisi',
            'message.required'         => 'Pesan Wajib Di Isi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }


        $simpan = Masukan::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if($simpan){
            Session::flash('success', 'Pesan Telah Terkirim, Terima Kasih Sudah Memberi Saran !');
            return redirect('kontak');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('kontak');
        }
    }
}
