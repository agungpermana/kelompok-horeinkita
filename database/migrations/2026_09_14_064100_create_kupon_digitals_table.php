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
        Schema::create('kupon_digital', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Key ke tabel transaksi_donasi
            $table->foreignId('id_transaksi')
                  ->constrained('transaksi_donasi', 'id_transaksi')
                  ->onDelete('cascade');

            // Atribut sesuai ERD
            $table->string('kode_kupon', 50);
            $table->string('status_kupon')->nullable(); // Boleh diganti ->enum('status_kupon', ['aktif', 'terpakai', 'kadaluarsa']) jika nilai enum sudah ditentukan
            $table->timestamp('tanggal_diterbitkan')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kupon_digital');
    }
};