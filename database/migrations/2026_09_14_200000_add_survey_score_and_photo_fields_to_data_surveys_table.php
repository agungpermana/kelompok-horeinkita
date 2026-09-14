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
        Schema::table('data_survey', function (Blueprint $table) {
            $table->date('tanggal_survey')->nullable()->after('jenis_survey');
            $table->string('kelurahan')->nullable()->after('lokasi_rw');
            $table->integer('skor_kelayakan')->nullable()->after('status_kelayakan');
            $table->string('foto_lokasi_url')->nullable()->after('catatan_survey');
            $table->string('foto_identitas_url')->nullable()->after('foto_lokasi_url');
            $table->string('foto_dokumen_url')->nullable()->after('foto_identitas_url');

            $table->text('alamat_lengkap')->nullable()->change();
            $table->text('catatan_survey')->nullable()->change();
            $table->string('status_kelayakan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_survey', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_survey',
                'kelurahan',
                'skor_kelayakan',
                'foto_lokasi_url',
                'foto_identitas_url',
                'foto_dokumen_url',
            ]);
        });
    }
};