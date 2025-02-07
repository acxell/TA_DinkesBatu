{{-- sidebar --}}

<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="#">
                        <img src="" alt="Logo" srcset="" />
                    </a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
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
                        <span>Laporan Perkembangan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Neraca</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Aktivitas</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#" class="submenu-link">Arus Kas</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Profil Anak</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer position-absolute bottom-0 w-100 p-3">
            @include('include.footer')
        </div>
    </div>
</div>
