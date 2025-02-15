{{-- Sidebar --}}
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
                {{-- Dashboard --}}
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Laporan --}}
                <li class="sidebar-item has-sub {{ request()->is('puskesmas*') ? 'submenu-open' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-ruled-fill"></i>
                        <span>Laporan Perkembangan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('reports*') ? 'active' : '' }}">
                            <a href="{{route('reports.index')}}" class="submenu-link">Daftar Laporan</a>
                        </li>
                    </ul>
                </li>

                {{-- Profil Anak --}}
                <li class="sidebar-item {{ request()->routeIs('#') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Profil Anak</span>
                    </a>
                </li>

                {{-- Kelola Unit --}}
                <li
                    class="sidebar-item has-sub {{ request()->is('puskesmas*') || request()->is('posyandu*') || request()->is('permissions*') || request()->is('roles*') ? 'submenu-open' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Kelola Unit</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('puskesmas.index') ? 'active' : '' }}">
                            <a href="{{ route('puskesmas.index') }}" class="submenu-link">Kelola Puskesmas</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('posyandu.index') ? 'active' : '' }}">
                            <a href="{{ route('posyandu.index') }}" class="submenu-link">Kelola Posyandu</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                            <a href="{{ route('permissions.index') }}" class="submenu-link">Data Permission
                                Pengguna</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="submenu-link">Data Role Pengguna</a>
                        </li>
                        <li class="submenu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="submenu-link">Kelola Pengguna</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Footer Sidebar --}}
        <div class="sidebar-footer position-absolute bottom-0 w-100 p-3">
            @include('include.footer')
        </div>
    </div>
</div>
