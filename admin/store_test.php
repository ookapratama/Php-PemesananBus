<?php
include '../config/function.php';

$nama = $_POST['nama'];

// var_dump(str_replace($harga_bus, '.'));

if ($nama == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

// echo $data_query;
$data_query = "(null, '$nama')";
$store = insert('test', $data_query);
var_dump($store);
if ($store > 0) {
   echo "<script>
      alert('Berhasil tambah data');
      document.location.href ='index_test.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal tambah data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];