<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('tahun_pelajaran', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('tahun_pelajaran', 9);
        $table->enum('semester', ['Ganjil', 'Genap']);
        $table->boolean('aktif')->default(false);
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
        Schema::dropIfExists('tahun_pelajaran');
    }
}
