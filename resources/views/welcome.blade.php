<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h1>Sistem Informasi Rental Mobil</h1>
    </header>

    <main>

        {{-- Informasi pengguna dan Logout --}}
        <div class="user-menu">
            <span>
                Login sebagai:
                <strong>{{ Auth::user()->username }}</strong>
                ({{ ucfirst(Auth::user()->role) }})
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>

        <section>

            <article>
                <img src="{{ asset('assets/McLarren.jpg') }}" alt="McLarren">

                <h2>McLarren</h2>
                <p>Nomor Plat: D 1234 PQW</p>
                <p>Tahun: 2020</p>
                <p>Transmisi: Automatic</p>

                <a href="{{ route('mobil.detail') }}">Lihat Detail</a>
            </article>

            <article>
                <img src="{{ asset('assets/Ferrari.jpg') }}" alt="Ferrari">

                <h2>Ferrari</h2>
                <p>Nomor Plat: D 5678 ZZZ</p>
                <p>Tahun: 2021</p>
                <p>Transmisi: Automatic</p>

                <a href="{{ route('mobil.detail') }}">Lihat Detail</a>
            </article>

            <article>
                <img src="{{ asset('assets/Civic.jpg') }}" alt="Civic">

                <h2>Civic</h2>
                <p>Nomor Plat: D 1234 XYZ</p>
                <p>Tahun: 2021</p>
                <p>Transmisi: Manual</p>

                <a href="{{ route('mobil.detail') }}">Lihat Detail</a>
            </article>

        </section>

        <div class="menu-pelanggan">
            <a href="{{ route('pelanggan.index') }}">
                Kelola Data Pelanggan
            </a>
        </div>

    </main>

    <footer>
        <span>Muhammad Dzulkarnain</span>
        <span>102022530047</span>
        <span>SI4906</span>
        <span>Kelompok 05</span>
        <span>Modul Armada Kendaraan</span>
    </footer>

</body>

</html>