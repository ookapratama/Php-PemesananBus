<?php


include 'db/koneksi.php';


$datas_pesanan = mysqli_query($conn, 'SELECT * FROM pemesanan JOIN jadwal ON (jadwal.id_jadwal = pemesanan.jadwal_id) JOIN user ON (user.id_user = pemesanan.user_id)');
$data_pesanan = mysqli_fetch_assoc($datas_pesanan);

$datas_bus = mysqli_query($conn, "SELECT * FROM jadwal LEFT JOIN bus ON (bus.id_bus = jadwal.bus_id)");
$data_bus = mysqli_fetch_assoc($datas_bus);

$kode_tiket = strtoupper($data_bus['nama_bus']) . "-T" . $data_pesanan['id_jadwal'];

echo "<h1>" . $kode_tiket . "</h1?";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket PDF</title>
</head>
<body>
    
<h1>Kode Tiket : <?= $kode_tiket ?> </h1>
</body>
</html>
