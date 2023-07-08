<?php

session_start();

if (!$_SESSION["login"]) {
   header("Location: auth/login.php");
}

include 'header.php';
include 'db/koneksi.php';
// include 'config/function.php';

$datas_pesanan = mysqli_query($conn, 'SELECT * FROM pemesanan JOIN jadwal ON (jadwal.id_jadwal = pemesanan.jadwal_id) JOIN user ON (user.id_user = pemesanan.user_id)');
$data_pesanan = mysqli_fetch_assoc($datas_pesanan);

$datas_bus = mysqli_query($conn, "SELECT * FROM jadwal LEFT JOIN bus ON (bus.id_bus = jadwal.bus_id)");
$data_bus = mysqli_fetch_assoc($datas_bus);
$kode_tiket = strtoupper($data_bus['nama_bus']) . "_" . $data_pesanan['id_jadwal']
?>

<!-- about section -->

<section class="about_section layout_padding">
   <div class="container  ">
      <form action="" method="POST">

         <div class="row">
            <div class="col-md-6 ">
               <div class="img-box">
                  <img src="admin/img/<?= $data_bus['gambar_bus'] ?>" alt="">
               </div>
            </div>
            <div class="col-md-6">
               <div class="detail-box">
                  <div class="heading_container">
                     <h2>
                        Konfirmasi Pembayaran
                     </h2>
                  </div>
                  <p>Atas nama <?= $data_pesanan['username'] ?></p>
                  <p>Perjalanan <?= $data_pesanan['terminal_asal'] ?> ke <?= $data_pesanan['terminal_tujuan'] ?></p>
                  <p>Kode Tiket : <?= $kode_tiket ?> </p>
                  <input type="hidden" name="kode_tiket" value="<?= $kode_tiket ?>">
                  <input type="hidden" name="id_pemesanan" value="<?= $data_pesanan['id_pemesanan'] ?>">
                  <p>
                     Total yang dibayar Rp. <?= number_format($data_pesanan['total_bayar'], 0, ',', '.')  ?>
                  </p>
                  <button type="submit" name="submit" class="btn btn-warning">
                     Bayar
                  </button>
      </form>

   </div>
   </div>
   </div>
   </div>
</section>

<!-- end about section -->
<?php

if (isset($_POST['submit'])) {
   include 'config/function.php';

   $kode_tiket = $_POST['kode_tiket'];
   $id_pemesanan = $_POST['id_pemesanan'];
   // var_dump($kode_tiket);
   $query = "('', '$id_pemesanan', '$kode_tiket')";
   $store = insert('tiket', $query);

   if ($store > 0) {
      $update = "status_pemesanan = 'Berhasil bayar' WHERE id_pemesanan = '$id_pemesanan'";
      $update_status = update('pemesanan', $update);

      echo "<script>
        alert('Berhasil melakukan pembayaran');
        document.location.href ='index.php';
        </script>";
    } else {
      echo "<script>
        alert('Gagal daftar bus');
        history.back();
        </script>";
    }
}


?>

<?php include 'footer.php' ?>