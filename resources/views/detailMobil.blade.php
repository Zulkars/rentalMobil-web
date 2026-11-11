<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kendaraan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h1>Armada Kendaraan</h1>
    </header>

    <main>
        <section class="detail-kendaraan">

            <h2>Detail Kendaraan</h2>

            <div class="gambar-kendaraan">
                <img src="{{ asset('assets/McLarren.jpg') }}" alt="McLarren">
                <img src="{{ asset('assets/Mclarren detail1.jpg') }}" alt="McLarren">
            </div>

            <h3>McLarren</h3>

            <p>Unit Kendaraan: McLarren 765lt</p>
            <p>Nomor Plat: D 1234 PQW</p>
            <p>Merk: McLarren</p>
            <p>Tahun Pembuatan: 2020</p>
            <p>Tipe Transmisi: Automatic</p>

            <a href="{{ route('pelanggan.create') }}" class="btn-sewa">
                Sewa Mobil
            </a>

            <a href="{{ url('/home') }}">Kembali ke Home</a>

        </section>
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