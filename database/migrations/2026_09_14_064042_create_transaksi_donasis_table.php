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
        Schema::create('transaksi_donasi', function (Blueprint $table) {
            // Primary Key
            $table->id('id_transaksi');

            // Foreign Keys
            $table->foreignId('id_donatur')
                  ->constrained('data_user', 'id')
                  ->onDelete('cascade');

            $table->foreignId('id_penerima')
                  ->constrained('data_penerima', 'id_penerima')
                  ->onDelete('cascade');

            $table->foreignId('id_paket')
                  ->constrained('katalog_paket', 'id_paket')
                  ->onDelete('cascade');

            // Atribut sesuai ERD
            $table->integer('jumlah_paket');
            $table->decimal('total_bayar', 12, 2);
            $table->string('metode_pembayaran', 50);
            $table->string('status_pembayaran')->nullable(); // atau ->enum('status_pembayaran', ['...'])
            $table->timestamp('tanggal_transaksi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_donasi');
    }
};