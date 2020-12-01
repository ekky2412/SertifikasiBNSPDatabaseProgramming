<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data : <?= $_GET['id_buku'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include "koneksi.php";
        // Mengambil id buku untuk dilakukan query
        $id_buku = $_GET['id_buku'];
        $query = "SELECT * from v2 WHERE id_buku = '$id_buku'";
        // Melakukan query pada tabel kategori agar proses edit buku bagian kategori semakin mudah
        $query2 = "SELECT * from kategori";
        $data = mysqli_query($koneksi, $query);
        $data2 = mysqli_query($koneksi, $query2);

        ?>
        <h1>Update Data Buku</h1>
        <form action="updateBukuFunction.php">
            <div class="modal-body">
                <?php
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                    <div class="form-group">
                        <label for="idForm">ID</label>
                        <input type="text" class="form-control" id="idForm" name="id_buku" readonly value="<?= $row['id_buku'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="judulBuku">Judul Buku</label>
                        <input type="text" class="form-control" id="judulBuku" name="judul" value="<?= $row['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $row['isbn'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $row['penerbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $row['penulis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="idkategori" id="kategori">
                            <?php
                            // Mengambil hasil query dan dimasukkan ke dalam dropdown data kategori
                            while ($row2 = mysqli_fetch_assoc($data2)) {
                            ?>
                                <option <?php
                                        // Melakukan pengecekan data mana yang terdapat pada database untuk ditampilkan di dropdown
                                        if ($row['kategori'] == $row2['kategori']) {
                                            echo "selected";
                                        }
                                        ?> value="<?= $row2['id_kategori'] ?>"> <?= $row2['kategori'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-success">Edit Data Buku</button>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>