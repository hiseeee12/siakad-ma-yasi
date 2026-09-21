<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Kelas;
use App\Siswa;
use App\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkstrakurikulerController extends Controller
{

    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $kelas = Kelas::where('guru_id', $guru->id)->first();


        if(!$kelas){
            return redirect()->back()
            ->with('error','Hanya wali kelas yang dapat mengisi ekstrakurikuler.');
        }


        $siswa = Siswa::where('kelas_id',$kelas->id)
                ->orderBy('nama_siswa')
                ->get();


        return view('guru.ekstrakurikuler.index',
        compact('kelas','siswa','guru'));

    }



    public function show($id)
    {
        $id = Crypt::decrypt($id);


        $siswa = Siswa::findOrFail($id);


        $ekstrakurikuler = Ekstrakurikuler::where('siswa_id',$id)
                            ->get();


        return view('guru.ekstrakurikuler.show',
        compact('siswa','ekstrakurikuler'));

    }



    public function store(Request $request)
    {

        Ekstrakurikuler::create([

            'siswa_id'=>$request->siswa_id,

            'kegiatan'=>$request->kegiatan,

            'nilai'=>$request->nilai,

            'keterangan'=>$request->keterangan

        ]);


        return redirect()->back()
        ->with('success',
        'Data ekstrakurikuler berhasil ditambahkan');

    }



    public function destroy($id)
    {

        $data = Ekstrakurikuler::findOrFail($id);

        $data->delete();


        return redirect()->back();

    }

}