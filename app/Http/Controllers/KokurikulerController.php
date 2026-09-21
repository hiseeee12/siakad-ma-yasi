<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Kelas;
use App\Siswa;
use App\Kokurikuler;
use Illuminate\Http\Request;

class KokurikulerController extends Controller
{

    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();

        $waliKelas = Kelas::where('guru_id', $guru->id)->first();


        if (!$waliKelas) {
            return redirect()->back()
                ->with('error', 'Maaf, hanya wali kelas yang dapat mengisi kokurikuler.');
        }


        $kelas = $waliKelas;


        $siswa = Siswa::where('kelas_id', $kelas->id)
                ->orderBy('nama_siswa')
                ->get();


        return view(
            'guru.kokurikuler.index',
            compact('guru','kelas','siswa')
        );
    }



    public function store(Request $request)
    {

        $guru = Guru::where('id_card', Auth::user()->id_card)->first();


        $cekWali = Kelas::where('id',$request->kelas_id)
            ->where('guru_id',$guru->id)
            ->exists();


        if(!$cekWali)
        {
            return response()->json([
                'error'=>'Maaf, hanya wali kelas yang dapat mengisi kokurikuler!'
            ]);
        }



        Kokurikuler::updateOrCreate(

            [
                'siswa_id'=>$request->siswa_id
            ],

            [
                'deskripsi'=>$request->deskripsi
            ]

        );


        return response()->json([
            'success'=>'Data kokurikuler berhasil disimpan!'
        ]);

    }

}