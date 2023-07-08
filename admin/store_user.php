<?php
include '../config/function.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// var_dump($harga_bus);
// var_dump(str_replace($harga_bus, '.'));

if ($username == "" || $email == "" || $password == "") {
   echo "<script>
      alert('lengkapi data')
      history.back();
      </script>";
}

// echo $data_query;
$data_query = "('', '$username' , '$email' ,'$password')";

$store = insert('user', $data_query);
if ($store > 0) {
   echo "<script>
      alert('Berhasil tambah data');
      document.location.href ='index_user.php';
      </script>";
} else {
   echo "<script>
      alert('Gagal tambah data');
      history.back();
      </script>";
}
// $nama_bus = $_POST['_bus'];