<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Tambah Data Kategori</h1>
        <form action="tambahKategoriFunction.php">
            <div class="modal-body">
                <div class="form-group">
                    <label for="idForm">ID Kategori </label>
                    <input type="text" class="form-control" id="idForm" name="id_kategori">
                </div>
                <div class="form-group">
                    <label for="kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori">
                </div>
                <button class="btn btn-success mt-2">Tambah Data Kategori</button>

            </div>
        </form>
    </div>
</body>

</html>