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
        <h1>Pinjam Buku</h1>
    <form action="simpan" method="post">
        @csrf
        <input type="hidden" name="tanggal_pinjam" id="tanggal_pinjam">

        <div class="mb-3">
            <label for="" class="form-label">NIS:</label>
        <input type="text" name="nis" id="nis" class="form-control" placeholder="masukkan nis anda" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Nomor Seri</label>
        <input type="text" name="noseri" id="noseri" class="form-control" placeholder="masukkan nomor seri buku" required>
        </div>


        <input type="hidden" name="tanggal_pengembalian" id="tanggal_pengembalian">

        <button type="submit" class="btn btn-success mt-3">Pinjam</button>
        <a href="dataPinjam" class="btn btn-danger mt-3">Kembali</a>
    </form>
    </div>
</body>
</html>
