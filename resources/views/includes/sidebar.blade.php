<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0a1a3f">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ url('logo-pendidikan.png') }}" alt="" width="40">
        </div>
        <div class="sidebar-brand-text mx-3">PRESTASI SMA IT IQRA' </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen
    </div>

    @if (Auth::user()->role == 'ADMIN')
    <!-- Nav Item - Tables -->
    <li class="nav-item @if(Route::is('prestasi.*')) active @endif">
        <a class="nav-link" href="{{ route('prestasi.index') }}">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Prestasi</span></a>
    </li>
    <li class="nav-item @if(Route::is('berita.*')) active @endif">
        <a class="nav-link" href="{{ route('berita.index') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Berita</span></a>
    </li>
    <li class="nav-item @if(Route::is('siswa.*')) active @endif">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa</span></a>
    </li>
    <li class="nav-item @if(Route::is('siswa.*')) active @endif">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Guru</span></a>
    </li>
    <!-- <li class="nav-item @if(Route::is('prestasis.laporan')) active @endif">
        <a class="nav-link" href="{{ route('prestasis.laporan') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Cetak Laporan</span></a>-->
    </li>
    @else

    <li class="nav-item @if(Route::is('prestasi.*')) active @endif">
        <a class="nav-link" href="{{ route('prestasi.kelola') }}">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Data Prestasi</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
