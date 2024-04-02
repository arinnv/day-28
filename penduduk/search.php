<?php
include 'koneksi.php';

$query = $_GET['query'];

$sql = "SELECT * FROM data_diri WHERE nama LIKE '%$query%' OR alamat LIKE '%$query%' OR nik LIKE '%$query%'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nama: " . $row["nama"]. " - Nik: " . $row["nik"]. " - Alamat: " . $row["alamat"] . "<br>";
    }
} else {
    echo "0 results";
}
$koneksi->close();
?>