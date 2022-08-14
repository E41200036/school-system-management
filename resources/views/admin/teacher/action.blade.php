<div class="d-flex justify-content-center gap-1">
    <a href="{{ route('admin.teacher.show', $teacher->id) }}" class="btn btn-sm icon btn-info"><i
            class="bi bi-info-circle"></i></a>
    <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-sm icon btn-primary"><i class="bi bi-pencil"></i></a>
    <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $teacher->id }}" class="btn btn-sm icon btn-danger"><i
            class="bi bi-trash-fill"></i></a>
</div>

<div class="modal fade" id="delete-{{ $teacher->id }}" tabindex="-1" aria-labelledby="deleteTitle" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTitle">
                    Formulir Hapus Data Guru
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data <span class="fw-bold">{{ $teacher->user->fullname }}</span> ?
                </p>
                <p>
                    <small class="text-muted">Data yang sudah dihapus tidak dapat dikembalikan lagi.</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
                <form action="{{ route('admin.teacher.destroy', $teacher->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
