<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatatanWali extends Model
{
    protected $table = 'catatan_walis';

    protected $fillable = [
        'siswa_id',
        'guru_id',
        'tahun_pelajaran_id',
        'catatan'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function tahunPelajaran()
    {
        return $this->belongsTo('App\TahunPelajaran');
    }
}