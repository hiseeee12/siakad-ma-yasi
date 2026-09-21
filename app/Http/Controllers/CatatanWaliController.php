<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Guru;
use App\Kelas;
use App\CatatanWali;
use App\TahunPelajaran;

class CatatanWaliController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $kelas = Kelas::where('guru_id', $guru->id)->first();

        if (!$kelas) {
            return redirect()->back()->with('error', 'Maaf, hanya wali kelas yang dapat mengisi catatan.');
        }

        // Ambil tahun pelajaran yang sedang aktif
        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        $siswas = \App\Siswa::where('kelas_id', $kelas->id)->get();

        foreach ($siswas as $siswa) {
            $siswa->catatan = CatatanWali::firstOrNew([
                'siswa_id' => $siswa->id,
                'tahun_pelajaran_id' => $tahunPelajaran->id
            ]);
        }

        return view('guru.catatan.index', compact(
            'guru',
            'kelas',
            'siswas',
            'tahunPelajaran'
        ));
    }

    public function store(Request $request)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        // Ambil tahun pelajaran yang sedang aktif
        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        CatatanWali::updateOrCreate(
            [
                'siswa_id' => $request->siswa_id,
                'tahun_pelajaran_id' => $tahunPelajaran->id
            ],
            [
                'guru_id' => $guru->id,
                'catatan' => $request->catatan
            ]
        );

        return redirect()->back()->with('success', 'Catatan wali kelas berhasil disimpan.');
    }
}