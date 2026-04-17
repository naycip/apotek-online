<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; 

    protected $fillable = [
        'nama_obat', 
        'idjenis', 
        'harga_jual', 
        'deskripsi_obat', 
        'foto1', 
        'foto2', 
        'foto3', 
        'stok'
    ];

    // Relasi ini HARUS di dalam class
    public function jenis_obat()
    {
        // Parameter kedua adalah 'idjenis' (Foreign Key di tabel obat)
        // Parameter ketiga adalah 'id' (Primary Key di tabel jenis_obat)
        return $this->belongsTo(JenisObat::class, 'idjenis');
    }
} // <--- Penutup class harus di sini