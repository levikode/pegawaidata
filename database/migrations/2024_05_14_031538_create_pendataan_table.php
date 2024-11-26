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
        Schema::create('pendataans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama');
            $table->string('agama');
            $table->string('jeniskelamin');
            $table->string('jabatan');
            $table->string('golongan');
            $table->string('pendidikan');
            $table->string('masakerja');
            $table->integer('nip');
            $table->integer('notlp');
            $table->integer('nik');
            $table->date('tmt');
            $table->integer('usia');
            $table->integer('masakerja');
            $table->string('alamat');
            $table->string('ttl');
            $table->timestamps();           
        });                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendataans');
    }
};
