<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan - Rental Mobil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h2>Sistem Informasi Rental Mobil</h2>
    </header>

    <main class="form-container">
        <h2>Data Diri Pelanggan</h2>

        <p>Silakan isi informasi pelanggan rental mobil.</p>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap') }}" required>
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik"
                    value="{{ old('nik') }}" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp"
                    value="{{ old('no_hp') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                    value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="no_sim">No. SIM</label>
                <input type="text" id="no_sim" name="no_sim"
                    value="{{ old('no_sim') }}" required>
            </div>

            <div class="form-button">
                <a href="{{ url('/home') }}" class="btn-kembali">
                    Kembali ke Home
                </a>

                <button type="submit" class="btn-simpan">
                    Simpan Data
                </button>
            </div>
        </form>
    </main>

    <footer>
        <p>Sistem Informasi Rental Mobil</p>
    </footer>

</body>

</html>