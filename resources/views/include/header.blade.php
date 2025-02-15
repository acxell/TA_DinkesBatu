{{-- header --}}

<header>
    <div class="container-fluid" style="height: 100px">
        <div class="d-flex justify-content-between align-items-center mx-2 my-3 rounded-4"
            style="background-color: white; min-height: 75px">
            <a href="#" id="burger-btn" class="burger-btn d-xl-none d-block text-black mx-2">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <div class="container my-auto d-xl-block d-none">
                {{-- <h5>Selamat Datang Kembali,{{ Auth::user()->nama }} </h5> --}}
                <h5>Selamat Datang Kembali, </h5>

                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </a>
            </div>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md text-black w-100">
                                <i class="bi bi-person-fill mx-2 w-100 d-block h-auto"></i>
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem">
                    <li>
                        <h6 class="dropdown-header">
                            {{-- Hello, {{ Auth::user()->nama }} --}}
                        </h6>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>
                            Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left me-2"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>