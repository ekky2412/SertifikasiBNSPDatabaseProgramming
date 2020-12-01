<?php
    include "koneksi.php";
    $kategori = $_GET['kategori'];
    $id_kategori = $_GET['id_kategori'];


    // Query Data 
    $query = "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = '$id_kategori'";

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