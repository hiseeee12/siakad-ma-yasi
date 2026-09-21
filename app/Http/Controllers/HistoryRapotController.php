<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Rapot;
use App\TahunPelajaran;
use App\Sikap;
use App\Absensi;
use App\CatatanWali;
use App\Kelas;
use App\Jadwal;
use Illuminate\Http\Request;

class HistoryRapotController extends Controller
{
    /**
     * Daftar siswa
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();

        return view(
            'admin.history_rapot.index',
            compact('siswa')
        );
    }

    /**
     * Menampilkan history rapot siswa
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);

        $history = Rapot::where('siswa_id', $siswa->id)
            ->with([
                'tahunPelajaran',
                'kelas',
                'mapel'
            ])
            ->get()
            ->groupBy('tahun_pelajaran_id');

        return view(
            'admin.history_rapot.show',
            compact('siswa', 'history')
        );
    }

    /**
     * Menampilkan rapot berdasarkan tahun pelajaran
     */
    public function rapot($id, $tahunPelajaranId)
    {
        $siswa = Siswa::findOrFail($id);

        $tahunPelajaran = TahunPelajaran::findOrFail($tahunPelajaranId);

        /*
        |--------------------------------------------------------------------------
        | Ambil kelas siswa
        |--------------------------------------------------------------------------
        */
        $kelas = Kelas::findOrFail($siswa->kelas_id);

        /*
        |--------------------------------------------------------------------------
        | Ambil jadwal berdasarkan kelas
        |--------------------------------------------------------------------------
        */
        $jadwal = Jadwal::where('kelas_id', $kelas->id)
            ->orderBy('mapel_id')
            ->get();

        $mapel = $jadwal->groupBy('mapel_id');

        /*
        |--------------------------------------------------------------------------
        | Sikap
        |--------------------------------------------------------------------------
        */
        $sikap = Sikap::where('siswa_id', $siswa->id)
            ->where('kelas_id', $kelas->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Absensi
        |--------------------------------------------------------------------------
        */
        $absensi = Absensi::where('siswa_id', $siswa->id)
            ->where('kelas_id', $kelas->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Catatan Wali Kelas
        |--------------------------------------------------------------------------
        */
        $catatan = CatatanWali::where('siswa_id', $siswa->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Jumlah Mata Pelajaran
        |--------------------------------------------------------------------------
        */
        $jumlahMapel = Rapot::where('siswa_id', $siswa->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Total Nilai
        |--------------------------------------------------------------------------
        */
        $totalNilai = Rapot::where('siswa_id', $siswa->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->sum('p_nilai');

        /*
        |--------------------------------------------------------------------------
        | Rata-rata Nilai
        |--------------------------------------------------------------------------
        */
        $rataRata = Rapot::where('siswa_id', $siswa->id)
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->avg('p_nilai');

        /*
        |--------------------------------------------------------------------------
        | Ranking
        |--------------------------------------------------------------------------
        */
        $siswaKelas = Siswa::where('kelas_id', $kelas->id)->get();

        $rankingData = [];

        foreach ($siswaKelas as $item) {

            $rankingData[] = [
                'siswa_id' => $item->id,

                'rata_rata' => Rapot::where('siswa_id', $item->id)
                    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
                    ->avg('p_nilai')
            ];
        }

        usort($rankingData, function ($a, $b) {

            return $b['rata_rata'] <=> $a['rata_rata'];
        });

        $ranking = '-';

        foreach ($rankingData as $index => $row) {

            if ($row['siswa_id'] == $siswa->id) {

                $ranking = $index + 1;

                break;
            }
        }

        $jumlahSiswa = count($rankingData);

        /*
        |--------------------------------------------------------------------------
        | Kirim data ke view
        |--------------------------------------------------------------------------
        */
        return view(
            'admin.history_rapot.rapot',
            compact(
                'siswa',
                'kelas',
                'mapel',
                'sikap',
                'absensi',
                'catatan',
                'tahunPelajaran',
                'jumlahMapel',
                'totalNilai',
                'rataRata',
                'ranking',
                'jumlahSiswa'
            )
        );
    }
}