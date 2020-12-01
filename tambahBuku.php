<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<?php
include "koneksi.php";
// Melakukan query pada tabel kategori agar proses memasukkan buku bagian kategori semakin mudah
$query = "SELECT * from kategori";
$data = mysqli_query($koneksi, $query);
?>

<body>
    <div class="container">
        <h1>Tambah Data Buku</h1>
        <form action="tambahBukuFunction.php">
            <div class="modal-body">
                <div class="form-group">
                    <label for="idForm">ID</label>
                    <input type="text" class="form-control" id="idForm" name="id_buku">
                </div>
                <div class="form-group">
                    <label for="judulBuku">Judul Buku</label>
                    <input type="text" class="form-control" id="judulBuku" name="judul">
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                        <?php
                        // Mengambil hasil query dan dimasukkan ke dalam dropdown data kategori
                        while ($row = mysqli_fetch_assoc($data)) {
                        ?>
                            <option value="<?= $row['id_kategori'] ?>"> <?= $row['kategori'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button class="btn btn-success">Tambah Data Buku</button>

            </div>
        </form>
    </div>
</body>

</html>