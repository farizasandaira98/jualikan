<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokIkan extends Model
{
    use HasFactory;

    protected $guard = 'stok_ikans';

    protected $fillable = [
        'jenis_ikan', 'jumlah_ikan', 'harga_satuan'
    ];
}
