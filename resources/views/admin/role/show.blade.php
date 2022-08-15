<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Role</h3>
                </div>
                {{ Breadcrumbs::render('role-show', $role) }}
            </div>
        </div>
        <section class="section mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nama Role</label>
                                <input type="text" class="form-control mt-1" id="name" name="name"
                                    value="{{ $role->name }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        @foreach ($permissions as $permission)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="{{ $permission->id }}" class="form-check-input"
                                            name="permission[]" value="{{ $permission->name }}" {{
                                            $role->permissions->contains($permission) ? 'checked' : '' }} @disabled(true)>
                                        <label for="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('js-internal')
        <script>
            $(document).ready(function() {
                $('#selectAll').click(function() {
                    $('.form-check-input').prop('checked', $(this).prop('checked'));
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
