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
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor" d="..."></path>
                    </svg>
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

                @can('view_menu_user')
                    <li class="sidebar-item has-sub {{ request()->is('reports*') ? 'active' : '' }}">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-file-earmark-ruled-fill"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item {{ request()->routeIs('reports.neraca') ? 'active' : '' }}">
                                <a href="{{ route('reports.neraca') }}" class="submenu-link">Neraca</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('reports.aktivitas') ? 'active' : '' }}">
                                <a href="{{ route('reports.aktivitas') }}" class="submenu-link">Aktivitas</a>
                            </li>
                            <li class="submenu-item {{ request()->routeIs('reports.arusKas') ? 'active' : '' }}">
                                <a href="{{ route('reports.arusKas') }}" class="submenu-link">Arus Kas</a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="sidebar-item  ">
                        <a href="{{ route('reports') }}" class="sidebar-link">
                            <i class="bi bi-file-earmark-ruled-fill"></i>
                            <span>Laporan</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item {{ request()->is('ratio*') ? 'active' : '' }}">
                        <a href="{{ url('ratio') }}" class="sidebar-link">
                            <i class="bi bi-bar-chart-line"></i>
                            <span>Rasio</span>
                        </a>
                    </li>
                @endcan
                @can('view_menu_admin')
                    <li class="sidebar-item {{ request()->is('permissions*') ? 'active' : '' }}">
                        <a href="{{ url('permissions') }}" class="sidebar-link">
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Permissions</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('roles*') ? 'active' : '' }}">
                        <a href="{{ url('roles') }}" class="sidebar-link">
                            <i class="bi bi-patch-plus-fill"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('users*') ? 'active' : '' }}">
                        <a href="{{ url('users') }}" class="sidebar-link">
                            <i class="bi bi-person-fill"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
