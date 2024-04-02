<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penerapan spreadshet phpversion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2><center>Data Penduduk</center></h2>
        <br/>
        <a href="tambah.php" class="btn btn-success">Tambah Penduduk</a><br>
        <br/>
        <form action="search.php" method="get">
            <input type="text" name="query" placeholder="Cari data penduduk">
            <input type="submit" value="Cari">
        </form>
        <br>

        <a href="export.php?format=csv" class="btn btn-primary">Export ke CSV</a>
        <a href="export.php?format=xlsx" class="btn btn-primary">Export ke XLSX</a>

        <br>
        <br>

        <table border="1" class="table table-bordered">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>OPSI</th>
            </tr>
            <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from data_diri");
                
                while($d = mysqli_fetch_array($data)){
            ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $d['nama']; ?>
                    </td>
                    <td>
                        <?php echo $d['nik']; ?>
                    </td>
                    <td>
                        <?php echo $d['alamat']; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>
    </div >
</body>
</html>