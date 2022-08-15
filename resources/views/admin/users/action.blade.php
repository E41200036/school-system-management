<div class="d-flex justify-content-center gap-1">
    <a type="button" data-bs-toggle="modal" data-bs-target="#info-{{ $user->id }}" class="btn btn-sm icon btn-info"><i
            class="bi bi-info-circle"></i></a>
    <a type="button" data-bs-toggle="modal" data-bs-target="#edit-{{ $user->id }}"
        class="btn btn-sm icon btn-primary"><i class="bi bi-pencil"></i></a>
    <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $user->id }}"
        class="btn btn-sm icon btn-danger"><i class="bi bi-trash-fill"></i></a>
</div>

{{-- info --}}
<div class="modal fade modal-borderless" id="info-{{ $user->id }}" tabindex="-1" aria-labelledby="infoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoLabel">Detail Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="first_name">Nama Depan</label>
                            <input type="text" class="form-control mt-1" id="first_name" name="first_name"
                                value="{{ $user->first_name }}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="last_name">Nama Belakang</label>
                            <input type="text" class="form-control mt-1" id="last_name" name="last_name"
                                value="{{ $user->last_name }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mt-1" id="email" name="email"
                                value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="alternate_email">Email Alternatif (Opsional)</label>
                            <input type="alternate_email" class="form-control mt-1" id="alternate_email"
                                name="alternate_email" value="{{ $user->alternate_email }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="phone_number_1">Nomor Telefon</label>
                        <input type="phone_number_1" class="form-control mt-1" id="phone_number_1" name="phone_number_1"
                            value="{{ $user->phone_number_1 }}" disabled>
                    </div>
                    <div class="form-group col">
                        <label for="phone_number_2">Nomor Telefon 2 (Opsional)</label>
                        <input type="phone_number_2" class="form-control mt-1" id="phone_number_2" name="phone_number_2"
                            value="{{ $user->phone_number_2 }}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group col">
                            <label for="dob">Tanggal Lahir</label>
                            <input type="text" disabled class="form-control mt-1" id="dob" name="dob"
                                value="{{ $user->dob }}" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-select" disabled>
                                <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Laki Laki</option>
                                <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea name="address" id="address" rows="5" disabled class="form-control mt-1">{{ $user->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-select rounded-3" id="role" name="role" disabled>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->roles->pluck('name')[0] == $role->name ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit --}}
<div class="modal fade modal-borderless" id="edit-{{ $user->id }}" tabindex="-1" aria-labelledby="editLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Formulir Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="col">
                            <div class="form-group">
                                <label for="first_name">Nama Depan</label>
                                <input type="text"
                                    class="form-control mt-1 @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" value="{{ $user->first_name }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="last_name">Nama Belakang</label>
                                <input type="text"
                                    class="form-control mt-1 @error('last_name') is-invalid @enderror" id="last_name"
                                    name="last_name" value="{{ $user->last_name }}">
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
                                    id="email" name="email" value="{{ $user->email }}">
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
                                    value="{{ $user->alternate_email }}">
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
                                id="phone_number_1" name="phone_number_1" value="{{ $user->phone_number_1 }}">
                            @error('phone_number_1')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="phone_number_2">Nomor Telefon 2 (Opsional)</label>
                            <input type="phone_number_2"
                                class="form-control mt-1 @error('phone_number_2') is-invalid @enderror"
                                id="phone_number_2" name="phone_number_2" value="{{ $user->phone_number_2 }}">
                            @error('phone_number_2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group col">
                                <label for="dob">Tanggal Lahir</label>
                                <input type="text" class="form-control mt-1" id="dob" name="dob"
                                    value="{{ $user->dob }}">
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
                                        <input class="form-check-input" type="radio" name="gender" id="L"
                                            value="L" {{ $user->gender == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="L">
                                            Laki - Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="P"
                                            value="P" {{ $user->gender == 'P' ? 'checked' : '' }}>
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
                            class="form-control mt-1 @error('address') is-invalid @enderror">{{ $user->address }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select rounded-3" id="role" name="role">
                            @foreach ($roles as $role)
                                @if ($role->id == 4 || $role->id == 5 || $role->id == 7)
                                    @continue
                                @endif
                                <option value="{{ $role->name }}"
                                    {{ $user->roles->pluck('name')[0] == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
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
                    <button type="submit" class="btn btn-primary ml-1">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

{{-- Delete --}}
<div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteTitle"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTitle">
                    Formulir Hapus Data User
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
                <p>Apakah anda yakin ingin menghapus data <span class="fw-bold">{{ $user->fullname }}</span> ?
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
                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
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


@push('js-internal')
    <script>
        $(document).ready(function() {
            $('#role').select2({
                placeholder: 'Pilih Role',
                data: [
                    @foreach ($roles as $role)
                        {
                            id: '{{ $role->id }}',
                            text: '{{ $role->name }}'
                        },
                    @endforeach
                ],
                allowClear: true
            });
        });
    </script>
@endpush
