<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
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
            <label for="roleInput" class="form-label fw-semibold">Role</label>
            <select class="form-select" name="roles" id="role">
              @foreach ($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12">
            <button class="btn btn-primary-color w-100 mb-1">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>