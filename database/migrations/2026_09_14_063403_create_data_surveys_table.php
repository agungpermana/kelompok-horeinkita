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
        Schema::create('data_survey', function (Blueprint $table) {
            $table->id('id_survey');
            $table->string('nama_subjek');
            $table->string('jenis_survey');
            $table->string('lokasi_rw');
            $table->text('alamat_lengkap');
            $table->string('nomor_telepon');
            $table->string('status_kelayakan');
            $table->string('catatan_survey');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_survey');
    }
};
