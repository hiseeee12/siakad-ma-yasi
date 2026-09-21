@extends('template_backend.home')

@section('heading','Entry Absensi')

@section('page')
<li class="breadcrumb-item active">Entry Absensi</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Entry Absensi</h3>
        </div>

        <div class="card-body">

            <table class="table" style="margin-top:-10px;">
                <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                </tr>

                <tr>
                    <td>Wali Kelas</td>
                    <td>:</td>
                    <td>{{ $guru->nama_guru }}</td>
                </tr>

                <tr>
                    <td>Jumlah Siswa</td>
                    <td>:</td>
                    <td>{{ $siswa->count() }}</td>
                </tr>
            </table>

            <hr>

            <table class="table table-bordered table-striped">

                <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th width="120">Sakit</th>
                    <th width="120">Izin</th>
                    <th width="120">Alpa</th>
                    <th width="90">Aksi</th>
                </tr>

                </thead>

                <tbody>

                @foreach($siswa as $item)

                @php
                    $absensi = \App\Absensi::where('siswa_id',$item->id)
                                ->where('kelas_id',$kelas->id)
                                ->first();
                @endphp

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_siswa }}</td>

                    <td>
                        <input
                            type="number"
                            min="0"
                            class="form-control sakit_{{ $item->id }}"
                            value="{{ $absensi->sakit ?? 0 }}">
                    </td>

                    <td>
                        <input
                            type="number"
                            min="0"
                            class="form-control izin_{{ $item->id }}"
                            value="{{ $absensi->izin ?? 0 }}">
                    </td>

                    <td>
                        <input
                            type="number"
                            min="0"
                            class="form-control alpa_{{ $item->id }}"
                            value="{{ $absensi->alpa ?? 0 }}">
                    </td>

                    <td>

                        <input
                            type="hidden"
                            class="absensi_id_{{ $item->id }}"
                            value="{{ $absensi->id ?? '' }}">

                        <button
                            class="btn btn-success btn-sm simpan"
                            data-id="{{ $item->id }}">
                            <i class="fas fa-save"></i>
                        </button>

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

$(".simpan").click(function(){

    var id=$(this).data("id");

    $.ajax({

        url:"{{ route('guru.absensi.store') }}",

        method:"POST",

        data:{

            _token:"{{ csrf_token() }}",

            id:$(".absensi_id_"+id).val(),

            siswa_id:id,

            kelas_id:"{{ $kelas->id }}",

            sakit:$(".sakit_"+id).val(),

            izin:$(".izin_"+id).val(),

            alpa:$(".alpa_"+id).val()

        },

        success:function(){

            toastr.success("Absensi berhasil disimpan");

            location.reload();

        },

        error:function(){

            toastr.error("Terjadi kesalahan");

        }

    });

});

$("#NilaiGuru").addClass("active");
$("#liNilaiGuru").addClass("menu-open");
$("#AbsensiGuru").addClass("active");

</script>

@endsection