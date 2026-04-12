<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan');
            $table->string('no_invoice', 255);
            $table->dateTime('tgl_kirim')->nullable();
            $table->dateTime('tgl_tiba')->nullable();
            $table->enum('status_kirim', ['Sedang Dikirim','Tiba Di Tujuan']);
            $table->string('nama_kurir', 30);
            $table->string('telpon_kurir', 15);
            $table->string('bukti_foto', 255)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            // relasi ke penjualan
            $table->foreign('id_penjualan')->references('id')->on('penjualan')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
