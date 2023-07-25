<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peralatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peralatan');
            $table->string('jenis_peralatan');
            $table->string('merk_peralatan');
            $table->string('produsen');
            $table->unsignedBigInteger('id_divisi');
            $table->date('tahun_pembuatan');
            $table->date('tahun_batas');
            $table->string('umur')->nullable();
            $table->string('kondisi');
            $table->timestamps();

            $table->foreign('id_divisi')->references('id')->on('divisis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peralatans');
    }
};
