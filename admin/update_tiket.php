<?php
include '../config/function.php';

$id_tiket = $_POST['id_tiket'];
$kode_tiket = $_POST['kode_tiket'];

// var_dump($harga_bus);
// var_dump(str_replace($harga_bus, '.'));

if ($kode_tiket == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

// echo $data_query;
$data_query = "kode_tiket = '$kode_tiket' WHERE id_tiket = '$id_tiket'";

$store = update('tiket', $data_query);
if ($store > 0) {
   echo "<script>
      alert('Berhasil update data');
      document.location.href ='index_tiket.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal update data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];