<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRiwayatGolonganToPendataanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('pendataans', function (Blueprint $table) {
            $table->json('riwayat_golongan')->nullable()->after('golongan'); // Tambahkan kolom JSON
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('pendataans', function (Blueprint $table) {
            $table->dropColumn('riwayat_golongan');
        });
    }
}
