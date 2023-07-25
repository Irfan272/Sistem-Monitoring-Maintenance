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
        Schema::create('perawatan_rutins', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('id_peralatan');
            $table->string('prioritas');
            $table->date('tanggal_pekerjaan');
            $table->string('keterangan');
            $table->unsignedBigInteger('id_teknisi');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_peralatan')->references('id')->on('peralatans')->onDelete('cascade');
            $table->foreign('id_teknisi')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perawatan_rutins');
    }
};
