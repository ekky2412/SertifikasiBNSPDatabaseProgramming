<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    // Melakukan koneksi dengan database
    include "koneksi.php";

    // Melakukan query dengan view di database yang telah dibuat
    $query = "SELECT * FROM v2";
    $data = mysqli_query($koneksi, $query);
    ?>
    <div class="mt-2 container">
        <form action="cari.php" class="form-inline mb-4">
            <input type="text" placeholder="Cari Data" name="cari">
            <button type="submit" class="btn btn-warning">Cari</button>
        </form>
        <a href="tambahBuku.php"><button class="btn btn-success">
                Tambah Data Buku
            </button></a>
        <a href="tambahKategori.php"><button class="btn btn-success">
                Tambah Data Kategori
            </button></a>
    </div>
    <div class="container text-center">
        <div class="head">
            <h1>Data Buku</h1>
        </div>
        <div class="main">
            <table class="table">
                <thead>
                    <th>Id Buku</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>ISBN</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                    // Mengambil hasil query dan dimasukkan ke dalam tabel buku
                    while ($row = mysqli_fetch_assoc($data)) {
                    ?>
                        <tr>
                            <td><?= $row['id_buku'] ?></td>
                            <td><?= $row['kategori'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['isbn'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['penulis'] ?></td>
                            <td>
                                <form action="updateBuku.php" class="m-1">
                                    <button class="btn btn-warning">Update</button>
                                    <input type="hidden" name="id_buku" value="<?= $row['id_buku'] ?>">
                                </form>
                                <form action="hapusBuku.php">
                                    <button class="btn btn-danger">Hapus</button>
                                    <input type="hidden" name="id_buku" value="<?= $row['id_buku'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        // Mengambil list dari kategori
        $query2 = "SELECT * FROM kategori";
        $data2 = mysqli_query($koneksi, $query2);
        ?>

        <div class="main2">
            <h1>Data Kategori</h1>
            <table class="table">
                <thead>
                    <th>ID Kategori</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                    // Mengambil hasil query dan dimasukkan ke dalam tabel kategori
                    while ($row2 = mysqli_fetch_assoc($data2)) {
                    ?>
                        <tr>
                            <td><?= $row2['id_kategori'] ?></td>
                            <td><?= $row2['kategori'] ?></td>
                            <td>
                                <form action="updateKategori.php" class="m-1">
                                    <button class="btn btn-warning">Update</button>
                                    <input type="hidden" name="id_kategori" value="<?= $row2['id_kategori'] ?>">
                                </form>
                                <form action="hapusKategori.php">
                                    <button class="btn btn-danger">Hapus</button>
                                    <input type="hidden" name="id_kategori" value="<?= $row2['id_kategori'] ?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>


    </div>
</body>

</html>