<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penduduk</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        
        <br/>
        <a href="index.php" class="btn btn-primary">Kembali</a>
        <br/>
        <br/>
        <h3>EDIT DATA PENDUDUK</h3>
        <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"select * from data_diri where 
            id='$id'");
            while($d = mysqli_fetch_array($data)){
        ?>
        <form method="post" action="update.php">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id'];?>">
                        <input type="text" name="nama" value="<?php echo $d['nama'];?>">
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>
                        <input type="number" name="nik" value="<?php echo $d['nik']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <input type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan" class="btn btn-success"></td>
                </tr>
            </table>
        </form>
        <?php
            }
        ?>
    </div>
</body>

</html>