@extends('template_backend.home')

@section('heading', 'Keterangan Kenaikan Kelas')

@section('page')
    <li class="breadcrumb-item active">
        Keterangan Kenaikan Kelas
    </li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Keterangan Kenaikan Kelas
                </h3>
            </div>

            <div class="card-body">
                <table class="table" style="margin-top:-10px">
                    <tr>
                        <td width="20%">Nama Kelas</td>
                        <td width="2%">:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
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
                            <th width="5%">No</th>
                            <th>Nama Siswa</th>
                            <th width="20%">Keputusan</th>
                            <th>Keterangan</th>
                            <th width="8%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $data->nama_siswa }}
                                </td>
                                <td>
                                    <select class="form-control status_{{ $data->id }}">
                                        <option value="">-- Pilih --</option>
                                        <option value="Naik Kelas"
                                            @if($data->kenaikanKelas && $data->kenaikanKelas->status == 'Naik Kelas')
                                                selected
                                            @endif>
                                            Naik Kelas
                                        </option>
                                        <option value="Tinggal Kelas"
                                            @if($data->kenaikanKelas && $data->kenaikanKelas->status == 'Tinggal Kelas')
                                                selected
                                            @endif>
                                            Tinggal Kelas
                                        </option>
                                        <option value="Lulus"
                                            @if($data->kenaikanKelas && $data->kenaikanKelas->status == 'Lulus')
                                                selected
                                            @endif>
                                            Lulus
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input 
                                        type="text"
                                        class="form-control keterangan_{{ $data->id }}"
                                        value="{{ $data->kenaikanKelas->keterangan ?? '' }}"
                                        placeholder="Keterangan">
                                </td>
                                <td class="text-center">
                                    <button 
                                        type="button"
                                        class="btn btn-primary btn-sm btn_simpan"
                                        data-id="{{ $data->id }}">
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
    $(".btn_simpan").click(function(){

    let id = $(this).data('id');

    let status = $(".status_"+id).val();

    let keterangan = $(".keterangan_"+id).val();


    if(status == ''){

        toastr.warning(
            'Silahkan pilih keputusan terlebih dahulu'
        );

        return;

    }


    $.ajax({

        url: "{{ route('kenaikan.store') }}",

        type: "POST",

        data: {

            _token: "{{ csrf_token() }}",

            siswa_id: id,

            status: status,

            keterangan: keterangan

        },

        success: function(data){

            toastr.success(
                data.success ?? 'Keputusan berhasil disimpan'
            );

        },

        error: function(xhr){

            if (xhr.responseJSON && xhr.responseJSON.error) {

                toastr.error(xhr.responseJSON.error);

            } else if (xhr.responseJSON && xhr.responseJSON.message) {

                toastr.error(xhr.responseJSON.message);

            } else {

                toastr.error(
                    'Terjadi kesalahan saat menyimpan keputusan.'
                );

            }

        }

    });

});

    $("#KenaikanGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
</script>
@endsection