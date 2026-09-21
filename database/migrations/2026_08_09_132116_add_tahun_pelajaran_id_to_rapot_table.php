<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTahunPelajaranIdToRapotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rapot', function (Blueprint $table) {
            $table->unsignedBigInteger('tahun_pelajaran_id')->nullable()->after('mapel_id');

            $table->foreign('tahun_pelajaran_id')
                  ->references('id')
                  ->on('tahun_pelajaran')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rapot', function (Blueprint $table) {
            $table->dropForeign(['tahun_pelajaran_id']);
            $table->dropColumn('tahun_pelajaran_id');
        });
    }
}