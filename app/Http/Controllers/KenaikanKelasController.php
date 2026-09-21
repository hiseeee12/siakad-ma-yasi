<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Kelas;
use App\Siswa;
use App\KenaikanKelas;
use App\TahunPelajaran;
use Illuminate\Http\Request;

class KenaikanKelasController extends Controller
{
    public function index()
    {
        $guru = Guru::where(
            'id_card',
            Auth::user()->id_card
        )->first();

        $kelas = Kelas::where(
            'guru_id',
            $guru->id
        )->first();

        if (!$kelas) {
            return redirect()->back()
                ->with(
                    'error',
                    'Hanya wali kelas yang dapat mengisi kenaikan kelas.'
                );
        }

        $siswa = Siswa::where('kelas_id', $kelas->id)
            ->where('status', 'aktif')
            ->orderBy('nama_siswa')
            ->get();

        return view(
            'guru.kenaikan.index',
            compact('kelas', 'siswa')
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'status' => 'required|in:Naik Kelas,Tinggal Kelas,Lulus',
            'keterangan' => 'nullable|string',
        ]);

        $siswa = Siswa::findOrFail($request->siswa_id);

        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with(
                    'error',
                    'Belum ada tahun pelajaran yang aktif.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Tentukan kelas dan status siswa
        |--------------------------------------------------------------------------
        */

        if ($request->status == 'Naik Kelas') {

    $kelasSekarang = Kelas::find($siswa->kelas_id);

    if (!$kelasSekarang) {
        return redirect()->back()
            ->with('error', 'Kelas siswa tidak ditemukan.');
    }

    if ($kelasSekarang->nama_kelas == 'KELAS X') {

        $kelasBerikutnya = Kelas::where(
            'nama_kelas',
            'KELAS XI'
        )->first();

    } elseif ($kelasSekarang->nama_kelas == 'KELAS XI') {

        $kelasBerikutnya = Kelas::where(
            'nama_kelas',
            'KELAS XII'
        )->first();

    } else {

        return redirect()->back()
            ->with(
                'error',
                'Siswa Kelas XII tidak dapat dinaikkan lagi.'
            );
    }

    if (!$kelasBerikutnya) {
        return redirect()->back()
            ->with(
                'error',
                'Kelas tujuan tidak ditemukan.'
            );
    }

    $siswa->kelas_id = $kelasBerikutnya->id;

    $siswa->status = 'aktif';
}

        elseif ($request->status == 'Tinggal Kelas') {

            // Tetap di kelas sekarang
            $siswa->status = 'aktif';
        }

        elseif ($request->status == 'Lulus') {

            $siswa->status = 'lulus';
        }

        $siswa->save();


        /*
        |--------------------------------------------------------------------------
        | Simpan riwayat kenaikan kelas
        |--------------------------------------------------------------------------
        */

        KenaikanKelas::updateOrCreate(
    [
        'siswa_id' => $siswa->id,
        'tahun_pelajaran_id' => $tahunPelajaran->id,
    ],
    [
        'status' => $request->status,
        'keterangan' => $request->keterangan,
    ]
);


        return redirect()->back()
            ->with(
                'success',
                'Keputusan kenaikan kelas berhasil disimpan.'
            );
    }
}