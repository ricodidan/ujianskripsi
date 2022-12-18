<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntropometriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antropometri', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_kriteria_1');
            $table->unsignedInteger('id_kriteria_2');
            $table->string('jenis_kelamin');
            $table->decimal('nilai_kriteria');
            $table->decimal('-1sd');
            $table->decimal('median');
            $table->decimal('1sd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antropometri');
    }
}
