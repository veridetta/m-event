<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

     <!-- Sidebar Menu -->
    <div class="sidebar">
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @if (auth()->user()->level_akun_id == "1")
    <li class="nav-item has-treeview">
        <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kegiatan-show" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Manajemen Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/peserta" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Manajemen Peserta</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kategori-show" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Manajemen Kategori Narasumber</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/narasumber-show" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>Manajemen Narasumber Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-question"></i>
            <p>
                Manajemen Pertanyaan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/persiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/paskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/efektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Manajemen Pelaporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/lappersiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappaskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lapefektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="/rekapitulasi" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Rekapitulasi</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/eo-show" class="nav-link">
            <i class="nav-icon fas fa-clone"></i>
            <p>Manajemen EO</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/usereo-show" class="nav-link">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>Manajemen User EO</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/pengawas-detail" class="nav-link">
            <i class="nav-icon fas fa-mask"></i>
            <p>Manajemen Pengawas</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/piu" class="nav-link">
            <i class="nav-icon fas fa-fingerprint"></i>
            <p>Manajemen PIU</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-long-arrow-alt-left"></i>
            <p>Kembali ke beranda</p>
        </a>
    </li>
    @endif

    @if (auth()->user()->level_akun_id == "2")
    <li class="nav-item has-treeview">

      <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kegiatan-show" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Manajemen Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/peserta" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Manajemen Peserta</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/narasumber-show" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>Manajemen Narasumber Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Manajemen Pelaporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/lappersiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappaskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lapefektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="/usereo" class="nav-link">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>Manajemen User EO</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-long-arrow-alt-left"></i>
            <p>Kembali ke beranda</p>
        </a>
    </li>
    @endif

    @if (auth()->user()->level_akun_id == "3")
    <li class="nav-item has-treeview">
        <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kegiatan" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Manajemen Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/peserta" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Manajemen Peserta</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/narasumber" class="nav-link">
            <i class="nav-icon fas fa-user-friends"></i>
            <p>Manajemen Narasumber Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Manajemen Pelaporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/lappersiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappaskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lapefektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-long-arrow-alt-left"></i>
            <p>Kembali ke beranda</p>
        </a>
    </li>
    </li>
    @endif

    @if (auth()->user()->level_akun_id == "4")
    <li class="nav-item has-treeview">
        <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kegiatan-show" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Manajemen Kegiatan</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/peserta" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Manajemen Peserta</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Manajemen Pelaporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/lappersiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappaskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lapefektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-long-arrow-alt-left"></i>
            <p>Kembali ke beranda</p>
        </a>
    </li>
    @endif
    @if (auth()->user()->level_akun_id == "5")
    <li class="nav-item has-treeview">
        <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/kategorinarasumber" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>Manajemen Kategori Narasumber</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-question"></i>
            <p>
                Manajemen Pertanyaan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/persiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/paskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/efektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-flag"></i>
            <p>
                Manajemen Pelaporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/lappersiapan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Persiapan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lappaskapelaksanaan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Paska Pelaksanaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/lapefektivitas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Efektivitas</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="/eo" class="nav-link">
            <i class="nav-icon fas fa-clone"></i>
            <p>Manajemen EO</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/pengawas" class="nav-link">
            <i class="nav-icon fas fa-mask"></i>
            <p>Manajemen Pengawas</p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="/" class="nav-link">
            <i class="nav-icon fas fa-long-arrow-alt-left"></i>
            <p>Kembali ke beranda</p>
        </a>
    </li>
    @endif
    </div>
</aside>
