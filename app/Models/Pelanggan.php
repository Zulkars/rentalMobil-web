<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'no_hp',
        'email',
        'alamat',
        'no_sim',
    ];
}
