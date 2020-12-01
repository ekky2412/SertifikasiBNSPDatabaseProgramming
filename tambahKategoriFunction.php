<?php
include "koneksi.php";
$kategori = $_GET['kategori'];
$id_kategori = $_GET['id_kategori'];


// // Query Data menggunakan Function insertKategori
$query = "CALL insertKategori('$id_kategori','$kategori')";

// Mengecek Apakah Query Berhasil
$cek = mysqli_query($koneksi,$query);

if($cek != false){
    echo "<script> alert('Tambah Kategori Berhasil!');
    window.location.href = 'index.php';
    </script>";
}
else{
    echo "<script> alert('Tambah Kategori Gagal!');
    window.location.href = 'index.php';
    </script>";
}
?>