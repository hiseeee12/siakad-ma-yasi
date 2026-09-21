@extends('template_backend.home')

@section('heading', 'Data Absensi')

@section('page')

<li class="breadcrumb-item active">Data Absensi</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">


    <div class="card-header">
        <h3 class="card-title">
            <a href="{{ route('absensi.create') }}" class="btn btn-primary btn-sm">
                <i class="nav-icon fas fa-folder-plus"></i>
                &nbsp; Tambah Absensi
            </a>
        </h3>
    </div>

    <div class="card-body">

        {{-- PERIODE AKTIF --}}
        <div class="mb-3">
            <strong>Semester:</strong>
            {{ $tahunPelajaran->semester ?? '-' }}
            &nbsp; | &nbsp;
            <strong>Tahun Pelajaran:</strong>
            {{ $tahunPelajaran->tahun_pelajaran ?? '-' }}
        </div>

        <table id="example1" class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alpa</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($absensis as $data)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $data->siswa->nama_siswa }}</td>

                    <td>{{ $data->kelas->nama_kelas }}</td>

                    <td>{{ $data->sakit }}</td>

                    <td>{{ $data->izin }}</td>

                    <td>{{ $data->alpa }}</td>

                    <td>

                        <a href="{{ route('absensi.edit', $data->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('absensi.destroy', $data->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('delete')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>

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
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
</script>

@endsection
