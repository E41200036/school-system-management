<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Guru</h3>
                </div>
                {{ Breadcrumbs::render('teacher-create') }}
            </div>
        </div>
        <section class="section mt-3">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">Default Layout</h4>
                </div> --}}
                <div class="card-body">
                    <form action="{{ route('admin.teacher.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_code">Kode Guru</label>
                                    <input type="text" class="form-control mt-1" id="teacher_code" name="teacher_code"
                                        value="{{ $teacherCode }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="joining_date">Bergabung Sejak</label>
                                    <input type="text" class="form-control mt-1" id="joining_date" name="joining_date"
                                        value="{{ date('Y-m-d') }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="salary">Gaji</label>
                                    <input type="text" class="form-control mt-1" id="salary" name="salary"
                                        value="{{ @old('salary') }}">
                                </div>
                                <div class="form-group">
                                    <label for="designation">Jabatan</label>
                                    <select class="choices form-select rounded-3 mt-1" id="designation" name="designation">
                                        @foreach ($roles as $role)
                                            @if ($role->id == 1 || $role->id == 2 || $role->id == 3 || $role->id == 6 || $role->id == 7)
                                                @continue
                                            @else
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qualification">Kualifikasi</label>
                                    <input type="text" class="form-control mt-1" id="qualification" name="qualification"
                                        value="{{ @old('qualification') }}">
                                </div>
                                <div class="form-group">
                                    <label for="experience">Pengalaman</label>
                                    <input type="text" class="form-control mt-1" id="experience" name="experience"
                                        value="{{ @old('experience') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="first_name">Nama Depan</label>
                                            <input type="text" class="form-control mt-1" id="first_name" name="first_name"
                                                value="{{ @old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="last_name">Nama Belakang</label>
                                            <input type="text" class="form-control mt-1" id="last_name" name="last_name"
                                                value="{{ @old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="radio" name="gender" id="L"
                                            value="L">
                                        <label class="form-check-label" for="L">
                                            Laki Laki
                                        </label>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="radio" name="gender" id="P"
                                            value="P">
                                        <label class="form-check-label" for="P">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Tanggal Lahir</label>
                                    <input type="text" class="form-control mt-1" id="dob" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" name="address" class="form-control mt-1">{{ @old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control mt-1" id="email" name="email"
                                        value="{{ @old('email') }}" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="alternate_email">Email Alternatif <small
                                            class="text-muted">(Opsional)</small></label>
                                    <input type="email" class="form-control mt-1" id="alternate_email"
                                        name="alternate_email" value="{{ @old('alternate_email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number_1">Nomor Telepon</label>
                                    <input type="text" class="form-control mt-1" id="phone_number_1"
                                        name="phone_number_1" value="{{ @old('phone_number_1') }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number2">Nomor Telepon 2 <small
                                            class="text-muted">(Optional)</small></label>
                                    <input type="text" class="form-control mt-1" id="phone_number_2"
                                        name="phone_number_2" value="{{ @old('phone_number_2') }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control mt-1" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                    <input type="password" class="form-control mt-1" id="password_confirmation"
                                        name="password_confirmation">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-end gap-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button class="btn btn-light btn-clear" type="button">Kosongkan Field</button>
                </div>
                </form>
            </div>
        </section>
    </div>
    @push('js-internal')
        <script>
            $(document).ready(function() {

                $('#dob').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                $('#salary').on('keyup', function() {
                    // add comma to separate thousands
                    var val = $(this).val();
                    val = val.replace(/\./g, '');
                    val = val.replace(/,/g, '.');
                    val = val.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                    $(this).val(val);
                });

                $('#password_confirmation').on('keyup', function() {
                    var password = $('#password').val();
                    var password_confirmation = $('#password_confirmation').val();
                    if (password != password_confirmation) {
                        $('#password_confirmation').addClass('is-invalid');
                    } else {
                        $('#password_confirmation').removeClass('is-invalid');
                        $('#password_confirmation').addClass('is-valid');
                    }
                });

                // check if alternate email equal to email
                $('#alternate_email').on('keyup', function() {
                    var email = $('#email').val();
                    var alternate_email = $('#alternate_email').val();
                    if (email == alternate_email) {
                        $('#alternate_email').addClass('is-invalid');
                        $('#alternate_email').removeClass('is-valid');
                    } else {
                        $('#alternate_email').addClass('is-valid');
                        $('#alternate_email').removeClass('is-invalid');
                    }
                });

                $('.btn-clear').on('click', function() {
                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#email').val('');
                    $('#alternate_email').val('');
                    $('#phone_number_1').val('');
                    $('#phone_number_2').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    $('#address').val('');
                    $('#dob').val('');
                    $('#salary').val('');
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
