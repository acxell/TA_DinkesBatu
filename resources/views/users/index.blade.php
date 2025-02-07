@extends('layout.index')
@section('title', 'dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Card di Kiri -->
            <div class="col-lg-4 mb-3">
                <x-card class="h-100">
                    <form id="userForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
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
                            <tbody>
                                @foreach ($users as $user)
                                    <tr id="user_{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning" onclick="deleteUser({{ $user->id }})">Edit</button>
                                            <button class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>
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

@endsection

<script>
    document.getElementById('userForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch("{{ route('users.store') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json" // Add this line
                },
                credentials: "same-origin" // Add this line
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(user => {
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to create user');
            });
    });

    function deleteUser(id) {
        if (!confirm('Are you sure you want to delete this user?')) return;

        fetch(`/users/${id}/delete`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json"
                },
                credentials: "same-origin"
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(() => {
                document.getElementById(`user_${id}`).remove();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to delete user');
            });
    }
</script>
</body>

</html>
