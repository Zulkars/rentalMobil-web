<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Informasi Rental Mobil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-page">

    <header class="auth-header">
        <h1>Sistem Informasi Rental Mobil</h1>
        <p>Kelola informasi rental mobil dengan mudah</p>
    </header>

    <main class="auth-main">
        <div class="auth-container">
            <h2 class="auth-title">Buat Akun</h2>
            <p class="auth-description">
                Daftarkan akun untuk mengakses sistem rental mobil.
            </p>

            @if ($errors->any())
                <div class="auth-alert">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="auth-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        maxlength="50"
                        required
                    >
                </div>

                <div class="auth-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        required
                    >
                </div>

                <div class="auth-group">
                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                    >
                </div>

                <button type="submit" class="auth-button">
                    Register
                </button>
            </form>

            <p class="auth-link">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </div>
    </main>

    <footer class="auth-footer">
        Sistem Informasi Rental Mobil
    </footer>

</body>
</html>
