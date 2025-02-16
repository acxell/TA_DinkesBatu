@extends('layout.index')
@section('title', 'Posyandu Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {{-- @include('users.create') --}}
                <x-card class="h-100">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="posyandu-tab" data-bs-toggle="tab"
                                data-bs-target="#posyandu-tab-pane" type="button" role="tab"
                                aria-controls="posyandu-tab-pane" aria-selected="true">Posyandu</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="akun-posyandu-tab" data-bs-toggle="tab"
                                data-bs-target="#akun-posyandu-tab-pane" type="button" role="tab"
                                aria-controls="akun-posyandu-tab-pane" aria-selected="false">Akun Posyandu</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="posyandu-tab-pane" role="tabpanel"
                            aria-labelledby="posyandu-tab" tabindex="0">
                            <div class="d-flex justify-content-between mb-3">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                </form>
                                <div class="d-flex gap-3">
                                    <button class="btn btn-secondary-color" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Tambah Posyandu
                                    </button>
                                    <button class="btn btn-secondary-color">
                                        Ekspor <i class="bi bi-download ms-2"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" style="width:100%">
                                    <thead class="table primary-thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Posyandu</th>
                                            <th>Alamat</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($users as $user)
                                    <tr id="user_{{ $user->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->userStatus->name }}</td>
                                        <td>
                                        @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                        <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                        @endforeach
                                        @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$user->id}}">
                                                Edit
                                            </button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('users.edit', ['user' => $user])
                                    @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="akun-posyandu-tab-pane" role="tabpanel"
                            aria-labelledby="akun-posyandu-tab" tabindex="0">
                            <div class="d-flex justify-content-between mb-3">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                </form>
                                <div class="d-flex gap-3">
                                    <button class="btn btn-secondary-color" data-bs-toggle="modal"
                                        data-bs-target="#createModal">
                                        Tambah Akun
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" style="width:100%">
                                    <thead class="table primary-thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($users as $user)
                                    <tr id="user_{{ $user->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->userStatus->name }}</td>
                                        <td>
                                        @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                        <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                        @endforeach
                                        @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$user->id}}">
                                                Edit
                                            </button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('users.edit', ['user' => $user])
                                    @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </x-card>
                @if (session('success'))
                    <x-toast>
                        <x-slot name="title">
                            Berhasil!
                        </x-slot>
                        {{ session('success') }}
                    </x-toast>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
