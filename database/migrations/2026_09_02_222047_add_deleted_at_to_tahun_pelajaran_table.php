<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToTahunPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('tahun_pelajaran', function ($table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('tahun_pelajaran', function ($table) {
        $table->dropSoftDeletes();
    });
}
}
