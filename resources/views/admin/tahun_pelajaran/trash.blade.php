@extends('template_backend.home')

@section('heading', 'Trash Tahun Pelajaran')

@section('page')
    <li class="breadcrumb-item">
        <a href="{{ route('tahun-pelajaran.index') }}">
            Tahun Pelajaran
        </a>
    </li>
    <li class="breadcrumb-item active">
        Trash       
    </li>   
@endsection

@section('content')

<div class="col-md-12">
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-recycle"></i>
                Trash Tahun Pelajaran
            </h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">

                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tahun Pelajaran</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($tahunPelajaran as $data)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="text-center">
                                    {{ $data->tahun_pelajaran }}
                                </td>

                                <td class="text-center">
                                    {{ $data->semester }}
                                </td>

                                <td class="text-center">

                                    {{-- RESTORE --}}
<a href="{{ route('tahun-pelajaran.restore', $data->id) }}"
   class="btn btn-info btn-sm"
   onclick="return confirm('Restore tahun pelajaran ini?')">

    <i class="fas fa-undo"></i>
    Restore

</a>

                                    {{-- HAPUS PERMANEN --}}
                                    <form action="{{ route('tahun-pelajaran.kill', $data->id) }}"
                                          method="POST"
                                          style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus permanen data ini? Data tidak dapat dikembalikan!')">

                                            <i class="fas fa-trash"></i>
                                            Hapus Permanen

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center">
                                    Tidak ada data tahun pelajaran di Trash.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>

@endsection