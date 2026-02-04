<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan Sarana Sekolah</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            margin: 0;
            background-color: #f4f6f8;
        }
        header {
            background-color: #2f80ed;
            color: white;
            padding: 15px 25px;
            font-size: 20px;
            font-weight: bold;
        }
        .container {
            padding: 25px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
        .card h3 {
            margin: 0;
            font-size: 16px;
            color: #555;
        }
        .card p {
            margin-top: 10px;
            font-size: 28px;
            font-weight: bold;
            color: #2f80ed;
        }
        .table-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }
        table th {
            background-color: #f0f3f7;
        }
        .status {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            color: white;
            display: inline-block;
        }
        .pending { background-color: #f2994a; }
        .process { background-color: #2d9cdb; }
        .done { background-color: #27ae60; }
    </style>
</head>
<body>

<header style="display: flex; justify-content: space-between; align-items: center;">
    <div>Dashboard Pengaduan Sarana Sekolah - @if(Auth::user()->role == 'admin') Admin @else Siswa @endif</div>
    <div>
        <a href="{{ route('profile') }}">
            @if(Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;">
            @elseif(Auth::user()->gender == 'male')
                <img src="{{ asset('storage/imgfrofile/default propile pria.jpg') }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;">
            @elseif(Auth::user()->gender == 'female')
                <img src="{{ asset('storage/imgfrofile/default propile wanita.jpg') }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;">
            @else
                <img src="{{ asset('storage/imgfrofile/default propile pria.jpg') }}" alt="Profile" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;">
            @endif
        </a>
    </div>
</header>

<div class="container">

    <div class="cards">
        @if(Auth::user()->role == 'admin')
            <div class="card">
                <h3>Total Pengaduan</h3>
                <p>25</p>
            </div>
            <div class="card">
                <h3>Menunggu</h3>
                <p>10</p>
            </div>
            <div class="card">
                <h3>Diproses</h3>
                <p>8</p>
            </div>
            <div class="card">
                <h3>Selesai</h3>
                <p>7</p>
            </div>
            <div class="card">
                <h3>Total Users</h3>
                <p>5</p>
            </div>
        @else
            <div class="card">
                <h3>Pengaduan Saya</h3>
                <p>3</p>
            </div>
            <div class="card">
                <h3>Menunggu</h3>
                <p>1</p>
            </div>
            <div class="card">
                <h3>Diproses</h3>
                <p>1</p>
            </div>
            <div class="card">
                <h3>Selesai</h3>
                <p>1</p>
            </div>
        @endif
    </div>

    @if(Auth::user()->role == 'admin')
        <div class="table-box">
            <h3>Semua Pengaduan</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Sarana</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Andi</td>
                        <td>Kursi Rusak</td>
                        <td>12-02-2026</td>
                        <td><span class="status pending">Menunggu</span></td>
                        <td><button>Update Status</button></td>
                    </tr>
                    <tr>
                        <td>Siti</td>
                        <td>Proyektor Mati</td>
                        <td>11-02-2026</td>
                        <td><span class="status process">Diproses</span></td>
                        <td><button>Update Status</button></td>
                    </tr>
                    <tr>
                        <td>Budi</td>
                        <td>AC Bocor</td>
                        <td>10-02-2026</td>
                        <td><span class="status done">Selesai</span></td>
                        <td><button>Update Status</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="table-box">
            <h3>Pengaduan Saya</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sarana</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kursi Rusak</td>
                        <td>12-02-2026</td>
                        <td><span class="status pending">Menunggu</span></td>
                    </tr>
                    <tr>
                        <td>Proyektor Mati</td>
                        <td>11-02-2026</td>
                        <td><span class="status process">Diproses</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

</div>

</body>
</html>
