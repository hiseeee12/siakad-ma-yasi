@extends('template_backend.home')

@section('heading', 'Entry Nilai Rapot')

@section('page')
    <li class="breadcrumb-item active">Entry Nilai Rapot</li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Entry Nilai Rapot</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" style="margin-top: -10px;">
                            <tr>
                                <td>Nama Kelas</td>
                                <td>:</td>
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
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>:</td>
                                <td>{{ $guru->mapel->nama_mapel }}</td>
                            </tr>
                            <tr>
                                <td>Guru Mata Pelajaran</td>
                                <td>:</td>
                                <td>{{ $guru->nama_guru }}</td>
                            </tr>

                            @php
                                $tahunPelajaran = \App\TahunPelajaran::where('aktif', 1)->first();
                            @endphp

                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ $tahunPelajaran->semester ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td>{{ $tahunPelajaran->tahun_pelajaran ?? '-' }}</td>
                            </tr>
                        </table>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="ctr" rowspan="2">No.</th>
                                    <th rowspan="2">Nama Siswa</th>
                                    <th class="ctr" colspan="3">Nilai</th>
                                    <th class="ctr" rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="ctr">Nilai</th>
                                    <th class="ctr">Predikat</th>
                                    <th class="ctr">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $data)
                                    @php
                                        $rapot = $data->nilai($data->id);
                                    @endphp

                                    <tr id="row-{{ $data->id }}">
                                        <td class="ctr">{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_siswa }}</td>

                                        @if ($rapot)
                                            {{-- NILAI --}}
                                            <td class="ctr nilai-cell-{{ $data->id }}">
                                                <span class="nilai-text-{{ $data->id }}">{{ $rapot->p_nilai }}</span>
                                            </td>

                                            {{-- PREDIKAT --}}
                                            <td class="ctr predikat-cell-{{ $data->id }}">
                                                <span class="predikat-text-{{ $data->id }}">{{ $rapot->p_predikat }}</span>
                                            </td>

                                            {{-- DESKRIPSI --}}
                                            <td class="ctr deskripsi-cell-{{ $data->id }}">
                                                <textarea class="form-control swal2-textarea" cols="50" rows="5" disabled>{{ $rapot->p_deskripsi }}</textarea>
                                            </td>

                                            {{-- AKSI --}}
                                            <td class="ctr aksi-cell-{{ $data->id }}">
                                                <input type="hidden" class="rapot-id-{{ $data->id }}" value="{{ $rapot->id }}">
                                                <button type="button" class="btn btn-warning btn-edit" data-id="{{ $data->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        @else
                                            {{-- INPUT NILAI --}}
                                            <td class="ctr">
                                                <input type="text" name="nilai" maxlength="3" onkeypress="return inputAngka(event)" class="form-control text-center nilai_{{ $data->id }}" data-ids="{{ $data->id }}" autocomplete="off">
                                            </td>

                                            {{-- PREDIKAT --}}
                                            <td class="ctr">
                                                <input type="text" class="form-control text-center predikat_{{ $data->id }}" disabled>
                                            </td>

                                            {{-- DESKRIPSI --}}
                                            <td class="ctr">
                                                <textarea class="form-control swal2-textarea deskripsi_{{ $data->id }}" cols="50" rows="5" disabled></textarea>
                                            </td>

                                            {{-- SIMPAN --}}
                                            <td class="ctr sub_{{ $data->id }}">
                                                <button type="button" id="submit-{{ $data->id }}" class="btn btn-default btn-save" data-id="{{ $data->id }}">
                                                    <i class="nav-icon fas fa-save"></i>
                                                </button>
                                            </td>
                                        @endif
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
    /*
    |--------------------------------------------------------------------------
    | CEK PREDIKAT SAAT INPUT NILAI
    |--------------------------------------------------------------------------
    */
    $(document).on('keyup', 'input[name=nilai]', function() {
        var id = $(this).attr('data-ids');
        var guru_id = "{{ $guru->id }}";
        var angka = $(".nilai_" + id).val();

        if (angka.length >= 1) {
            $.ajax({
                type: "GET",
                data: {
                    id: guru_id,
                    nilai: angka
                },
                dataType: "JSON",
                url: "{{ url('/rapot/predikat') }}",
                success: function(data) {
                    $(".predikat_" + id).val(data[0]['predikat']);
                    $(".deskripsi_" + id).val(data[0]['deskripsi']);
                },
                error: function() {
                    toastr.warning("Tolong masukkan nilai kkm & predikat!");
                }
            });
        } else {
            $(".predikat_" + id).val("");
            $(".deskripsi_" + id).val("");
        }
    });

    /*
    |--------------------------------------------------------------------------
    | SIMPAN NILAI BARU
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '.btn-save', function() {
        var id = $(this).attr('data-id');
        var nilai = $(".nilai_" + id).val();
        var predikat = $(".predikat_" + id).val();
        var deskripsi = $(".deskripsi_" + id).val();
        var guru_id = "{{ $guru->id }}";
        var kelas_id = "{{ $kelas->id }}";

        if (nilai == "") {
            toastr.error("Form nilai tidak boleh kosong!");
            return;
        }

        $.ajax({
            url: "{{ route('rapot.store') }}",
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                siswa_id: id,
                kelas_id: kelas_id,
                guru_id: guru_id,
                nilai: nilai,
                predikat: predikat,
                deskripsi: deskripsi
            },
            success: function(data) {
                /*
                |--------------------------------------------------------------------------
                | Setelah berhasil disimpan, tampilkan nilai biasa + tombol edit
                |--------------------------------------------------------------------------
                */
                var html = `
                    <span class="nilai-text-${id}">
                        ${nilai}
                    </span>
                `;
                $(".nilai_" + id).parent().html(html);

                var htmlPredikat = `
                    <span class="predikat-text-${id}">
                        ${predikat}
                    </span>
                `;
                $(".predikat_" + id).parent().html(htmlPredikat);

                var htmlDeskripsi = `
                    <textarea class="form-control swal2-textarea" cols="50" rows="5" disabled>${deskripsi}</textarea>
                `;
                $(".deskripsi_" + id).parent().html(htmlDeskripsi);

                var htmlAksi = `
                    <input type="hidden" class="rapot-id-${id}" value="${data.id ?? ''}">
                    <button type="button" class="btn btn-warning btn-edit" data-id="${id}">
                        <i class="fas fa-edit"></i>
                    </button>
                `;
                $(".sub_" + id).html(htmlAksi);

                toastr.success(data.success ?? "Nilai rapot siswa berhasil ditambahkan!");
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    toastr.warning(xhr.responseJSON.error);
                } else {
                    toastr.warning("Terjadi kesalahan saat menyimpan nilai!");
                }
            }
        });
    });

    /*
    |--------------------------------------------------------------------------
    | TOMBOL EDIT
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).attr('data-id');
        var nilai = $(".nilai-text-" + id).text().trim();
        var predikat = $(".predikat-text-" + id).text().trim();
        var deskripsi = $(".deskripsi-cell-" + id).find('textarea').val();
        var rapotId = $(".rapot-id-" + id).val();

        /*
        |--------------------------------------------------------------------------
        | Ubah kolom nilai menjadi input
        |--------------------------------------------------------------------------
        */
        $(".nilai-cell-" + id).html(`
            <input type="text" maxlength="3" onkeypress="return inputAngka(event)" class="form-control text-center nilai-edit-${id}" value="${nilai}" data-ids="${id}" autocomplete="off">
        `);

        /*
        |--------------------------------------------------------------------------
        | Ubah kolom predikat menjadi input
        |--------------------------------------------------------------------------
        */
        $(".predikat-cell-" + id).html(`
            <input type="text" class="form-control text-center predikat-edit-${id}" value="${predikat}" disabled>
        `);

        /*
        |--------------------------------------------------------------------------
        | Ubah kolom deskripsi
        |--------------------------------------------------------------------------
        */
        $(".deskripsi-cell-" + id).html(`
            <textarea class="form-control swal2-textarea deskripsi-edit-${id}" cols="50" rows="5" disabled>${deskripsi}</textarea>
        `);

        /*
        |--------------------------------------------------------------------------
        | Tombol menjadi SIMPAN UPDATE
        |--------------------------------------------------------------------------
        */
        $(".aksi-cell-" + id).html(`
            <button type="button" class="btn btn-success btn-update" data-id="${id}" data-rapot="${rapotId}">
                <i class="fas fa-save"></i>
            </button>
        `);

        /*
        |--------------------------------------------------------------------------
        | Saat nilai diedit, hitung ulang predikat
        |--------------------------------------------------------------------------
        */
        $(".nilai-edit-" + id).keyup(function() {
            var angka = $(this).val();
            if (angka.length >= 1) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: "{{ $guru->id }}",
                        nilai: angka
                    },
                    dataType: "JSON",
                    url: "{{ url('/rapot/predikat') }}",
                    success: function(data) {
                        $(".predikat-edit-" + id).val(data[0]['predikat']);
                        $(".deskripsi-edit-" + id).val(data[0]['deskripsi']);
                    },
                    error: function() {
                        toastr.warning("Tolong masukkan nilai kkm & predikat!");
                    }
                });
            }
        });
    });

    /*
    |--------------------------------------------------------------------------
    | UPDATE NILAI
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '.btn-update', function() {
        var id = $(this).attr('data-id');
        var rapotId = $(this).attr('data-rapot');
        var nilai = $(".nilai-edit-" + id).val();

        if (nilai == "") {
            toastr.error("Nilai tidak boleh kosong!");
            return;
        }

        $.ajax({
            url: "{{ url('/rapot') }}/" + rapotId,
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                _method: "PUT",
                nilai: nilai
            },
            success: function(data) {
                /*
                |--------------------------------------------------------------------------
                | Ambil hasil terbaru
                |--------------------------------------------------------------------------
                */
                var predikat = $(".predikat-edit-" + id).val();
                var deskripsi = $(".deskripsi-edit-" + id).val();

                /*
                |--------------------------------------------------------------------------
                | Kembalikan tampilan menjadi mode biasa
                |--------------------------------------------------------------------------
                */
                $(".nilai-cell-" + id).html(`
                    <span class="nilai-text-${id}">
                        ${nilai}
                    </span>
                `);

                $(".predikat-cell-" + id).html(`
                    <span class="predikat-text-${id}">
                        ${predikat}
                    </span>
                `);

                $(".deskripsi-cell-" + id).html(`
                    <textarea class="form-control swal2-textarea" cols="50" rows="5" disabled>${deskripsi}</textarea>
                `);

                $(".aksi-cell-" + id).html(`
                    <input type="hidden" class="rapot-id-${id}" value="${rapotId}">
                    <button type="button" class="btn btn-warning btn-edit" data-id="${id}">
                        <i class="fas fa-edit"></i>
                    </button>
                `);

                toastr.success(data.success ?? "Nilai rapot berhasil diperbarui!");
            },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    toastr.error(xhr.responseJSON.errors.nilai[0]);
                } else if (xhr.responseJSON && xhr.responseJSON.error) {
                    toastr.warning(xhr.responseJSON.error);
                } else {
                    toastr.warning("Terjadi kesalahan saat memperbarui nilai!");
                }
            }
        });
    });

    /*
    |--------------------------------------------------------------------------
    | MENU ACTIVE
    |--------------------------------------------------------------------------
    */
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#RapotGuru").addClass("active");

</script>
@endsection