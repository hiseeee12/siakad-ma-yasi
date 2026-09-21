@extends('template_backend.home')

@section('heading', 'Edit Absensi')

@section('page')
<li class="breadcrumb-item active">Edit Absensi</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Edit Data Absensi
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="siswa_id">Siswa</label>
                    <select name="siswa_id" id="siswa_id" class="form-control select2bs4">

                        @foreach($siswa as $data)
                            <option value="{{ $data->id }}"
                                {{ $absensi->siswa_id == $data->id ? 'selected' : '' }}>
                                {{ $data->nama_siswa }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control select2bs4">

                        @foreach($kelas as $data)
                            <option value="{{ $data->id }}"
                                {{ $absensi->kelas_id == $data->id ? 'selected' : '' }}>
                                {{ $data->nama_kelas }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    <label for="sakit">Sakit</label>
                    <input type="number"
                           name="sakit"
                           class="form-control"
                           value="{{ $absensi->sakit }}">
                </div>


                <div class="form-group">
                    <label for="izin">Izin</label>
                    <input type="number"
                           name="izin"
                           class="form-control"
                           value="{{ $absensi->izin }}">
                </div>


                <div class="form-group">
                    <label for="alpa">Alpa</label>
                    <input type="number"
                           name="alpa"
                           class="form-control"
                           value="{{ $absensi->alpa }}">
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="{{ route('absensi.index') }}" class="btn btn-default">
                    Kembali
                </a>

            </form>

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