@extends('template_backend.home')

@section('heading', 'History Rapot')

@section('page')
    <li class="breadcrumb-item active">History Rapot</li>
@endsection

@section('content')

<div class="col-md-12">

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">History Rapot Siswa</h3>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-12">

                    <table id="example1"
                           class="table table-bordered table-striped table-hover">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Siswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($siswa as $data)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $data->nama_siswa }}</td>

                                    <td>
                                        @if ($data->status == 'aktif')
                                            <span class="badge badge-success">
                                                Aktif
                                            </span>
                                        @elseif ($data->status == 'lulus')
                                            <span class="badge badge-primary">
                                                Lulus
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                {{ $data->status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('history-rapot.show', $data->id) }}"
                                           class="btn btn-info btn-sm">

                                            <i class="nav-icon fas fa-search-plus"></i>
                                            &nbsp; Detail

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

    $("#HistoryRapot").addClass("active");
    $("#liAkademik").addClass("menu-open");

</script>

@endsection
