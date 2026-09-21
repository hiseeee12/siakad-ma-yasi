<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kokurikuler extends Model
{
    protected $fillable = [
        'siswa_id',
        'deskripsi'
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}