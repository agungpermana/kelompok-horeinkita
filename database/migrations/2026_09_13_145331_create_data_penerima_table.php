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
            $table->id('id_penerima');

            $table->unsignedBigInteger('id_user');
            $table->integer('id_survey')->nullable();

            $table->string('nama_penerima', 100);
            $table->string('lokasi_rw', 10);
            $table->text('alamat_penerima');
            $table->string('nomor_telepon', 20)->nullable();
            $table->enum('status_penerima', [
                'aktif',
                'tidak_aktif'
            ])->default('aktif');

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_survey')
                ->references('id_survey')
                ->on('data_survey')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_penerima');
    }
};
