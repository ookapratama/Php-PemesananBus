<?php
include '../config/function.php';

$id_jadwal = $_POST['id_jadwal'];
$bus_pilihan = $_POST['bus_pilihan'];
$terminal_asal = $_POST['terminal_asal'];
$terminal_tujuan = $_POST['terminal_tujuan'];
$waktu_berangkat = $_POST['waktu_berangkat'];
$harga_bus = $_POST['harga_bus'];

// var_dump($harga_bus);
// var_dump(str_replace($harga_bus, '.'));

if ($terminal_asal == "" || $terminal_tujuan == "" || $waktu_berangkat == "" || $harga_bus == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

// echo $data_query;
$data_query = "bus_id = '$bus_pilihan' , terminal_asal = '$terminal_asal' ,terminal_tujuan = '$terminal_tujuan', waktu_berangkat = '$waktu_berangkat',harga = '$harga_bus' WHERE id_jadwal = '$id_jadwal'";

$store = update('jadwal', $data_query);
if ($store > 0) {
   echo "<script>
      alert('Berhasil update data');
      document.location.href ='index_jadwal.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal update data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];