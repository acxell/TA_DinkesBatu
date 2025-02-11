{{-- sidebar --}}

<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center w-100">
                <a href="{{ route('dashboard') }}" class="w-100">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" class="w-80 h-auto d-block" />
                </a>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-ruled-fill"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Kecamatan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Kelurahan</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Profil Anak</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Data Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('users.index') }}" class="submenu-link">Data Pengguna</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('permissions.index') }}" class="submenu-link">Data Permission Pengguna</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('roles.index') }}" class="submenu-link">Data Role Pengguna</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer position-absolute bottom-0 w-100 p-3">
            @include('include.footer')
        </div>
    </div>
</div>
