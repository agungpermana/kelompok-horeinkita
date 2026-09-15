<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom username, role, dan nomor_hp sudah didefinisikan di
        // 0001_01_01_000000_create_users_table.php.
        // Migration ini dipertahankan agar tidak merusak catatan
        // migration yang sudah berjalan sebelumnya.
    }

    public function down(): void
    {
        // Tidak ada yang perlu dihapus karena kolom dikelola
        // oleh migration pembuatan tabel data_user.
    }
};