<?php

include '../config/function.php';

$id_bus = $_POST['id_bus'];
$nama_bus = $_POST['nama_bus'];
$jumlah_kursi = $_POST['jumlah_kursi'];
$gambarLama = $_POST['gambarLama'];

if ($nama_bus == "" || $jumlah_kursi == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}


$nama_gambar = $_FILES['gambar_bus']['name'];
$error = $_FILES['gambar_bus']['error'];
$tmp_gambar = $_FILES['gambar_bus']['tmp_name'];

if ($error === 4) {
   $uniq_name = $gambarLama;
} else {
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
}




$data_query = "nama_bus = '$nama_bus' , jumlah_kursi = '$jumlah_kursi' , gambar_bus = '$uniq_name' WHERE id_bus = '$id_bus'";

// echo $data_query;

$update = update('bus', $data_query);
if ($update > 0) {
   echo "<script>
      alert('Berhasil update data');
      document.location.href ='index_bus.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal update data');
      history.back();
      </script>";
}
