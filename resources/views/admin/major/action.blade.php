<div class="d-flex justify-content-center gap-1">
    <a type="button" onclick="buttonEdit('{{ $major->id }}')" class="btn btn-sm icon btn-primary"><i
            class="bi bi-pencil"></i></a>
    <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $major->id }}"
        class="btn btn-sm icon btn-danger"><i class="bi bi-trash-fill"></i></a>
</div>

<div class="modal fade" id="delete-{{ $major->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah kamu yakin ingin menghapus <span class="fw-bold">{{ $major->name }}</span> ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="{{ route('admin.major.destroy', $major->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
