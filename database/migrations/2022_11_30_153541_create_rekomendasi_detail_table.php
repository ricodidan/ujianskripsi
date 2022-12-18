<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasi_detail', function (Blueprint $table) {
            $table->id('id_rekomendasi_detail');
            $table->unsignedInteger('id_rekomendasi');
            $table->unsignedInteger('id_balita');
            $table->decimal('total_bobot');
            $table->string('nama_balita');
            $table->integer('ranking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekomendasi_detail');
    }
}
