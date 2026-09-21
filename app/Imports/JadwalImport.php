<?php

namespace App\Imports;

use App\Jadwal;
use App\Hari;
use App\Kelas;
use App\Mapel;
use App\Guru;
use App\Ruang;
use Maatwebsite\Excel\Concerns\ToModel;

class JadwalImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    $hari = Hari::where('nama_hari', trim($row[0]))->first();
    $kelas = Kelas::where('nama_kelas', trim($row[1]))->first();
    $mapel = Mapel::where('nama_mapel', trim($row[2]))->first();
    $guru = Guru::where('nama_guru', trim($row[3]))->first();
    $ruang = Ruang::where('nama_ruang', trim($row[6]))->first();

    if (!$hari) {
        dd('Hari tidak ditemukan', $row);
    }

    if (!$kelas) {
        dd('Kelas tidak ditemukan', $row);
    }

    if (!$mapel) {
        dd('Mapel tidak ditemukan', $row);
    }

    if (!$guru) {
        dd('Guru tidak ditemukan', $row);
    }

    if (!$ruang) {
        dd('Ruang tidak ditemukan', $row);
    }

    return new Jadwal([
        'hari_id' => $hari->id,
        'kelas_id' => $kelas->id,
        'mapel_id' => $mapel->id,
        'guru_id' => $guru->id,
        'jam_mulai' => $row[4],
        'jam_selesai' => $row[5],
        'ruang_id' => $ruang->id,
    ]);
}
}
