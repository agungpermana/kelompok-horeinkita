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
        Schema::create('riwayat_penyaluran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bukti');
            $table->string('status_penyaluran')->nullable(); 
            $table->text('keterangan')->nullable();
            $table->timestamp('waktu_pencatatan')->nullable();
            $table->timestamps();
            $table->foreign('id_bukti')
                  ->references('id_bukti')
                  ->on('bukti_penyerahan')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyaluran');
    }
};