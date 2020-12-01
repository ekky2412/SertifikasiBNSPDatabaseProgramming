<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus <?= $_GET['id_buku'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Memberi Warning sebelum dihapus -->
    <div class="text-center">
    <h1>Apakah Anda yakin untuk menghapus <?= $_GET['id_buku'] ?> ?</h1>
    <form action="hapusBukuFunction.php">
        <button type="submit" class="btn btn-danger" name="hapus" value="1">Hapus</button>
        <input type="hidden" value="<?= $_GET['id_buku']?>" name="id_buku">
        <button type="submit" class="btn btn-warning" name="cancel" value="1">Cancel</button>
    </form>
    </div>
</body>
</html>