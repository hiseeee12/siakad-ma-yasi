<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSiswaTable extends Migration
{
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'lulus', 'keluar'])
                ->default('aktif')
                ->after('kelas_id');
        });
    }

    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}