@extends('template_backend.home')

@section('heading', 'Tambah Tahun Pelajaran')

@section('page') <li class="breadcrumb-item"> <a href="{{ route('tahun-pelajaran.index') }}">Tahun Pelajaran</a> </li> <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Tahun Pelajaran</h3>
        </div>

    <form action="{{ route('tahun-pelajaran.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label for="tahun_pelajaran">Tahun Pelajaran</label>
                <input
                    type="text"
                    name="tahun_pelajaran"
                    id="tahun_pelajaran"
                    class="form-control"
                    placeholder="Contoh: 2026/2027"
                    maxlength="9"
                    required
                >
            </div>

            <div class="form-group">
                <label for="semester">Semester</label>
                <select name="semester" id="semester" class="form-control" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
            </div>

        </div>

        <div class="card-footer">
            <a href="{{ route('tahun-pelajaran.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>


</div>
@endsection
