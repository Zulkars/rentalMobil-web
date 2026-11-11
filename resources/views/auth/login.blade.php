<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Rental Mobil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-page">

    <header class="auth-header">
        <h1>Sistem Informasi Rental Mobil</h1>
        <p>Kelola informasi rental mobil dengan mudah</p>
    </header>

    <main class="auth-main">
        <div class="auth-container">
            <h2 class="auth-title">Login</h2>
            <p class="auth-description">
                Masuk menggunakan akun yang sudah terdaftar.
            </p>

            @if (session('success'))
                <div class="auth-alert auth-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="auth-alert">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="auth-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        required
                    >
                </div>

                <div class="auth-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit" class="auth-button">
                    Login
                </button>
            </form>

            <p class="auth-link">
                Belum punya akun?
                <a href="{{ route('register') }}">Register di sini</a>
            </p>
        </div>
    </main>

    <footer class="auth-footer">
        Sistem Informasi Rental Mobil
    </footer>

</body>
</html>
