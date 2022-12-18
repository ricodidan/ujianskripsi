<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekomendasiDetailKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekomendasi_detail_kriteria', function (Blueprint $table) {
            $table->id('id_rekomendasi_detail_kriteria');
            $table->unsignedInteger('id_rekomendasi_detail');
            $table->string('nama_kriteria');
            $table->decimal('nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekomendasi_detail_kriteria');
    }
}
