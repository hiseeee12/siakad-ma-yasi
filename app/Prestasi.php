<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{

    protected $fillable = [
        'siswa_id',
        'prestasi',
        'keterangan'
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}