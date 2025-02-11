@extends('layout.index')
@section('title', 'Users Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @include('users.create')
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary-color" data-bs-toggle="modal" data-bs-target="#createModal">
                        Tambah Data
                    </button>
                    <button class="btn btn-primary-color" id="reload">
                        Reload dataTables
                    </button>
                </div>
                <x-card class="h-100">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%" id="userTable">
                            <thead class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="user_{{ $user->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete('{{ $user->id }}')">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/users.js') }}"></script>
@endsection

{{-- <script>
function confirmDelete(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            // Create a form dynamically
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = `/users/${id}`;

            // Add CSRF token
            var csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // Add method spoofing
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);

            // Submit the form
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script> --}}
