<?php

namespace App\Http\Controllers;

use Auth;
use App\Mapel;
use App\Guru;
use App\Siswa;
use App\Kelas;
use App\Jadwal;
use App\Sikap;
use App\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use DB;

class SikapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $guru = Guru::where('id_card', Auth::user()->id_card)->first();

    $waliKelas = Kelas::where('guru_id', $guru->id)->first();

    if (!$waliKelas) {
        return redirect()->back()->with('error', 'Maaf, hanya wali kelas yang dapat mengisi nilai sikap.');
    }

    $kelas = collect([$waliKelas]);

    return view('guru.sikap.index', compact('kelas', 'guru'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.sikap.home', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $guru = Guru::where('id_card', Auth::user()->id_card)->first();

    $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

    if (!$tahunPelajaran) {
        return response()->json([
            'error' => 'Belum ada tahun pelajaran yang aktif.'
        ], 422);
    }

    $cekWali = Kelas::where('id', $request->kelas_id)
        ->where('guru_id', $guru->id)
        ->exists();

    if (!$cekWali) {
        return response()->json([
            'error' => 'Maaf, hanya wali kelas yang dapat mengisi nilai sikap!'
        ]);
    }

    Sikap::updateOrCreate(
        [
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'guru_id' => $guru->id,
            'tahun_pelajaran_id' => $tahunPelajaran->id
        ],
        [
            'mapel_id' => $guru->mapel_id,
            'sikap_1' => $request->sikap_1,
            'sikap_2' => $request->sikap_2,
            'sikap_3' => $request->sikap_3
        ]
    );

    return response()->json([
        'success' => 'Nilai sikap siswa berhasil ditambahkan!'
    ]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::where('kelas_id', $id)->get();
        return view('guru.sikap.show', compact('guru', 'kelas', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $kelas = Kelas::findorfail($id);
        $siswa = Siswa::orderBy('nama_siswa')->where('kelas_id', $id)->get();
        return view('admin.sikap.index', compact('kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sikap($id)
    {
        $id = Crypt::decrypt($id);
        $siswa = Siswa::findorfail($id);
        $kelas = Kelas::findorfail($siswa->kelas_id);
        $mapel = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->orWhere('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->get();
        return view('admin.sikap.show', compact('mapel', 'siswa', 'kelas'));
    }

    public function siswa()
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $kelas = Kelas::findorfail($siswa->kelas_id);
        $mapel = Mapel::where('nama_mapel', 'Pendidikan Agama dan Budi Pekerti')->orWhere('nama_mapel', 'Pendidikan Pancasila dan Kewarganegaraan')->get();
        return view('siswa.sikap', compact('siswa', 'kelas', 'mapel'));
    }
}
