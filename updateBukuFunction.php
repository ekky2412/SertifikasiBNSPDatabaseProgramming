<?php
    include "koneksi.php";
    $id_buku = $_GET['id_buku'];
    $id_kategori = $_GET['idkategori'];
    $judul = $_GET['judul'];
    $isbn = $_GET['isbn'];
    $penerbit = $_GET['penerbit'];
    $penulis = $_GET['penulis'];

    // Query Data 
    $query = "UPDATE buku SET id_kategori = '$id_kategori', judul = '$judul', isbn = '$isbn', penerbit = '$penerbit', penulis = '$penulis' WHERE id_buku = '$id_buku'";

    // Mengecek Apakah Query Berhasil
    $cek = mysqli_query($koneksi,$query);

    if($cek != false){
        echo "<script> alert('Edit Data Berhasil!');
        window.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script> alert('Edit Data Gagal!');
        window.location.href = 'index.php';
        </script>";
    }
?>