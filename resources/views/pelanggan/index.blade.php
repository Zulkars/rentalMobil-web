<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Rental Mobil</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h2>Sistem Informasi Rental Mobil</h2>
    </header>

    <main class="data-pelanggan">

        {{-- Informasi Pengguna dan Logout --}}
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

        <div class="data-container">

            <div class="judul-data">
                <h2>Data Pelanggan</h2>
                <p>Kelola informasi pelanggan rental mobil.</p>
            </div>

            <div class="data-toolbar">
                <span class="info-data">Daftar seluruh pelanggan</span>

                <div class="menu-aksi">
                    <a href="{{ route('home') }}" class="tombol-home">
                        Kembali ke Home
                    </a>

                    <a href="{{ route('pelanggan.create') }}" class="tombol-tambah">
                        + Tambah Pelanggan
                    </a>
                </div>
            </div>

            <div class="tabel-wrapper">
                <table class="tabel-pelanggan">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No. SIM</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($pelanggan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->email ?? '-' }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_sim }}</td>

                                <td>
                                    <div class="aksi-data">

                                        {{-- Tombol Edit untuk Admin dan Petugas --}}
                                        <a class="btn-edit"
                                           href="{{ route('pelanggan.edit', $data->id) }}">
                                            Edit
                                        </a>

                                        {{-- Tombol Hapus khusus Admin --}}
                                        @if(Auth::user()->role === 'admin')
                                            <form action="{{ route('pelanggan.destroy', $data->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-hapus">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align:center; padding:25px;">
                                    Belum ada data pelanggan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <footer>
        <p>Sistem Informasi Rental Mobil</p>
    </footer>

</body>

</html>