<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Siswa;
use App\Kelas;
use App\TahunPelajaran;

class AbsensiController extends Controller
{
    public function index()
    {
        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        $absensis = Absensi::with(['siswa', 'kelas'])
            ->where('tahun_pelajaran_id', $tahunPelajaran->id)
            ->get();

        return view('admin.absensi.index', compact(
            'absensis',
            'tahunPelajaran'
        ));
    }


    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        return view('admin.absensi.create', compact(
            'siswa',
            'kelas',
            'tahunPelajaran'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'sakit' => 'required|integer',
            'izin' => 'required|integer',
            'alpa' => 'required|integer',
        ]);

        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        Absensi::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_pelajaran_id' => $tahunPelajaran->id,
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'alpa' => $request->alpa,
        ]);

        return redirect('/absensi')
            ->with('success', 'Data absensi berhasil ditambahkan');
    }


    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);

        $siswa = Siswa::all();
        $kelas = Kelas::all();

        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        return view('admin.absensi.edit', compact(
            'absensi',
            'siswa',
            'kelas',
            'tahunPelajaran'
        ));
    }


    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);

        $tahunPelajaran = TahunPelajaran::where('aktif', 1)->first();

        if (!$tahunPelajaran) {
            return redirect()->back()
                ->with('error', 'Belum ada tahun pelajaran yang aktif.');
        }

        $absensi->update([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_pelajaran_id' => $tahunPelajaran->id,
            'sakit' => $request->sakit,
            'izin' => $request->izin,
            'alpa' => $request->alpa,
        ]);

        return redirect('/absensi')
            ->with('success', 'Data absensi berhasil diperbarui');
    }


    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect('/absensi')
            ->with('success', 'Data absensi berhasil dihapus');
    }
}

