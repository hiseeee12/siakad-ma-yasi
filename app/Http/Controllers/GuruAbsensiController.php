<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Guru;
use App\Kelas;
use App\Siswa;
use App\Absensi;

class GuruAbsensiController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $waliKelas = Kelas::where('guru_id', $guru->id)->first();

        if (!$waliKelas) {
            return redirect()->back()->with('error', 'Maaf, hanya wali kelas yang dapat menginput absensi.');
        }

        $kelas = collect([$waliKelas]);

        return view('guru.absensi.index', compact('kelas', 'guru'));
    }

    public function show($id)
{
    $id = Crypt::decrypt($id);

    $guru = Guru::where('id_card', Auth::user()->id_card)->first();

    $kelas = Kelas::where('id', $id)
                  ->where('guru_id', $guru->id)
                  ->firstOrFail();

    $siswa = Siswa::where('kelas_id', $kelas->id)
                  ->orderBy('nama_siswa')
                  ->get();

    return view('guru.absensi.show', compact(
        'guru',
        'kelas',
        'siswa'
    ));
}

    public function store(Request $request)
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $cekWali = Kelas::where('id', $request->kelas_id)
                        ->where('guru_id', $guru->id)
                        ->exists();

        if (!$cekWali) {
            return response()->json([
                'error' => 'Maaf, hanya wali kelas yang dapat menginput absensi!'
            ]);
        }

        Absensi::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'siswa_id' => $request->siswa_id,
                'kelas_id' => $request->kelas_id,
                'sakit' => $request->sakit,
                'izin'  => $request->izin,
                'alpa'  => $request->alpa,
            ]
        );

        return response()->json([
            'success' => 'Absensi berhasil disimpan!'
        ]);
    }
}