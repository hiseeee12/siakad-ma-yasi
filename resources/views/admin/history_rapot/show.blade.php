@extends('template_backend.home')

@section('heading', 'History Rapor')

@section('page')
    <li class="breadcrumb-item">
        <a href="{{ route('history-rapot.index') }}">History Rapor</a>
    </li>

    <li class="breadcrumb-item active">
        {{ $siswa->nama_siswa }}
    </li>
@endsection

@section('content')

<div class="col-md-12">

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">
                History Rapor: {{ $siswa->nama_siswa }}
            </h3>
        </div>

        <div class="card-body">

            <div class="alert alert-info">
                <strong>{{ $siswa->nama_siswa }}</strong>
                <br>
                NIS/NISN: {{ $siswa->no_induk }}
            </div>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th width="7%">No.</th>
                        <th>Tahun Pelajaran</th>
                        <th>Semester</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($history as $tahunPelajaranId => $data)

                        @php
                            $tahun = $data->first()->tahunPelajaran;
                        @endphp

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $tahun->tahun_pelajaran ?? '-' }}
                            </td>

                            <td>
                                {{ $tahun->semester ?? '-' }}
                            </td>

                            <td>

                                <a href="{{ route('history-rapot.rapot', [
                                    'id' => $siswa->id,
                                    'tahunPelajaranId' => $tahunPelajaranId
                                ]) }}"
                                class="btn btn-info btn-sm">

                                    <i class="fas fa-file-alt"></i>
                                    Lihat Rapor

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">
                                Belum ada history rapor.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

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