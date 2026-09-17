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
        Schema::table('data_penerima', function (Blueprint $table) {
            $table->unique('id_survey', 'data_penerima_id_survey_unique');
        });

        Schema::table('data_warung', function (Blueprint $table) {
            $table->unique('id_survey', 'data_warung_id_survey_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_penerima', function (Blueprint $table) {
            $table->dropUnique('data_penerima_id_survey_unique');
        });

        Schema::table('data_warung', function (Blueprint $table) {
            $table->dropUnique('data_warung_id_survey_unique');
        });
    }
};