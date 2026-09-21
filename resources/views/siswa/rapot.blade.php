@extends('template_backend.home')

@section('heading','Rapor Siswa')

@section('page')
<li class="breadcrumb-item active">Rapor</li>
@endsection

@section('content')

<style>

body{
    background:#f3f3f3;
}

#rapor{
    width:210mm;
    min-height:297mm;
    margin:20px auto;
    background:#fff;
    padding:18mm;
    color:#000;
    font-family:"Times New Roman",Times,serif;
    box-sizing:border-box;
}

@page{
    size:A4 portrait;
    margin:12mm;
}

@media print{

body *{
visibility:hidden;
}

#rapor,
#rapor *{
visibility:visible;
}

#rapor{
position:absolute;
left:0;
top:0;
margin:0;
width:210mm;
border:none;
}

.no-print{
display:none!important;
}

}

#rapor{
border:1px solid #999;
}

table{
width:100%;
border-collapse:collapse;
}

td,th{
font-size:12px;
}

.text-center{
text-align:center;
}

.text-right{
text-align:right;
}

.text-bold{
font-weight:bold;
}

.mt-5{
margin-top:5px;
}

.mt-10{
margin-top:10px;
}

.mt-15{
margin-top:15px;
}

.mt-20{
margin-top:20px;
}

.mb-5{
margin-bottom:5px;
}

.mb-10{
margin-bottom:10px;
}

.mb-15{
margin-bottom:15px;
}

.header-table td{
border:none;
vertical-align:middle;
}

.logo{
width:78px;
}

.logo img{
width:75px;
height:75px;
object-fit:contain;
}

.nama-instansi{
font-size:17px;
font-weight:bold;
text-transform:uppercase;
}

.sub-instansi{
font-size:15px;
font-weight:bold;
}

.alamat{
font-size:12px;
}

.garis{
border-top:3px solid #000;
border-bottom:1px solid #000;
height:4px;
margin-top:8px;
margin-bottom:12px;
}

.judul{
font-size:17px;
font-weight:bold;
text-align:center;
margin-bottom:15px;
text-transform:uppercase;
}

.identitas td{
padding:2px 0;
border:none;
font-size:12px;
}

.identitas .kiri{
width:27%;
}

.identitas .titik{
width:2%;
}

.identitas .isi{
width:21%;
}

.identitas .kanan{
width:22%;
}

.identitas .isi-kanan{
width:28%;
}

.section-title{

font-size:13px;

font-weight:bold;

margin-top:18px;

margin-bottom:6px;

}

.nilai-table{

margin-top:8px;

}

.nilai-table th{

border:1px solid #000;

padding:5px;

font-size:12px;

background:#efefef;

}

.nilai-table td{

border:1px solid #000;

padding:5px;

vertical-align:top;

font-size:12px;

}

.keterangan{

font-size:12px;

line-height:18px;

}

.footer-table td{

border:none;

}

.ttd{

padding-top:65px;

font-weight:bold;

text-decoration:underline;

}

.page-break{

page-break-after:always;

}

</style>

<div class="text-center no-print mb-15">

<button onclick="window.print()" class="btn btn-primary">

<i class="fa fa-print"></i>

Cetak Rapor

</button>

</div>

<div id="rapor">

@php

$bulan=date('m');

$tahun=date('Y');

$semester=$bulan>6?'Ganjil':'Genap';

$tahunPelajaran=$bulan>6
? $tahun.'/'.($tahun+1)
: ($tahun-1).'/'.$tahun;

@endphp

<table class="header-table">

<tr>

<td class="logo" width="12%">

<img src="{{ asset('img/favicon.png') }}"
onerror="this.style.display='none'">

</td>

<td align="center">

<div class="sub-instansi">
KEMENTERIAN AGAMA REPUBLIK INDONESIA
</div>

<div class="nama-instansi">
MADRASAH ALIYAH YAYASAN SOSIAL ISLAM
</div>

<div class="alamat">
Jalan Mandalika Permas
</div>

<div class="alamat">
Kecamatan Brati, Kabupaten Grobogan - Jawa Tengah
</div>

</td>

</tr>

</table>

<div class="garis"></div>

