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
        Schema::create('data_penerima', function (Blueprint $table) {
            // Primary Key
            $table->id('id_penerima');

            // Foreign Keys
            $table->foreignId('id_user')
                  ->constrained('data_user', 'id_user')
                  ->onDelete('cascade');

            $table->foreignId('id_survey')
                  ->nullable()
                  ->constrained('data_survey', 'id_survey')
                  ->onDelete('set null');

            // Atribut sesuai ERD
            $table->string('lokasi_rw', 10)->nullable();
            $table->text('alamat_penerima')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penerima');
    }
};