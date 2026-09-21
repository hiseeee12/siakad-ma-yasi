<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKenaikanKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('kenaikan_kelas', function (Blueprint $table) {

        $table->increments('id');

        $table->unsignedBigInteger('siswa_id');

        $table->enum('status', [
            'Naik Kelas',
            'Tinggal Kelas',
            'Lulus'
        ]);

        $table->text('keterangan')->nullable();

        $table->string('tahun_pelajaran')
              ->nullable();

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
        Schema::dropIfExists('kenaikan_kelas');
    }
}
