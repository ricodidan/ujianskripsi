<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiDetailZscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasi_detail_zscore', function (Blueprint $table) {
            $table->id('id_rekomendasi_detail_zscore');
            $table->unsignedInteger('id_rekomendasi_detail');
            $table->string('nama_zscore');
            $table->decimal('bobot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekomendasi_detail_zscore');
    }
}
