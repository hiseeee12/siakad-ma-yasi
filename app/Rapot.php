<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapot extends Model
{
    protected $table = 'rapot';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'guru_id',
        'mapel_id',
        'tahun_pelajaran_id',
        'p_nilai',
        'p_predikat',
        'p_deskripsi'
    ];

    public function tahunPelajaran()
    {
        return $this->belongsTo('App\TahunPelajaran');
    }
    
    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'kelas_id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'mapel_id');
    }


}