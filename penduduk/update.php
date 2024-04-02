<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    
    mysqli_query($koneksi,"update data_diri set nama='$nama', 
                    nik='$nik', alamat='$alamat' where id='$id'");
    
    header("location:index.php");
?>