<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    public function User()
      {
        return $this->belongsTo(User::class,'id_user');
      }

    protected $guard = 'pemasukans';

    protected $fillable = [
       'id_user','pemasukan','status'
    ];
}
