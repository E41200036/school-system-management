<div class="d-flex justify-content-center gap-1">
    <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-sm icon btn-info"><i
            class="bi bi-info-circle"></i></a>
    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm icon btn-primary"><i
            class="bi bi-pencil"></i></a>
    <a data-bs-toggle="modal" data-bs-target="#delete-{{ $role->id }}" class="btn btn-sm icon btn-danger"><i
            class="bi bi-trash-fill"></i></a>
</div>

<div class="modal fade" id="delete-{{ $role->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Hapus Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah anda yakin ingin menghapus role <span class="fw-bold">{{ $role->name }}</span>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="{{ route('admin.role.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
