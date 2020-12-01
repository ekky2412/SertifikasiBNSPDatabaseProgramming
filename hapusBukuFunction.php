<?php
    include "koneksi.php";
    $id_buku = $_GET['id_buku'];
    // Jika hapus, maka akan menjalankan query hapus
    // Jika cancel, akan kembali ke awal
    if($_GET['hapus'] == 1){
 
        $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
        
        $cek = mysqli_query($koneksi, $query);
        
        if($cek != false){
            echo "<script> alert('Delete Berhasil!');
            window.location.href = 'index.php';
            </script>";
        }
        else{
            echo "<script> alert('Delete Gagal!');
            window.location.href = 'index.php';
            </script>";
        }
    }
    else{
        echo "<script>
        window.location.href = 'index.php';
        </script>";
    }
?>