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
        Schema::create('katalog_paket', function (Blueprint $table) {
            $table->id('id_paket');
            $table->foreignId('id_warung')
                  ->constrained('data_warung', 'id_warung')
                  ->onDelete('cascade');
            $table->string('nama_paket', 255);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_paket');
    }
};
