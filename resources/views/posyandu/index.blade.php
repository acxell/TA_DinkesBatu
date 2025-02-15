@extends('layout.index')
@section('title', 'Posyandu Page')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            {{-- @include('users.create') --}}
            <div class="d-flex justify-content-end mb-3 gap-3">
                <button class="btn btn-primary-color" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Posyandu
                </button>
                <button class="btn btn-primary-color" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Akun Posyandu
                </button>
            </div>
            <x-card class="h-100">
                <div class="table-responsive">
                    <table class="table table-hover" style="width:100%">
                        <thead class="table">
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
            </x-card>
            @if(session('success'))
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