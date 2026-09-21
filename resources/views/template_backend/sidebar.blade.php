<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('img/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SIAKAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
                    
                    <li class="nav-item has-treeview" id="liDashboard">
                        <a href="#" class="nav-link" id="Dashboard">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link" id="Home">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link" id="AdminHome">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Dashboard Admin</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview" id="liMasterData">
                        <a href="#" class="nav-link" id="MasterData">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('jadwal.index') }}" class="nav-link" id="DataJadwal">
                                    <i class="fas fa-calendar-alt nav-icon"></i>
                                    <p>Data Jadwal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guru.index') }}" class="nav-link" id="DataGuru">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Data Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelas.index') }}" class="nav-link" id="DataKelas">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('siswa.index') }}" class="nav-link" id="DataSiswa">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mapel.index') }}" class="nav-link" id="DataMapel">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Data Mapel</p>
                                </a>
                            </li>
                            <li class="nav-item">
    <a href="{{ route('absensi.index') }}" class="nav-link" id="DataAbsensi">
        <i class="fas fa-calendar-check nav-icon"></i>
        <p>Data Absensi Siswa</p>
    </a>
</li>

                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link" id="DataUser">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<li class="nav-item has-treeview" id="liAkademik">
    <a href="#" class="nav-link" id="Akademik">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
            Akademik
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview ml-4">

        <li class="nav-item">
            <a href="{{ route('tahun-pelajaran.index') }}"
               class="nav-link"
               id="TahunPelajaran">

                <i class="fas fa-calendar-alt nav-icon"></i>
                <p>Tahun Pelajaran</p>

            </a>
        </li>
        <li class="nav-item">
    <a href="{{ route('history-rapot.index') }}"
       class="nav-link"
       id="HistoryRapot">

        <i class="fas fa-history nav-icon"></i>
        <p>History Rapot</p>

    </a>
</li>
    </ul>
</li>
                    @if (Auth::user()->role == "Admin")
                    <li class="nav-item has-treeview" id="liViewTrash">
                        <a href="#" class="nav-link" id="ViewTrash">
                            <i class="nav-icon fas fa-recycle"></i>
                            <p>
                                View Trash
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('jadwal.trash') }}" class="nav-link" id="TrashJadwal">
                                    <i class="fas fa-calendar-alt nav-icon"></i>
                                    <p>Trash Jadwal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guru.trash') }}" class="nav-link" id="TrashGuru">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Trash Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelas.trash') }}" class="nav-link" id="TrashKelas">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Trash Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('siswa.trash') }}" class="nav-link" id="TrashSiswa">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Trash Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mapel.trash') }}" class="nav-link" id="TrashMapel">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Trash Mapel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.trash') }}" class="nav-link" id="TrashUser">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Trash User</p>
                                </a>
                            </li>
                            <li class="nav-item">
    <a href="{{ route('tahun-pelajaran.trash') }}" class="nav-link" id="TrashTahunPelajaran">
        <i class="fas fa-calendar-alt nav-icon"></i>
        <p>Trash Tahun Pelajaran</p>
    </a>
</li>
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('guru.absensi') }}" class="nav-link" id="AbsensiGuru">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Absensi Guru</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview" id="liNilai">
                        <a href="#" class="nav-link" id="Nilai">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Nilai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('ulangan-kelas') }}" class="nav-link" id="Ulangan">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Nilai Ulangan</p>
                                </a>
                            </li>

                            {{-- MENU SIKAP DISEMBUNYIKAN
                            <li class="nav-item">
                                <a href="{{ route('sikap-kelas') }}" class="nav-link" id="Sikap">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Nilai Sikap</p>
                                </a>
                            </li>
                            --}}

                            <li class="nav-item">
                                <a href="{{ route('rapot-kelas') }}" class="nav-link" id="Rapot">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Nilai Rapot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('predikat') }}" class="nav-link" id="Deskripsi">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Deskripsi Predikat</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.pengumuman') }}" class="nav-link" id="Pengumuman">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Pengumuman</p>
                        </a>
                    </li>

                @elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id_card))

                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('absen.harian') }}" class="nav-link" id="AbsenGuru">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Absen</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('jadwal.guru') }}" class="nav-link" id="JadwalGuru">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview" id="liNilaiGuru">
                        <a href="#" class="nav-link" id="NilaiGuru">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>
                                Nilai
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('ulangan.index') }}" class="nav-link" id="UlanganGuru">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Entry Nilai Ulangan</p>
                                </a>
                            </li>

                            @php
    $guru = Auth::user()->guru(Auth::user()->id_card);
    $waliKelas = false;

    if ($guru) {
        $waliKelas = \App\Kelas::where('guru_id', $guru->id)->exists();
    }
@endphp

@if($waliKelas)
{{--
<li class="nav-item">
    <a href="{{ route('sikap.index') }}" class="nav-link" id="SikapGuru">
        <i class="fas fa-heart nav-icon"></i>
        <p>Entry Nilai Sikap</p>
    </a>
</li>
--}}
<li class="nav-item">
    <a href="{{ route('guru.absensi.index') }}" class="nav-link" id="AbsensiGuru">
        <i class="fas fa-user-check nav-icon"></i>
        <p>Entry Absensi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('catatan.index') }}" class="nav-link" id="CatatanGuru">
        <i class="fas fa-sticky-note nav-icon"></i>
        <p>Catatan Wali Kelas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kokurikuler.index') }}" class="nav-link" id="KokurikulerGuru">
        <i class="fas fa-book-reader nav-icon"></i>
        <p>Kokurikuler</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ekstrakurikuler.index') }}" class="nav-link" id="EkstrakurikulerGuru">
        <i class="fas fa-running nav-icon"></i>
        <p>Ekstrakurikuler</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('prestasi.index') }}" class="nav-link" id="PrestasiGuru">
        <i class="fas fa-trophy nav-icon"></i>
        <p>Prestasi</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kenaikan.index') }}" class="nav-link" id="KenaikanGuru">
        <i class="fas fa-arrow-up nav-icon"></i>
        <p>Kenaikan Kelas</p>
    </a>
</li>

@endif

                            <li class="nav-item">
                                <a href="{{ route('rapot.index') }}" class="nav-link" id="RapotGuru">
                                    <i class="fas fa-file-invoice nav-icon"></i>
                                    <p>Entry Nilai Rapot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nilai.index') }}" class="nav-link" id="DesGuru">
                                    <i class="fas fa-file-signature nav-icon"></i>
                                    <p>Deskripsi Predikat</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @elseif (Auth::user()->role == 'Siswa' && Auth::user()->siswa(Auth::user()->no_induk))

                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('jadwal.siswa') }}" class="nav-link" id="JadwalSiswa">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ulangan.siswa') }}" class="nav-link" id="UlanganSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Ulangan</p>
                        </a>
                    </li>

                    {{-- MENU SIKAP SISWA DISEMBUNYIKAN
                    <li class="nav-item">
                        <a href="{{ route('sikap.siswa') }}" class="nav-link" id="SikapSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Sikap</p>
                        </a>
                    </li>
                    --}}

                    <li class="nav-item">
                        <a href="{{ route('rapot.siswa') }}" class="nav-link" id="RapotSiswa">
                            <i class="fas fa-file-alt nav-icon"></i>
                            <p>Rapot</p>
                        </a>
                    </li>

                @else

                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link" id="Home">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                @endif

            </ul>
        </nav>
    </div>
</aside>