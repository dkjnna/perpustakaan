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
    <div class="container mt-4">
        <h1>Login Admin</h1>
    <form action="prosesLogin" method="post">
        @csrf
        <div class="mb-3">
        <label for="" class="form-label">Masukkan Kode Admin</label>
        <input type="text" name="kode_admin" id="kode_admin" class="form-control" placeholder="Masukkan kode admin">
        <button type="submit" class="btn btn-success mt-3">Masuk</button>
        </div>
    </form>
    </div>
</body>
</html>