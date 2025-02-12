@extends('layout.index')
@section('title', 'Permission Page')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @include('roles.create')
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary-color" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Data
                </button>
            </div>
            <x-card class="h-100">
                <div class="table-responsive">
                    <table class="table table-hover" style="width:100%">
                        <thead class="table">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr id="role_{{ $role->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$role->id}}">
                                        Edit
                                    </button>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @include('roles.edit', ['role' => $role])
                            @endforeach
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