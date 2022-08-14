<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Pengguna</h3>
                </div>
                {{ Breadcrumbs::render('user') }}
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addUser">
                                Tambah Pengguna
                            </button>
                        </div>
                    </div>
                    <table id="user-table" class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Email Alternatif</th>
                                <th>Nomor Telefon</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade modal-borderless" id="addUser" tabindex="-1" aria-labelledby="addUserLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Formulir Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="first_name">Nama Depan</label>
                                    <input type="text"
                                        class="form-control mt-1 @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name" value="{{ @old('first_name') }}">
                                    @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name">Nama Belakang</label>
                                    <input type="text"
                                        class="form-control mt-1 @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" value="{{ @old('last_name') }}">
                                    @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mt-1 @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ @old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="alternate_email">Email Alternatif (Opsional)</label>
                                    <input type="alternate_email"
                                        class="form-control mt-1 @error('alternate_email') is-invalid @enderror"
                                        id="alternate_email" name="alternate_email"
                                        value="{{ @old('alternate_email') }}">
                                    @error('alternate_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="phone_number_1">Nomor Telefon</label>
                                <input type="phone_number_1"
                                    class="form-control mt-1 @error('phone_number_1') is-invalid @enderror"
                                    id="phone_number_1" name="phone_number_1" value="{{ @old('phone_number_1') }}">
                                @error('phone_number_1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="phone_number_2">Nomor Telefon 2 (Opsional)</label>
                                <input type="phone_number_2"
                                    class="form-control mt-1 @error('phone_number_2') is-invalid @enderror"
                                    id="phone_number_2" name="phone_number_2" value="{{ @old('phone_number_2') }}">
                                @error('phone_number_2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group col">
                                    <label for="dob">Tanggal Lahir</label>
                                    <input type="dob" class="form-control mt-1" id="dob" name="dob">
                                    @error('dob')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div class="d-flex d-inline align-item-center gap-2 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="L" value="L">
                                            <label class="form-check-label" for="L">
                                                Laki - Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="P" value="P">
                                            <label class="form-check-label" for="P">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" rows="5"
                                class="form-control mt-1 @error('address') is-invalid @enderror"></textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-select rounded-3" id="role" name="role">
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js-internal')
        <script>
            $(document).ready(function() {

                $('#dob').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('.alert-error').fadeTo(2000, 500).slideUp(500, function() {
                    $('.alert-error').slideUp(500);
                });

                $('#role').select2({
                    placeholder: 'Pilih Role',
                    allowClear: true,
                    theme: 'bootstrap-5',
                    width: '100%',
                    data: [
                        @foreach ($roles as $role)
                            @if ($role->id == 4 || $role->id == 5 || $role->id == 7)
                                @continue
                            @endif {
                                id: '{{ $role->name }}',
                                text: '{{ $role->name }}'
                            },
                        @endforeach
                    ]
                });

                $('#user-table').DataTable({
                    responsive: true,
                    processing: true,
                    autoWidth: false,
                    ajax : '{!! route('admin.user.index') !!}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            orderable: false,
                        },
                        {
                            data: 'fullname',
                            name: 'fullname'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'alternate_email',
                            name: 'alternate_email'
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
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'action',
                            name: 'action',
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
