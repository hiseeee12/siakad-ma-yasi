@extends('template_backend.home')

@section('heading', 'Edit Tahun Pelajaran')

@section('page')
    <li class="breadcrumb-item">
        <a href="{{ route('tahun-pelajaran.index') }}">Tahun Pelajaran</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Edit Tahun Pelajaran</h3>
        </div>

        <form action="{{ route('tahun-pelajaran.update', $tahunPelajaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group">
                    <label>Tahun Pelajaran</label>
                    <input
                        type="text"
                        name="tahun_pelajaran"
                        class="form-control @error('tahun_pelajaran') is-invalid @enderror"
                        value="{{ old('tahun_pelajaran', $tahunPelajaran->tahun_pelajaran) }}"
                        placeholder="Contoh: 2025/2026"
                    >

                    @error('tahun_pelajaran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Semester</label>

                    <select
                        name="semester"
                        class="form-control @error('semester') is-invalid @enderror"
                    >
                        <option value="Ganjil"
                            {{ old('semester', $tahunPelajaran->semester) == 'Ganjil' ? 'selected' : '' }}>
                            Ganjil
                        </option>

                        <option value="Genap"
                            {{ old('semester', $tahunPelajaran->semester) == 'Genap' ? 'selected' : '' }}>
                            Genap
                        </option>
                    </select>

                    @error('semester')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>

                <a href="{{ route('tahun-pelajaran.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection