<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KenaikanKelas extends Model
{

    protected $table = 'kenaikan_kelas';


    protected $fillable = [
        'siswa_id',
        'status',
        'keterangan',
        'tahun_pelajaran',
        'tahun_pelajaran_id',
    ];



    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}