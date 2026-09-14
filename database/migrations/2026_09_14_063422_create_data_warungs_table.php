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
        Schema::create('data_warung', function (Blueprint $table) {
            $table->id('id_warung');
            $table->foreignId('id_user')
                  ->constrained('data_user', 'id_user')
                  ->onDelete('cascade');
            $table->foreignId('id_survey')
                  ->nullable()
                  ->constrained('data_survey', 'id_survey')
                  ->onDelete('set null');
            $table->string('nama_warung', 100)->nullable();
            $table->string('lokasi_rw', 100)->nullable();
            $table->text('alamat_warung')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_warung');
    }
};
