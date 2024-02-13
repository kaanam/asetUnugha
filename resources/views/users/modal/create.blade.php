<!-- Modal -->
<div class="modal fade" id="user_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name"
                                    class="form-control @error('name', 'store') is-invalid @enderror" id="name"
                                    value="{{ old('name') }}" placeholder="Masukan nama lengkap..">
                                @error('name', 'store')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email', 'store') is-invalid @enderror" id="email"
                                    value="{{ old('email') }}" placeholder="Masukan alamat email..">
                                @error('email', 'store')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input type="password" name="password"
                                    class="form-control @error('password', 'store') is-invalid @enderror" id="password"
                                    value="{{ old('password') }}" placeholder="Masukan kata sandi..">
                                @error('password', 'store')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation', 'store') is-invalid @enderror"
                                    id="password_confirmation" value="{{ old('password_confirmation') }}"
                                    placeholder="Konfirmasi kata sandi..">
                                @error('password_confirmation', 'store')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="user_type">Tingkatan Pengguna</label>
                                <select name="user_type"
                                    class="form-control @error('user_type', 'store') is-invalid @enderror"
                                    id="user_type">
                                    <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>User Admin
                                    </option>
                                    <option value="pimpinan" {{ old('user_type') == 'pimpinan' ? 'selected' : '' }}>User
                                        Pimpinan</option>
                                </select>
                                @error('user_type', 'store')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
