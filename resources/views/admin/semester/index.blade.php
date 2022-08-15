<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Semester</h3>
                </div>
                {{ Breadcrumbs::render('semester') }}
            </div>
        </div>
        <section class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#create">
                                Tambah Semester
                            </button>
                        </div>
                    </div>
                    <table id="semester-table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Formulir Tambah Semester</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.semester.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="semester_number" class="form-label">Nomor Semester</label>
                            <input type="number" class="form-control" name="semester_number" id="semester_number" value="{{ @old('semester_number') }}">
                            @error('semester_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>
            $(document).ready(function() {

                $('#semester-table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.semester.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'semester_number', name: 'semester_number' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });

                @if (Session::has('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ Session::get('success') }}',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        Swal.fire({
                            title: 'Error!',
                            text: '{{ $error }}',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    @endforeach
                @endif
            });
        </script>
    @endpush
</x-app-layout>
