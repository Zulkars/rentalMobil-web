<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h2>Sistem Informasi Rental Mobil</h2>
    </header>

    <main>
        <div class="form-container">
            <h2>Edit Data Pelanggan</h2>

            @if ($errors->any())
                <p style="color: red;">
                    {{ $errors->first() }}
                </p>
            @endif

            <form action="{{ route('pelanggan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap"
                        value="{{ old('nama_lengkap', $data->nama_lengkap) }}"
                        required>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text"
                        value="{{ $data->nik }}"
                        readonly>
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp"
                        value="{{ old('no_hp', $data->no_hp) }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                        value="{{ old('email', $data->email) }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" required>{{ old('alamat', $data->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label>No. SIM</label>
                    <input type="text" name="no_sim"
                        value="{{ old('no_sim', $data->no_sim) }}"
                        required>
                </div>

                <div class="form-button">
                    <button type="submit" class="btn-simpan">
                        Simpan Perubahan
                    </button>

                    <a href="{{ url('/pelanggan') }}" class="btn-kembali">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>Sistem Informasi Rental Mobil</p>
    </footer>

</body>

</html>