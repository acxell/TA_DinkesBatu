@extends('layout.index')
@section('title', 'dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Card di Kiri -->
        <div class="col-lg-4 mb-3">
            <x-card class="h-100">
                <form id="userForm" class="row g-3" action="{{ route('users.store') }}" method="POST" data-reload="true">
                    @csrf
                    <div class="col-12">
                        <label for="nameID" class="form-label">Name</label>
                        <input type="text" id="nameID" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-12">
                        <label for="emailID" class="form-label">Email</label>
                        <input type="email" id="emailID" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-12">
                        <label for="passwordID" class="form-label">Password</label>
                        <input type="password" id="passwordID" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary-color w-100">Simpan</button>
                    </div>
                </form>
            </x-card>
        </div>

        <!-- Datatables di Kanan -->
        <div class="col-lg-8">
            <x-card class="h-100">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach ($users as $user)
                            <tr id="user_{{ $user->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $user->id }}')">
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

{{-- <form id="userForm">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Create</button>
    </form>

    <table id="userTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr id="user_{{ $user->id }}">
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>
    <button onclick="deleteUser({{ $user->id }})">Delete</button>
</td>
</tr>
@endforeach
</tbody>
</table> --}}

<script>
$(document).ready(function() {
    $('#userForm').submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                loadUserTable(); // Perbarui tabel tanpa reload penuh
                $('#userForm')[0].reset(); // Reset form setelah submit
                Swal.fire('Berhasil!', 'User telah ditambahkan.', 'success');
            },
            error: function() {
                Swal.fire('Error!', 'Gagal menyimpan user.', 'error');
            }
        });
    });

    function loadUserTable() {
        $.get("{{ route('users.index') }}", function(data) {
            let usersTable = $(data).find("#userTableBody").html();
            $("#userTableBody").html(usersTable);
        });
    }
});

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
</script>




@endsection