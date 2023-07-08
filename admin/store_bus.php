<?php
include '../config/function.php';

$nama_bus = $_POST['nama_bus'];
$jumlah_kursi = $_POST['jumlah_kursi'];

if ($nama_bus == "" || $jumlah_kursi == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

$nama_gambar = $_FILES['gambar_bus']['name'];
$error = $_FILES['gambar_bus']['error'];
$tmp_gambar = $_FILES['gambar_bus']['tmp_name'];


$eks = ['jpg', 'png', 'jpeg'];
$eks_gambar = explode('.', $nama_gambar);
$eks_gambar = strtolower(end($eks_gambar));

if (!in_array($eks_gambar, $eks)) {
   echo "<script>
      alert('format gambar tidak valid')
      history.back();
      </script>";
}

$uniq_name = uniqid();
$uniq_name .= '.';
$uniq_name .= $eks_gambar;

move_uploaded_file($tmp_gambar, 'img/' . $uniq_name);
$data_query = "('','$nama_bus' , '$jumlah_kursi' ,'$uniq_name')";

// echo $data_query;

$store = insert('bus', $data_query);
if($store > 0 ) {
   echo "<script>
      alert('Berhasil tambah data');
      document.location.href ='index_bus.php';
      </script>";
}
else {
   echo "<script>
      alert('Gagal tambah data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];