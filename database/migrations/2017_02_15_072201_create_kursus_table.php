<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->date('tarikh_mula')->nullable();
            $table->date('tarikh_tamat')->nullable();
            $table->time('masa_mula')->nullable();
            $table->time('masa_tamat')->nullable();
            $table->string('lokasi');
            $table->decimal('harga', 8, 2);
            $table->integer('kuota');
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
        Schema::dropIfExists('kursus');
    }
}