<table class="identitas">

<tr>

<td class="kiri">
Nama
</td>

<td class="titik">
:
</td>

<td class="isi">
<b>{{ $siswa->nama_siswa }}</b>
</td>

<td class="kanan">
Kelas
</td>

<td class="titik">
:
</td>

<td class="isi-kanan">
<b>{{ $kelas->nama_kelas }}</b>
</td>

</tr>

<tr>

<td>
NIS/NISN
</td>

<td>
:
</td>

<td>
{{ $siswa->no_induk }}
</td>

<td>
Semester
</td>

<td>
:
</td>

<td>
{{ $semester }}
</td>

</tr>

<tr>

<td>
Madrasah
</td>

<td>
:
</td>

<td>
MA YASI
</td>

<td>
Tahun Ajaran
</td>

<td>
:
</td>

<td>
{{ $tahunPelajaran }}
</td>

</tr>

<tr>

<td>
Alamat
</td>

<td>
:
</td>

<td colspan="4">
Jalan Mandalika Permas
</td>

</tr>

</table>

<div class="judul mt-20">

CAPAIAN HASIL BELAJAR

</div>

<div class="section-title">
    Kelompok Mata Pelajaran Umum
</div>

<table class="nilai-table">
    <thead>
        <tr>
            <th width="42%">Mata Pelajaran</th>
            <th width="12%">Nilai Akhir</th>
            <th>Capaian Kompetensi</th>
        </tr>
    </thead>

    <tbody>
    @foreach($mapel as $val => $item)

@php
    $data = $item[0];

    $nilai = \App\Rapot::where('siswa_id', $siswa->id)
        ->where('mapel_id', $data->mapel_id)
        ->first();
@endphp

<tr>
    <td>
        {{ $data->mapel->nama_mapel }}
    </td>

    <td class="text-center">
        {{ $nilai['p_nilai'] ?? '-' }}
    </td>

    <td class="keterangan">
        {{ $nilai['p_deskripsi'] ?? '-' }}
    </td>
</tr>

@endforeach

</tbody>
</table>
<div style="width:48%; margin-top:18px; border:1px solid #000;">

    <table style="width:100%; border-collapse:collapse;">

        <tr style="background:#efefef;">
            <td colspan="3"
                style="padding:7px; text-align:center; font-weight:bold; border-bottom:1px solid #000;">
                RINGKASAN HASIL BELAJAR
            </td>
        </tr>

        <tr>
            <td style="padding:6px 8px;">Jumlah Mata Pelajaran</td>
            <td style="width:10px;">:</td>
            <td>{{ $jumlahMapel }}</td>
        </tr>

        <tr>
            <td style="padding:6px 8px;">Total Nilai</td>
            <td>:</td>
            <td>{{ $totalNilai }}</td>
        </tr>

        <tr>
            <td style="padding:6px 8px;">Rata-rata Nilai</td>
            <td>:</td>
            <td><strong>{{ number_format($rataRata,2) }}</strong></td>
        </tr>

        <tr>
            <td style="padding:6px 8px;">Ranking</td>
            <td>:</td>
            <td><strong>{{ $ranking }} dari {{ $jumlahSiswa }}</strong></td>
        </tr>

    </table>

</div>

<div class="page-break"></div>

<div class="section-title">
    Kokurikuler
</div>

<table class="nilai-table">

    <tbody>

        <tr>
            <td class="keterangan" style="height:80px; vertical-align:top;">

                {{ $siswa->kokurikuler->deskripsi ?? '-' }}

            </td>
        </tr>

    </tbody>

</table>

<div class="section-title">
    Ekstrakurikuler
</div>


<table class="nilai-table">

    <thead>

        <tr>

            <th width="8%">
                No
            </th>

            <th width="35%">
                Kegiatan
            </th>

            <th width="15%">
                Nilai
            </th>

            <th>
                Keterangan
            </th>

        </tr>

    </thead>


    <tbody>


    @forelse($siswa->ekstrakurikuler as $data)

        <tr>

            <td class="text-center">
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $data->kegiatan }}
            </td>

            <td class="text-center">
                {{ $data->nilai }}
            </td>

            <td>
                {{ $data->keterangan }}
            </td>

        </tr>


    @empty


        <tr>

            <td colspan="4" class="text-center">
                -
            </td>

        </tr>


    @endforelse


    </tbody>


