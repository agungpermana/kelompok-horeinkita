<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_user', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('id_user');

            $table->enum('role', ['admin', 'donatur', 'warung', 'penerima'])
                ->default('donatur')
                ->after('password');

            $table->string('nomor_hp', 20)
                ->nullable()
                ->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('data_user', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'role',
                'nomor_hp'
            ]);
        });
    }
};