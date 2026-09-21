<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('catatan_walis', function (Blueprint $table) {

        $table->bigIncrements('id');

        $table->unsignedBigInteger('kelas_id');
        $table->unsignedBigInteger('guru_id');

        $table->text('catatan');

        $table->timestamps();

        $table->foreign('kelas_id')
              ->references('id')
              ->on('kelas')
              ->onDelete('cascade');

        $table->foreign('guru_id')
              ->references('id')
              ->on('guru')
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
        Schema::dropIfExists('catatan_walis');
    }
}
