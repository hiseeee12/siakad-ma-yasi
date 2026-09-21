@extends('template_backend.home')
@section('heading', 'Entry Nilai sikap')
@section('page')
  <li class="breadcrumb-item active">Entry Nilai sikap</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12" style="margin-top: -21px;">
                <table class="table">
                    <tr>
                        <td>Nama Guru</td>
                        <td>:</td>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
    <td>Wali Kelas</td>
    <td>:</td>
    <td>{{ $guru->nama_guru }}</td>
</tr>
                </table>
                <hr>
            </div>
            <div class="col-md-12">
              <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach ($kelas as $data)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $data->nama_kelas }}</td>
    <td>
        <a href="{{ route('sikap.show', Crypt::encrypt($data->id)) }}" class="btn btn-primary btn-sm">
            <i class="nav-icon fas fa-pen"></i> Entry Nilai
        </a>
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
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#SikapGuru").addClass("active");
  </script>
@endsection