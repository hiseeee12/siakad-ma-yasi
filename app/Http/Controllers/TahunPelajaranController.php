<?php

namespace App\Http\Controllers;
use App\TahunPelajaran;
use Illuminate\Http\Request;

class TahunPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $tahunPelajaran = TahunPelajaran::orderBy('tahun_pelajaran', 'desc')
        ->orderBy('semester')
        ->get();

    return view('admin.tahun_pelajaran.index', compact('tahunPelajaran'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('admin.tahun_pelajaran.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'tahun_pelajaran' => 'required|string|size:9',
        'semester' => 'required|in:Ganjil,Genap',
    ]);

    $cek = TahunPelajaran::where('tahun_pelajaran', $request->tahun_pelajaran)
        ->where('semester', $request->semester)
        ->first();

    if ($cek) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Tahun pelajaran dan semester tersebut sudah ada!');
    }

    TahunPelajaran::create([
        'tahun_pelajaran' => $request->tahun_pelajaran,
        'semester' => $request->semester,
        'aktif' => 0,
    ]);

    return redirect()
        ->route('tahun-pelajaran.index')
        ->with('success', 'Tahun pelajaran berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $tahunPelajaran = TahunPelajaran::findOrFail($id);

    return view('admin.tahun_pelajaran.edit', compact('tahunPelajaran'));
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
    $request->validate([
        'tahun_pelajaran' => 'required|string|size:9',
        'semester' => 'required|in:Ganjil,Genap',
    ]);

    $tahunPelajaran = TahunPelajaran::findOrFail($id);

    $cek = TahunPelajaran::where('tahun_pelajaran', $request->tahun_pelajaran)
        ->where('semester', $request->semester)
        ->where('id', '!=', $id)
        ->first();

    if ($cek) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Tahun pelajaran dan semester tersebut sudah ada!');
    }

    $tahunPelajaran->update([
        'tahun_pelajaran' => $request->tahun_pelajaran,
        'semester' => $request->semester,
    ]);

    return redirect()
        ->route('tahun-pelajaran.index')
        ->with('success', 'Tahun pelajaran berhasil diperbarui!');
}

    public function aktifkan($id)
{
    // Nonaktifkan semua tahun pelajaran
    TahunPelajaran::where('aktif', 1)->update([
        'aktif' => 0
    ]);

    // Aktifkan tahun pelajaran yang dipilih
    $tahunPelajaran = TahunPelajaran::findOrFail($id);

    $tahunPelajaran->update([
        'aktif' => 1
    ]);

    return redirect()
        ->route('tahun-pelajaran.index')
        ->with('success', 'Tahun pelajaran berhasil diaktifkan!');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $tahunPelajaran = TahunPelajaran::findOrFail($id);

    if ($tahunPelajaran->aktif == 1) {
        return redirect()
            ->route('tahun-pelajaran.index')
            ->with('error', 'Tahun pelajaran yang sedang aktif tidak dapat dihapus!');
    }

    $tahunPelajaran->delete();

    return redirect()
        ->route('tahun-pelajaran.index')
        ->with('warning', 'Tahun pelajaran berhasil dipindahkan ke Trash!');
}

public function trash()
{
    $tahunPelajaran = TahunPelajaran::onlyTrashed()
        ->orderBy('tahun_pelajaran', 'desc')
        ->orderBy('semester')
        ->get();

    return view('admin.tahun_pelajaran.trash', compact('tahunPelajaran'));
}

public function restore($id)
{
    $tahunPelajaran = TahunPelajaran::withTrashed()->findOrFail($id);

    $tahunPelajaran->restore();

    return redirect()
        ->route('tahun-pelajaran.trash')
        ->with('info', 'Tahun pelajaran berhasil direstore!');
}

public function kill($id)
{
    $tahunPelajaran = TahunPelajaran::withTrashed()
        ->findOrFail($id);

    $tahunPelajaran->forceDelete();

    return redirect()
        ->back()
        ->with('success', 'Tahun pelajaran berhasil dihapus secara permanen!');
}

}
