<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunPelajaran extends Model
{
    use SoftDeletes;

    protected $table = 'tahun_pelajaran';

    protected $fillable = [
        'tahun_pelajaran',
        'semester',
        'aktif'
    ];
    
    protected $dates = [
        'deleted_at'
    ];

    public function catatanWalis()
    {
        return $this->hasMany('App\CatatanWali');
    }

    public function rapot()
    {
        return $this->hasMany('App\Rapot');
    }

    public function sikap()
    {
        return $this->hasMany('App\Sikap');
    }

    public function absensi()
    {
        return $this->hasMany('App\Absensi');
    }
}