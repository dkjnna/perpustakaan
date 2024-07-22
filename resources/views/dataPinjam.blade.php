@extends('start')
@section('isi')


@php
    use Carbon\Carbon;
@endphp


    <div class="container">
        <p align="right" style="font-size: 20px; font-weight:700">Admin Login:{{ Session::get('kode_admin') }}</p>
        <p align="right"><a href="logout"  class="btn btn-danger">Logout</a></p>



    <a href="kembali" class="btn btn-primary mt-3">Kembalikan</a>
    <h1>Data Pinjam Buku</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pengembalian</th>

                </tr>
            </thead>
            <tbody>

                    @foreach ($pinjam as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->siswa }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                    </tr>
                    @endforeach

            </tbody>
        </table>

    </div>

@endsection
