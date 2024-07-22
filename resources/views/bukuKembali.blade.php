@extends('start2')
@section('isi')
<div class="container">
    <h1>Data Buku yang Sudah Dikembalikan</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Judul Buku</th>
        </tr>
    </thead>
    <tbody>
       
            @foreach ($kembali as $item) <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->judul }}</td></tr>
            @endforeach
        
    </tbody>
</table>
</div>
@endsection