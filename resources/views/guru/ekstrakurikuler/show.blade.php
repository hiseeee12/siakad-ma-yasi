@extends('template_backend.home')

@section('heading','Ekstrakurikuler Siswa')


@section('page')
<li class="breadcrumb-item active">
Ekstrakurikuler
</li>
@endsection



@section('content')


<div class="col-md-12">


<div class="card card-primary">


<div class="card-header">

<h3 class="card-title">

Ekstrakurikuler :
{{ $siswa->nama_siswa }}

</h3>

</div>



<div class="card-body">


<form action="{{ route('ekstrakurikuler.store') }}"
method="POST">

@csrf


<input type="hidden"
name="siswa_id"
value="{{ $siswa->id }}">



<div class="row">


<div class="col-md-3">

<label>
Kegiatan
</label>

<input type="text"
name="kegiatan"
class="form-control"
placeholder="Contoh: Pramuka"
required>

</div>



<div class="col-md-3">

<label>
Nilai
</label>

<select name="nilai"
class="form-control">

<option value="Baik">
Baik
</option>

<option value="Sangat Baik">
Sangat Baik
</option>

<option value="Cukup">
Cukup
</option>


</select>

</div>



<div class="col-md-4">

<label>
Keterangan
</label>

<input type="text"
name="keterangan"
class="form-control"
placeholder="Keterangan">

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

<th width="5%">
No
</th>

<th>
Kegiatan
</th>

<th>
Nilai
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


@forelse($ekstrakurikuler as $data)


<tr>


<td class="text-center">
{{ $loop->iteration }}
</td>


<td>
{{ $data->kegiatan }}
</td>


<td>
{{ $data->nilai }}
</td>


<td>
{{ $data->keterangan }}
</td>


<td class="text-center">


<form action="{{ route('ekstrakurikuler.destroy',$data->id) }}"
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

<td colspan="5"
class="text-center">

Belum ada data ekstrakurikuler

</td>

</tr>


@endforelse



</tbody>


</table>



</div>


</div>


</div>


@endsection