<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKirim extends Model
{
    // SESUAIKAN DENGAN GAMBAR KAMU:
    protected $table = 'jenis_pengiriman'; 

    protected $fillable = ['jenis_kirim', 'nama_ekspedisi', 'logo_ekspedisi'];
}