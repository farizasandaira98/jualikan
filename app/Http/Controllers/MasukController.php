<?php

namespace App\Http\Controllers;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MasukController extends Controller
{

    public function storepemasukan(Request $request)
    {
        $rules = [
            'harga_satuan' => 'required',
            'qty' => 'required',
            'id_user' => 'required',
        ];

        $messages = [
            'harga_satuan.required'   => 'Harga Satuan Kosong',
            'qty.required'            => 'Quantitiy wajib diisi',
            'id_user.required'            => 'User_ID wajib Kodong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $hargasatuan = $request->harga_satuan;
        $qty = $request->qty;

        $length1 = count($hargasatuan);

        for ($i = 0; $i < $length1; $i++) {
            $sum[] = $hargasatuan[$i] * $qty[$i];
        }

        $sumpemasukan = array_sum($sum);

        $simpan = Pemasukan::create([
            'id_user' => $request->id_user,
            'pemasukan' => $sumpemasukan,
            'status' => "Belum Masuk",
        ]);

        if($simpan){
            Session::flash('success', 'Data Telah Masuk, Admin akan konfirmasi jika sudah membayar, silahkan hubungi 081247574754');
            return redirect('/listikan');
        } else {
            Session::flash('errors', ['' => 'Terjadi Kesalahan...']);
            return redirect('/listikan');
        }
    }
}
