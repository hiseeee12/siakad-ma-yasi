@extends('template_backend.home')

@section('heading', 'Entry Kokurikuler')

@section('page')
<li class="breadcrumb-item active">Entry Kokurikuler</li>
@endsection


@section('content')

<div class="col-md-12">

<div class="card card-primary">

<div class="card-header">
<h3 class="card-title">
Entry Kokurikuler
</h3>
</div>


<div class="card-body">

<div class="row">

<div class="col-md-12">

<table class="table" style="margin-top:-10px;">

<tr>
<td>Nama Kelas</td>
<td>:</td>
<td>{{ $kelas->nama_kelas }}</td>
</tr>

<tr>
<td>Wali Kelas</td>
<td>:</td>
<td>{{ $kelas->guru->nama_guru }}</td>
</tr>

<tr>
<td>Jumlah Siswa</td>
<td>:</td>
<td>{{ $siswa->count() }}</td>
</tr>

</table>

<hr>

</div>


<div class="col-md-12">

<table class="table table-bordered table-striped table-hover">

<thead>

<tr>

<th class="ctr">
No.
</th>

<th>
Nama Siswa
</th>

<th>
Deskripsi Kokurikuler
</th>

<th class="ctr">
Aksi
</th>

</tr>

</thead>


<tbody>


@foreach($siswa as $data)

<tr>


<td class="ctr">
{{ $loop->iteration }}
</td>


<td>
{{ $data->nama_siswa }}

<input type="hidden"
class="kokurikuler_id_{{$data->id}}"
value="{{ optional($data->kokurikuler)->id }}">

</td>


<td>

<textarea
class="form-control deskripsi_{{$data->id}}"
rows="2"
placeholder="Masukkan deskripsi kokurikuler">{{ optional($data->kokurikuler)->deskripsi }}</textarea>

</td>


<td class="ctr">


@if(optional($data->kokurikuler)->deskripsi)

<i class="fas fa-check"
style="font-weight:bold;"></i>

@else

<button 
type="button"
class="btn btn-default btn_click"
data-id="{{$data->id}}">

<i class="nav-icon fas fa-save"></i>

</button>

@endif


</td>


</tr>


@endforeach


</tbody>


</table>


</div>

</div>

</div>


</div>

</div>


@endsection


@section('script')

<script>

$(".btn_click").click(function(){


var id = $(this).attr('data-id');

var deskripsi = $(".deskripsi_"+id).val();


$.ajax({

url:"{{ route('kokurikuler.store') }}",

type:"POST",

dataType:'json',

data:{
_token:'{{ csrf_token() }}',

siswa_id:id,

kelas_id:"{{ $kelas->id }}",

deskripsi:deskripsi

},


success:function(data){

toastr.success("Data kokurikuler berhasil disimpan!");

location.reload();

},


error:function(){

toastr.warning("Terjadi kesalahan!");

}


});


});



$("#NilaiGuru").addClass("active");
$("#liNilaiGuru").addClass("menu-open");
$("#KokurikulerGuru").addClass("active");


</script>

@endsection