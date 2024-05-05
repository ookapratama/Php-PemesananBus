<?php
include '../config/function.php';

$id_test = $_POST['id_test'];
$nama = $_POST['nama'];

// var_dump($harga_bus);
// var_dump(str_replace($harga_bus, '.'));

if ($nama == "" ) {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

// echo $data_query;
$data_query = "nama = '$nama' WHERE id_test = $id_test";

$store = update('test', $data_query);
if ($store > 0) {
   echo "<script>
      alert('Berhasil update data');
      document.location.href ='index_test.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal update data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];