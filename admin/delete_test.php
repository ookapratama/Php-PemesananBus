<?php
include '../config/function.php';

$id = $_GET['id'];
$delete = delete('test', $id);

if($delete > 0 ) {
   echo "<script>
      alert('Berhasil hapus data');
      document.location.href ='index_test.php';
      </script>";
}
else {
   echo "<script>
      alert('Gagal hapus data');
      history.back();
      </script>";
}