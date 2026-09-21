<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\Mapel;
use App\Nilai;
use App\Rapot;
use App\Sikap;
use App\Siswa;
use App\Jadwal;
use App\Absensi;
use App\CatatanWali;
use App\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RapotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)
                        ->orderBy('kelas_id')
                        ->get();

        $kelas = $jadwal->groupBy('kelas_id');

        return view('guru.rapot.kelas', compact('kelas', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('admin.rapot.home', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $guru = Guru::findOrFail($request->guru_id);

    $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

    if (!$tahunPelajaran) {
        return response()->json([
            'error' => 'Belum ada tahun pelajaran yang aktif.'
        ], 422);
    }

    $cekJadwal = Jadwal::where('guru_id', $guru->id)
        ->where('kelas_id', $request->kelas_id)
        ->count();

    if ($cekJadwal >= 1) {

        $rapot = Rapot::updateOrCreate(
            [
                'siswa_id'           => $request->siswa_id,
                'kelas_id'           => $request->kelas_id,
                'guru_id'            => $request->guru_id,
                'mapel_id'           => $guru->mapel_id,
                'tahun_pelajaran_id' => $tahunPelajaran->id,
            ],
            [
                'p_nilai'      => $request->nilai,
                'p_predikat'   => $request->predikat,
                'p_deskripsi'  => $request->deskripsi,
            ]
        );

        return response()->json([
            'success' => 'Nilai rapot siswa berhasil ditambahkan!',
            'id' => $rapot->id
        ]);
    }

    return response()->json([
        'error' => 'Maaf guru ini tidak mengajar kelas ini!'
    ]);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $kelas = Kelas::findOrFail($id);

        $siswa = Siswa::where('kelas_id', $id)->get();

        return view('guru.rapot.rapot', compact(
            'guru',
            'kelas',
            'siswa'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);

        $kelas = Kelas::findOrFail($id);

        $siswa = Siswa::orderBy('nama_siswa')
            ->where('kelas_id', $id)
            ->get();

        return view('admin.rapot.index', compact(
            'kelas',
            'siswa'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, $id)
{
    $request->validate([
        'nilai' => 'required|numeric|min:0|max:100',
    ]);

    $rapot = Rapot::findOrFail($id);

    $guru = Guru::findOrFail($rapot->guru_id);

    $nilai = Nilai::where('guru_id', $guru->id)->first();

    if (!$nilai) {
        return response()->json([
            'error' => 'Data deskripsi nilai untuk guru ini belum tersedia.'
        ], 422);
    }

    if ($request->nilai > 90) {
        $predikat = 'A';
        $deskripsi = $nilai->deskripsi_a;
    } elseif ($request->nilai > 80) {
        $predikat = 'B';
        $deskripsi = $nilai->deskripsi_b;
    } elseif ($request->nilai > 60) {
        $predikat = 'C';
        $deskripsi = $nilai->deskripsi_c;
    } else {
        $predikat = 'D';
        $deskripsi = $nilai->deskripsi_d;
    }

    $rapot->update([
        'p_nilai' => $request->nilai,
        'p_predikat' => $predikat,
        'p_deskripsi' => $deskripsi,
    ]);

    return response()->json([
        'success' => 'Nilai rapot berhasil diperbarui!'
    ]);
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function rapot($id)
    {
        $id = Crypt::decrypt($id);
        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

if (!$tahunPelajaran) {
    return redirect()->back()->with('error', 'Belum ada tahun pelajaran yang aktif.');
}
        $siswa = Siswa::findOrFail($id);

        $kelas = Kelas::findOrFail($siswa->kelas_id);

        $jadwal = Jadwal::where('kelas_id', $kelas->id)
                        ->orderBy('mapel_id')
                        ->get();

        $mapel = $jadwal->groupBy('mapel_id');

        $sikap = Sikap::where('siswa_id', $siswa->id)
    ->where('kelas_id', $kelas->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->first();

$absensi = Absensi::where('siswa_id', $siswa->id)
    ->where('kelas_id', $kelas->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->first();

        // Ringkasan Nilai
        $jumlahMapel = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->count();

$totalNilai = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->sum('p_nilai');

$rataRata = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->avg('p_nilai');

        // Ranking Kelas
        $rankingData = [];

        $siswaKelas = Siswa::where('kelas_id', $kelas->id)->get();

        foreach ($siswaKelas as $item) {

            $rankingData[] = [
                'siswa_id'   => $item->id,
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
                return view('admin.rapot.show', compact(
            'mapel',
            'siswa',
            'kelas',
            'sikap',
            'absensi',
            'jumlahMapel',
            'totalNilai',
            'rataRata',
            'ranking',
            'jumlahSiswa'
        ));
    }

    public function predikat(Request $request)
    {
        $nilai = Nilai::where('guru_id', $request->id)->first();

        if ($request->nilai > 90) {

            $newForm[] = [
                'predikat' => 'A',
                'deskripsi' => $nilai->deskripsi_a,
            ];

        } elseif ($request->nilai > 80) {

            $newForm[] = [
                'predikat' => 'B',
                'deskripsi' => $nilai->deskripsi_b,
            ];

        } elseif ($request->nilai > 60) {

            $newForm[] = [
                'predikat' => 'C',
                'deskripsi' => $nilai->deskripsi_c,
            ];

        } else {

            $newForm[] = [
                'predikat' => 'D',
                'deskripsi' => $nilai->deskripsi_d,
            ];

        }

        return response()->json($newForm);
    }

    public function siswa()
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

if (!$tahunPelajaran) {
    return redirect()->back()->with('error', 'Belum ada tahun pelajaran yang aktif.');
}
        $kelas = Kelas::findOrFail($siswa->kelas_id);

        $sikap = Sikap::where('siswa_id', $siswa->id)
    ->where('kelas_id', $kelas->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->first();

$absensi = Absensi::where('siswa_id', $siswa->id)
    ->where('kelas_id', $kelas->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->first();

$catatan = CatatanWali::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->first();

        $jadwal = Jadwal::where('kelas_id', $kelas->id)
            ->orderBy('mapel_id')
            ->get();

        $mapel = $jadwal->groupBy('mapel_id');

        // Ringkasan Nilai
        $jumlahMapel = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->count();

$totalNilai = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->sum('p_nilai');

$rataRata = Rapot::where('siswa_id', $siswa->id)
    ->where('tahun_pelajaran_id', $tahunPelajaran->id)
    ->avg('p_nilai');

        // Ranking Kelas
        $rankingData = [];

        $siswaKelas = Siswa::where('kelas_id', $kelas->id)->get();

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

        return view('siswa.rapot', compact(
            'siswa',
            'kelas',
            'mapel',
            'sikap',
            'absensi',
            'catatan',
            'jumlahMapel',
            'totalNilai',
            'rataRata',
            'ranking',
            'jumlahSiswa'
        ));
    }
}