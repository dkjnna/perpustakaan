@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">
        <h1>Kembalikan Buku</h1>
    <form action="kembali" method="get">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">NIS:</label>
        <input type="text" name="nis" id="nis" class="form-control" placeholder="masukkan nis anda" required>
        </div>
        <button type="submit" class="btn btn-success ">Cari</button>
    </form>
    @if ($pinjaman->count() > 0)
    <table  class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Judul Buku</th>
                <TH>Denda</TH>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y',strtotime($item->tanggal_pinjam)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal_pengembalian)) }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                            @php
                                $tanggal_pengembalian = Carbon::now();
                                $tanggal_kembali = $item->tanggal_pengembalian;
                                $denda = 0;
                                if ($tanggal_kembali<$tanggal_pengembalian) {
                                    $selisih = Carbon::parse($tanggal_kembali)->diffInDays(Carbon::parse($tanggal_pengembalian));
                                    $denda = $selisih * 1000;
                                }
                            @endphp
                            {{ $denda }}
                    </td>
                    <td>
                        <form action="{{ route('kembalikanBuku', $item->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary ">Kembalikan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Data tidak ditemukan.</p>
@endif

<a href="dataPinjam" class="btn btn-info">Kembali lihat data</a>
    </div>
</body>
</html>
