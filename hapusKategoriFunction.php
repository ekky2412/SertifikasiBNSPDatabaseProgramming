<?php
    include "koneksi.php";
    $id_kategori = $_GET['id_kategori'];
    // Jika hapus, maka akan menjalankan query hapus
    // Jika cancel, akan kembali ke awal
    if($_GET['hapus'] == 1){
        $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";

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