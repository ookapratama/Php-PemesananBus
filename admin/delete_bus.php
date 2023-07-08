<?php
include '../config/function.php';

$id = $_GET['id'];

$delete = delete('bus', $id);

if($delete > 0 ) {
   echo "<script>
      alert('Berhasil hapus data');
      document.location.href ='index_bus.php';
      </script>";
}
else {
   echo "<script>
      alert('Gagal hapus data');
      history.back();
      </script>";
}