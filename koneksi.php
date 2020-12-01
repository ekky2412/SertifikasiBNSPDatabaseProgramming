<?php
// Melakukan koneksi dengan database
$koneksi=mysqli_connect("localhost","root","","buku_RezkyPutratama");
if ($koneksi->connect_error) {
    die('koneksi gagal : '.$koneksi->connect_error);
}
?>