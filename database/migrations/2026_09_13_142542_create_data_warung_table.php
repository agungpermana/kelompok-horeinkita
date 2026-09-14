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

        $table->unsignedBigInteger('id_user');
        $table->integer('id_survey')->nullable();

        $table->string('nama_warung', 100);
        $table->string('lokasi_rw', 10);
        $table->text('alamat_warung');
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

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::dropIfExists('data_warung');
}
};
