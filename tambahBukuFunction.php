<?php
    include "koneksi.php";
    $id_buku = $_GET['id_buku'];
    $id_kategori = $_GET['kategori'];
    $judul = $_GET['judul'];
    $isbn = $_GET['isbn'];
    $penerbit = $_GET['penerbit'];
    $penulis = $_GET['penulis'];

    // Query Data menggunakan Function insertBuku
    $query = "CALL insertBuku('".$id_buku."','".$id_kategori."','".$judul."','".$isbn."','".$penerbit."','".$penulis."')";
    
    // Mengecek Apakah Query Berhasil
    $cek = mysqli_query($koneksi,$query);

    if($cek != false){
        echo "<script> alert('Tambah Data Berhasil!');
        window.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script> alert('Tambah Data Gagal!');
        window.location.href = 'index.php';
        </script>";
    }

    
?>