@extends('template_backend.home')

@section('heading', 'Tambah Absensi')

@section('page')
<li class="breadcrumb-item active">Tambah Absensi</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Tambah Data Absensi
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="siswa_id">Siswa</label>
                    <select name="siswa_id" id="siswa_id" class="form-control select2bs4">
                        <option value="">-- Pilih Siswa --</option>

                        @foreach($siswa as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->nama_siswa }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control select2bs4">
                        <option value="">-- Pilih Kelas --</option>

                        @foreach($kelas as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->nama_kelas }}
                            </option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    <label for="sakit">Sakit</label>
                    <input type="number" 
                           name="sakit" 
                           id="sakit"
                           class="form-control"
                           value="0">
                </div>


                <div class="form-group">
                    <label for="izin">Izin</label>
                    <input type="number" 
                           name="izin" 
                           id="izin"
                           class="form-control"
                           value="0">
                </div>


                <div class="form-group">
                    <label for="alpa">Alpa</label>
                    <input type="number" 
                           name="alpa" 
                           id="alpa"
                           class="form-control"
                           value="0">
                </div>


                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan
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