</table>

<div class="section-title">
    Prestasi
</div>


<table class="nilai-table">

    <thead>

        <tr>

            <th width="8%">
                No
            </th>

            <th width="35%">
                Jenis Prestasi
            </th>

            <th>
                Keterangan
            </th>

        </tr>

    </thead>


    <tbody>


    @forelse($siswa->prestasi as $data)

        <tr>

            <td class="text-center">
                {{ $loop->iteration }}
            </td>


            <td>
                {{ $data->prestasi }}
            </td>


            <td>
                {{ $data->keterangan }}
            </td>

        </tr>


    @empty


        <tr>

            <td colspan="3" class="text-center">
                -
            </td>

        </tr>


    @endforelse


    </tbody>


</table>
<div class="section-title">

Ketidakhadiran

</div>

<table class="nilai-table" style="width:40%;">

<tr>
<td width="70%">
Sakit
</td>
<td>
{{ $absensi->sakit ?? 0 }} Hari
</td>
</tr>

<tr>
<td>
Izin
</td>
<td>
{{ $absensi->izin ?? 0 }} Hari
</td>
</tr>

<tr>
<td>
Alpa
</td>
<td>
{{ $absensi->alpa ?? 0 }} Hari
</td>
</tr>

</table>

<div class="section-title">

Catatan Wali Kelas

</div>

<table class="nilai-table">

<tr>

<td style="height:80px; vertical-align:top;">

@if($catatan)

{{ $catatan->catatan }}

@else

-

@endif

</td>

</tr>

</table>

<div class="section-title">

Tanggapan Orang Tua / Wali

</div>

<table class="nilai-table">

<tr>

<td style="height:80px;">

&nbsp;

</td>

</tr>

</table>

<div class="section-title">

Keterangan Kenaikan Kelas

</div>


<table class="nilai-table">

<tr>

<td>

<b>

Berdasarkan hasil belajar yang dicapai pada semester ini,
peserta didik dinyatakan :

<br><br>


{{ $siswa->kenaikanKelas->status ?? '-' }}


@if($siswa->kenaikanKelas && $siswa->kenaikanKelas->keterangan)

<br><br>

Keterangan:

<br>

{{ $siswa->kenaikanKelas->keterangan }}

@endif


</b>

</td>

</tr>

</table>

@php

date_default_timezone_set('Asia/Jakarta');

$bulanIndonesia = [

1=>'Januari',

2=>'Februari',

3=>'Maret',

4=>'April',

5=>'Mei',

6=>'Juni',

7=>'Juli',

8=>'Agustus',

9=>'September',

10=>'Oktober',

11=>'November',

12=>'Desember'

];

$tanggal = date('d');

$bulan = $bulanIndonesia[date('n')];

$tahun = date('Y');

@endphp

<table class="footer-table" style="margin-top:35px; width:100%;">

<tr>

<td width="40%">

</td>

<td width="60%" align="center">

Brati, {{ $tanggal }} {{ $bulan }} {{ $tahun }}

</td>

</tr>

<tr>

<td align="center">

Orang Tua / Wali

</td>

<td align="center">

Wali Kelas

</td>

</tr>

<tr>

<td style="height:80px;">

</td>

<td>

</td>

</tr>

<tr>

<td align="center">

(...........................................)

</td>

<td align="center">

<b>

{{ $kelas->guru->nama_guru }}

</b>

</td>

</tr>

<tr>

<td>

</td>

<td align="center">

Mengetahui,

</td>

</tr>

<tr>

<td>

</td>

<td align="center">

Kepala Madrasah

</td>

</tr>

<tr>

<td style="height:70px;">

</td>

<td>

</td>

</tr>

<tr>

<td>

</td>

<td align="center">

<b>

SAEMURI, S.Ag

</b>

<br>

NIP. 197001092007011041

</td>

</tr>

</table>

</div>

@endsection

@section('script')

<script>

$("#RapotSiswa").addClass("active");

</script>

@endsection