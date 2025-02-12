<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Permission Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('permissions.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <label for="nameID" class="form-label">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Name"
                        required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary-color w-100 mb-1">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
