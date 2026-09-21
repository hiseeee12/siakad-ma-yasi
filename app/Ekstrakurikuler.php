<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{

    protected $fillable = [
        'siswa_id',
        'kegiatan',
        'nilai',
        'keterangan'
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}