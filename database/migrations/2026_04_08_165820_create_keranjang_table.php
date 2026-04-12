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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_obat');
            $table->double('jumlah_order');
            $table->double('harga');
            $table->double('subtotal');
            $table->timestamps();

            // relasi ke pelanggan
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->cascadeOnDelete()->cascadeOnUpdate();
            // relasi ke obat
            $table->foreign('id_obat')->references('id')->on('obat')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
