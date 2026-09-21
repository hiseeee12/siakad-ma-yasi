@extends('template_backend.home')

@section('heading', 'Catatan Wali Kelas')

@section('page')
<li class="breadcrumb-item active">Catatan Wali Kelas</li>
@endsection

@section('content')

<div class="col-md-12">

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Catatan Wali Kelas</h3>
        </div>

        

            <div class="card-body">

                <table class="table">

                    <tr>
                        <td width="180">Nama Guru</td>
                        <td width="10">:</td>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>

                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>

                </table>

                <hr>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            <tr class="text-center">
                                <th width="60">No</th>
                                <th width="250">Nama Siswa</th>
                                <th>Catatan Wali Kelas</th>
                                <th width="80">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($siswas as $siswa)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $siswa->nama_siswa }}
                                </td>

                                <form action="{{ route('catatan.store') }}" method="POST">
    @csrf

    <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">

    <td>
        <textarea
            name="catatan"
            rows="2"
            class="form-control"
            placeholder="Masukkan catatan">{{ $siswa->catatan->catatan ?? '' }}</textarea>
    </td>

    <td class="text-center">
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-save"></i>
        </button>
    </td>
</form>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
    </div>

</div>

@endsection

@section('script')

<script>

    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#CatatanGuru").addClass("active");

</script>

@endsection