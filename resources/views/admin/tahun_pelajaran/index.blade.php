@extends('template_backend.home')

@section('heading', 'Tahun Pelajaran')

@section('page') <li class="breadcrumb-item active">Tahun Pelajaran</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Tahun Pelajaran</h3>


        <div class="card-tools">
            <a href="{{ route('tahun-pelajaran.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Tambah Tahun Pelajaran
</a>

<a href="{{ route('tahun-pelajaran.trash') }}" class="btn btn-danger">
    <i class="fas fa-recycle"></i> Trash
</a>
        </div>
    </div>

    <div class="card-body">
        @if ($tahunPelajaran->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center">Tahun Pelajaran</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
<tbody>
    @foreach ($tahunPelajaran as $data)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>

            <td class="text-center">
                {{ $data->tahun_pelajaran }}
            </td>

            <td class="text-center">
                {{ $data->semester }}
            </td>

            <td class="text-center">
                @if ($data->aktif)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-secondary">Tidak Aktif</span>
                @endif
            </td>

            <td class="text-center">

                {{-- Tombol Edit --}}
                <a href="{{ route('tahun-pelajaran.edit', $data->id) }}"
                   class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>

                {{-- Tombol Aktifkan --}}
                @if (!$data->aktif)
                    <form action="{{ route('tahun-pelajaran.aktifkan', $data->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('PUT')

                        <button type="submit"
                                class="btn btn-success btn-sm"
                                onclick="return confirm('Aktifkan tahun pelajaran ini?')">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>
                @endif

                {{-- Tombol Hapus --}}
                @if (!$data->aktif)
                    <form action="{{ route('tahun-pelajaran.destroy', $data->id) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin memindahkan tahun pelajaran ini ke Trash?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                @endif

            </td>
        </tr>
    @endforeach
</tbody>
        @else
            <div class="alert alert-info text-center">
                Belum ada data Tahun Pelajaran.
            </div>
        @endif
    </div>
</div>


</div>
@endsection

@section('script')

<script>
    // Menu Tahun Pelajaran aktif nanti kita tambahkan setelah menu dibuat.
</script>

@endsection
