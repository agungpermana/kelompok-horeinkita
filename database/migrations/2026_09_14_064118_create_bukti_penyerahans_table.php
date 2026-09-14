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
        Schema::create('bukti_penyerahan', function (Blueprint $table) {
            // Primary Key
            $table->id();

            // Foreign Keys
            $table->foreignId('id_kupon')
                  ->constrained('kupon_digital', 'id_kupon')
                  ->onDelete('cascade');

            $table->foreignId('id_warung')
                  ->constrained('data_warung', 'id_warung')
                  ->onDelete('cascade');

            // Attributes
            $table->string('foto_bukti_url', 255)->nullable();
            $table->text('catatan_penyerahan')->nullable();
            $table->timestamp('tanggal_penyerahan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_penyerahan');
    }
};