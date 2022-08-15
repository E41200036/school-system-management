<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Role</h3>
                </div>
                {{ Breadcrumbs::render('role') }}
            </div>
        </div>
        <section class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 text-end">
                        <div class="col">
                            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Tambah Role</a>
                        </div>
                    </div>
                    <table id="role-table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#role-table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.role.index') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'name', name: 'name' },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ],
                });
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
        </script>
    @endpush
</x-app-layout>
