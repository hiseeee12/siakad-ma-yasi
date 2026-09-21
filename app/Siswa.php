<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\TahunPelajaran;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'no_induk',
    'nis',
    'nama_siswa',
    'kelas_id',
    'status',
    'jk',
    'telp',
    'tmp_lahir',
    'tgl_lahir',
    'foto'
];
    public function kelas()
    {
        return $this->belongsTo('App\Kelas')->withDefault();
    }

    public function ulangan($id)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = Ulangan::where('siswa_id', $id)->where('guru_id', $guru->id)->first();
        return $nilai;
    }

    public function kokurikuler()
    {
    return $this->hasOne(Kokurikuler::class);
    }

    public function ekstrakurikuler()
{
    return $this->hasMany(Ekstrakurikuler::class);
}
public function prestasi()
{
    return $this->hasMany(Prestasi::class);
}
public function kenaikanKelas()
{
    $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

    if (!$tahunPelajaran) {
        return $this->hasOne(KenaikanKelas::class)
            ->whereRaw('1 = 0');
    }

    return $this->hasOne(KenaikanKelas::class)
        ->where('tahun_pelajaran_id', $tahunPelajaran->id);
}
    public function sikap($id)
{
    $guru = Guru::where('id_card', Auth::user()->id_card)->first();

    $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

    if (!$tahunPelajaran) {
        return null;
    }

    $nilai = Sikap::where('siswa_id', $id)
        ->where('guru_id', $guru->id)
        ->where('tahun_pelajaran_id', $tahunPelajaran->id)
        ->first();

    return $nilai;
}

    public function nilai($id)
{
    $guru = Guru::where('id_card', Auth::user()->id_card)->first();

    $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

    if (!$tahunPelajaran) {
        return null;
    }

    $nilai = Rapot::where('siswa_id', $id)
        ->where('guru_id', $guru->id)
        ->where('tahun_pelajaran_id', $tahunPelajaran->id)
        ->first();

    return $nilai;
}

    protected $table = 'siswa';
}