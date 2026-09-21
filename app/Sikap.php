<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    protected $table = 'sikap';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'guru_id',
        'mapel_id',
        'tahun_pelajaran_id',
        'sikap_1',
        'sikap_2',
        'sikap_3'
    ];

    public function tahunPelajaran()
    {
        return $this->belongsTo('App\TahunPelajaran');
    }
}