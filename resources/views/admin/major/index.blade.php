<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Jurusan</h3>
                </div>
                {{ Breadcrumbs::render('major') }}
            </div>
        </div>
        {{-- show error message --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col text-end">
                            <button type="button" class="btn btn-primary btn-create" data-bs-toggle="modal"
                                data-bs-target="#modal">
                                Tambah Jurusan
                            </button>
                        </div>
                    </div>
                    <table id="major-table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jurusan</th>
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
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Formulir Tambah Jurusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.major.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="void-field">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js-internal')
        <script>

            function resetForm()
            {
                $('form').trigger('reset');
                $('.modal-footer button[type=submit]').text('Simpan');
                $('.modal-title').text('Formulir Tambah Jurusan');
                $('form').attr('action', '{{ route('admin.major.store') }}');
                $('input[name="_method"]').remove();
                $('#void-field').val('');
            }

            function setData(params)
            {
                $('#name').val(params.name);
                $('#void-field').val(params.id);
            }

            function configEdit(data)
            {
                $('#modal').modal('show');
                $('.modal-title').text('Formulir Ubah Jurusan');

                let url = "{{ route('admin.major.update', ':id') }}".replace(':id', data.id);
                $('form').attr('action', url);
                $('@method('PUT')').insertBefore('#void-field');

                setData(data)
            }

            function buttonEdit(params) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('admin.major.show', ':id') }}".replace(':id', params),
                    success: function(data) {
                        configEdit(data);
                    }
                })
            }

            $(document).ready(function() {

                $('#major-table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.major.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });

                $('.btn-create').on('click', function() {
                    resetForm();
                });

                @if (Session::has('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ Session::get('success') }}',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                @endif

                @if (Session::has('error'))
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ Session::get('error') }}',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                @endif
            });
        </script>
    @endpush
</x-app-layout>
