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
        Schema::create('tiket_penerbangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tujuan');
            $table->integer('waktu');
            $table->integer('jumlah_kursi');
            $table->integer('kursi_terbooking');
            $table->integer('kursi_tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_penerbangans');
    }
};
