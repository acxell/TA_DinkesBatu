@extends('layout.index')
@section('title', 'Users Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Card di Kiri -->
            <div class="col-lg-4 mb-3">
                <x-card class="h-100">
                    <form id="userForm" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="nameID" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="emailID" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="passwordID" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Password" required>
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
                        <table class="table table-bordered" id="userTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>

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
