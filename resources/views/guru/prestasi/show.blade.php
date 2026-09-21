@extends('template_backend.home')

@section('heading','Prestasi Siswa')


@section('page')

<li class="breadcrumb-item active">
    Prestasi
</li>

@endsection



@section('content')


<div class="col-md-12">


<div class="card card-primary">


<div class="card-header">

<h3 class="card-title">

Prestasi :
{{ $siswa->nama_siswa }}

</h3>

</div>



<div class="card-body">


<form action="{{ route('prestasi.store') }}"
method="POST">

@csrf


<input type="hidden"
name="siswa_id"
value="{{ $siswa->id }}">



<div class="row">


<div class="col-md-5">

<label>
Jenis Prestasi
</label>


<input type="text"
name="prestasi"
class="form-control"
placeholder="Contoh: Juara 2 MTQ"
required>


</div>



<div class="col-md-5">


<label>
Keterangan
</label>


<input type="text"
name="keterangan"
class="form-control"
placeholder="Contoh: Tingkat Kecamatan">


</div>



<div class="col-md-2">

<label>
&nbsp;
</label>


<button class="btn btn-primary btn-block">

<i class="fas fa-save"></i>

Simpan

</button>


</div>


</div>


</form>



<hr>



<table class="table table-bordered">


<thead>

<tr>

<th width="10%">
No
</th>

<th>
Jenis Prestasi
</th>

<th>
Keterangan
</th>

<th width="10%">
Aksi
</th>


</tr>

</thead>



<tbody>


@forelse($prestasi as $data)


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


<td class="text-center">


<form action="{{ route('prestasi.destroy',$data->id) }}"
method="POST">

@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

<i class="fas fa-trash"></i>

</button>


</form>


</td>


</tr>



@empty


<tr>

<td colspan="4"
class="text-center">

Belum ada prestasi

</td>

</tr>


@endforelse



</tbody>


</table>



</div>


</div>


</div>


@endsection