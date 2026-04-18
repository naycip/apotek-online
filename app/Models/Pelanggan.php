<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_pelanggan', 'email', 'katakunci', 'no_telp', 
        'alamat1', 'kota1', 'propinsi1', 'kodepos1',
        'alamat2', 'kota2', 'propinsi2', 'kodepos2',
        'alamat3', 'kota3', 'propinsi3', 'kodepos3',
        'foto', 'url_ktp'
        // Alamat 2 dan 3 bisa ditambah jika diperlukan nanti
    ];
    protected $hidden = [
        'katakunci',
    ];

    public function getAuthPassword()
    {
        return $this->katakunci;
    }
}
