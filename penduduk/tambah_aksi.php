<?php
    include 'koneksi.php';
    
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    
    mysqli_query($koneksi,"insert into data_diri
            values('','$nama','$nik','$alamat')");
    
    header("location:index.php");
?>