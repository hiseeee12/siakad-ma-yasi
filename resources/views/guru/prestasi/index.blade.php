@extends('template_backend.home')

@section('heading','Entry Prestasi')

@section('page')
<li class="breadcrumb-item active">
    Entry Prestasi
</li>
@endsection


@section('content')

<div class="col-md-12">

<div class="card card-primary">

<div class="card-header">
    <h3 class="card-title">
        Entry Prestasi Siswa
    </h3>
</div>


<div class="card-body">


<table class="table table-bordered table-striped">

<thead>

<tr>
    <th width="10%">
        No
    </th>

    <th>
        Nama Siswa
    </th>

    <th width="15%">
        Aksi
    </th>
</tr>

</thead>


<tbody>


@foreach($siswa as $data)

<tr>

<td class="text-center">
    {{ $loop->iteration }}
</td>


<td>
    {{ $data->nama_siswa }}
</td>


<td class="text-center">

<a href="{{ route('prestasi.show',
Crypt::encrypt($data->id)) }}"
class="btn btn-primary btn-sm">

<i class="fas fa-edit"></i>
Detail

</a>

</td>


</tr>

@endforeach


</tbody>


</table>


</div>

</div>

</div>

@endsection



@section('script')

<script>

$("#PrestasiGuru").addClass("active");

$("#liNilaiGuru").addClass("menu-open");

</script>

@endsection