<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {

    $table->bigIncrements('id');

    $table->unsignedBigInteger('siswa_id');
    $table->unsignedBigInteger('kelas_id');

    $table->integer('sakit')->default(0);
    $table->integer('izin')->default(0);
    $table->integer('alpa')->default(0);

    $table->timestamps();

    $table->foreign('siswa_id')
          ->references('id')
          ->on('siswa')
          ->onDelete('cascade');

    $table->foreign('kelas_id')
          ->references('id')
          ->on('kelas')
          ->onDelete('cascade');

});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
