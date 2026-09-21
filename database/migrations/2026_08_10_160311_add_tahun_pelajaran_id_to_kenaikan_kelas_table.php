<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTahunPelajaranIdToKenaikanKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('kenaikan_kelas', function (Blueprint $table) {
        $table->unsignedBigInteger('tahun_pelajaran_id')
            ->nullable()
            ->after('siswa_id');

        $table->foreign('tahun_pelajaran_id')
            ->references('id')
            ->on('tahun_pelajaran')
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
    Schema::table('kenaikan_kelas', function (Blueprint $table) {
        $table->dropForeign(['tahun_pelajaran_id']);
        $table->dropColumn('tahun_pelajaran_id');
    });
}
}
