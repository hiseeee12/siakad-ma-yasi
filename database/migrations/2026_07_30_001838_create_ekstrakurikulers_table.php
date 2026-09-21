<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkstrakurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('ekstrakurikulers', function (Blueprint $table) {

        $table->increments('id');

        $table->unsignedBigInteger('siswa_id');

        $table->string('kegiatan');

        $table->string('nilai')->nullable();

        $table->text('keterangan')->nullable();

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
        Schema::dropIfExists('ekstrakurikulers');
    }
}
