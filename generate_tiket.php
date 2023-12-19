<?php

session_start();

if (!$_SESSION["login"]) {
   header("Location: auth/login.php");
}

include 'header.php';
include 'db/koneksi.php';

require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;



$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
$id_jadwal_bus = $formData['id_jadwal'];

$datas_pesanan = mysqli_query($conn, 'SELECT * FROM pemesanan JOIN jadwal ON (jadwal.id_jadwal = pemesanan.jadwal_id) JOIN user ON (user.id_user = pemesanan.user_id)');
$data_pesanan = mysqli_fetch_assoc($datas_pesanan);

$datas_bus = mysqli_query($conn, "SELECT * FROM jadwal LEFT JOIN bus ON (bus.id_bus = jadwal.bus_id) WHERE id_jadwal = $id_jadwal_bus");
$data_bus = mysqli_fetch_assoc($datas_bus);

// var_dump($data_bus);


$total_harga = $formData['harga_kursi'] * $formData['jumlah_kursi'];

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
                  <p>Kode Tiket : <?= $formData['kode_tiket'] ?> </p>

                  <p>Atas nama <?= $formData['username'] ?></p>
                  <p>Perjalanan <b> <?= $formData['terminal_asal'] ?> </b> ke <b> <?= $formData['terminal_tujuan'] ?> </b></p>
                  <p>Jumlah Kursi : <?= $formData['jumlah_kursi'] ?> </p>
                  <p>Harga : <?= $formData['harga_kursi'] ?> </p>
                  <p>
                     Total yang dibayar Rp. <?= number_format($total_harga, 0, ',', '.')  ?>
                  </p>

                  <div class="d-flex">
                     <button type="submit" name="submit" class="btn btn-warning">
                        Bayar
                     </button>

                     <form action="" method="POST">
                        <button type="submit" name="cetak" class="btn btn-success ml-2">
                           Cetak
                        </button>
                     </form>

                     <form action="" method="POST">
                        <button type="submit" name="kembali" class="btn btn-danger ml-2">
                           Batalkan Pesanan
                        </button>
                     </form>

                  </div>
      </form>


   </div>
   </div>
   </div>
   </div>
</section>

<!-- end about section -->
<?php

if (isset($_POST['kembali'])) {
   session_unset();
   session_destroy();

   echo "<script>
        alert('Pembayaran dibatalkan');
        document.location.href ='index.php';
        </script>";
}

// cetak pdf
if (isset($_POST['cetak'])) {
   include 'config/function.php';

   $options = new Options();
   $options->set('isHtml5ParserEnabled', true);
   $options->set('isPhpEnabled', true);

   $dompdf = new Dompdf();

   $html = '<center><h1>TIKET BUS ' . $formData['kode_tiket'] . '</h1></center><hr/>';
   $html .= '<table border="0" width="100%">
               <tr>
               <th align="left"><h2> Nama Pemesan </h2></th>
               <th align="right"> <h2> ' . $formData['username'] . '</h2></th>
               </tr>
               <tr>
               <th align="left"><h2> Nama Bus </h2></th>
               <th align="right"> <h2> ' . $data_bus['nama_bus'] . '</h2></th>
               </tr>
               <tr>
               <th align="left"><h2> Perjalanan </h2></th>
               <th align="right"> <h3> Dari <u>' . $formData['terminal_asal'] . '</u> ke <u> ' . $formData['terminal_tujuan'] . '</u> </h3></th>
               </tr>
               <tr>
               <th align="left"><h2> Jumlah Kursi </h2></th>
               <th align="right"> <h2> ' . $formData['jumlah_kursi'] . ' </h2></th>
               </tr>
               <tr>
               <th align="left"><h2> Total Pembayaran  </h2>  <h4> ' . $formData['jumlah_kursi'] . ' x Rp. ' . number_format($data_bus['harga'], 0, ',', '.') . ' </h4></th>
               <th align="right"> <h2> Rp. ' . number_format($total_harga, 0, ',', '.') . ' </h2></th>
               </tr>
               ';
   $html .= "</html>";

   // Load HTML into Dompdf
   $dompdf->load_html($html);

   // (Optional) Set paper size and orientation
   $dompdf->setPaper('A4', 'portrait');

   // Render PDF (first the HTML, then the PDF content)
   $dompdf->render();
   ob_end_clean();
   // Output PDF to browser or save to a file
   $dompdf->stream($formData['kode_tiket'] . ' .pdf', array('Attachment' => 0));
}

if (isset($_POST['submit'])) {
   include 'config/function.php';

   $id_user = $_SESSION['id_user'];
   $id_bus = $formData['id_bus'];
   $id_jadwal = $data_bus['id_jadwal'];
   $kode_tiket = $formData['kode_tiket'];
   $jumlah_tiket = $formData['jumlah_kursi'];
   $sisa_kursi =  $data_bus['jumlah_kursi'] - $jumlah_tiket;
   // var_dump($data_bus);

   // update data bus
   update('bus', "jumlah_kursi = '$sisa_kursi' WHERE id_bus = '$id_bus'");
   
   // store data tiket
   insert('tiket', "(null, '$id_bus', '$kode_tiket')");

   // // store data pemesanan
   $store = insert('pemesanan', "(null, '$id_jadwal', '$id_user', '$total_harga', 'Berhasil bayar', '$jumlah_tiket')");

   if ($store > 0) {
      // $update = "status_pemesanan = 'Berhasil bayar' WHERE id_pemesanan = '$id_pemesanan'";
      // $update_status = update('pemesanan', $update);

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