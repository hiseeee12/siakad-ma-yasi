<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Kelas;
use App\Siswa;
use App\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class PrestasiController extends Controller
{


    public function index()
    {

        $guru = Guru::where('id_card', Auth::user()->id_card)->first();


        $kelas = Kelas::where('guru_id',$guru->id)->first();


        if(!$kelas){

            return redirect()->back()
            ->with('error',
            'Hanya wali kelas yang dapat mengisi prestasi.');

        }


        $siswa = Siswa::where('kelas_id',$kelas->id)
                ->orderBy('nama_siswa')
                ->get();


        return view('guru.prestasi.index',
        compact('kelas','siswa','guru'));

    }




    public function show($id)
    {

        $id = Crypt::decrypt($id);


        $siswa = Siswa::findOrFail($id);


        $prestasi = Prestasi::where('siswa_id',$id)
                    ->get();


        return view('guru.prestasi.show',
        compact('siswa','prestasi'));

    }




    public function store(Request $request)
    {

        Prestasi::create([

            'siswa_id'=>$request->siswa_id,

            'prestasi'=>$request->prestasi,

            'keterangan'=>$request->keterangan

        ]);


        return redirect()->back()
        ->with('success',
        'Prestasi berhasil ditambahkan');

    }





    public function destroy($id)
    {

        $data = Prestasi::findOrFail($id);

        $data->delete();


        return redirect()->back();

    }


}