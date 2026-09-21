<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKokurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('kokurikulers', function (Blueprint $table) {

    $table->increments('id');

    $table->unsignedBigInteger('siswa_id');

    $table->text('deskripsi');

    $table->timestamps();


    $table->foreign('siswa_id')
          ->references('id')
          ->on('siswa')
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
        Schema::dropIfExists('kokurikulers');
    }
}
