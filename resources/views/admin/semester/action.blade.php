<div class="d-flex justify-content-center gap-1">
    {{-- <a href="{{ route('admin.semester.show', $semester->id) }}" class="btn btn-sm icon btn-info"><i
            class="bi bi-info-circle"></i></a> --}}
    {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $semester->id }}" class="btn btn-sm icon btn-primary"><i
            class="bi bi-pencil"></i></a> --}}
    <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $semester->id }}"
        class="btn btn-sm icon btn-danger"><i class="bi bi-trash-fill"></i></a>
</div>


<!-- Modal -->
<div class="modal fade" id="delete-{{ $semester->id }}" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Formulir Hapus Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Apakah anda yakin ingin menghapus semester
                    <span class="fw-bold">
                        {{ $semester->semester_number }}
                    </span> ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="{{ route('admin.semester.destroy', $semester->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
