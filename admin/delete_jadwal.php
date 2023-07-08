<?php
include '../config/function.php';

$id = $_GET['id'];
$delete = delete('jadwal', $id);

if($delete > 0 ) {
   echo "<script>
      alert('Berhasil hapus data');
      document.location.href ='index_jadwal.php';
      </script>";
}
else {
   echo "<script>
      alert('Gagal hapus data');
      history.back();
      </script>";
}