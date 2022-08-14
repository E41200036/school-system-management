<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Guru</h3>
                </div>
                {{ Breadcrumbs::render('teachers') }}
            </div>
        </div>
        <section class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <table id="teacher-table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kd.Guru</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kualifikasi</th>
                                <th>Pengalaman</th>
                                <th>Nomor Telfon</th>
                                <th>Tanggal Lahir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @push('js-internal')
        <script>
            $(document).ready(function() {

                $('#teacher-table').DataTable({
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: '{!! route('admin.teacher.index') !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'teacher_code',
                            name: 'teacher_code'
                        },
                        {
                            data: 'fullname',
                            name: 'fullname'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'qualification',
                            name: 'qualification'
                        },
                        {
                            data: 'experience',
                            name: 'experience'
                        },
                        {
                            data: 'phone_number_1',
                            name: 'phone_number_1'
                        },
                        {
                            data: 'dob',
                            name: 'dob'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
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
