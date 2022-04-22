<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Penjual extends Authenticable
{
    use Notifiable;

    protected $guard = 'penjual';

    protected $fillable = [
        'name', 'email', 'username', 'password','email_verfied_at','no_telp','alamat'
    ];

    protected $hidden = ['password'];
}
