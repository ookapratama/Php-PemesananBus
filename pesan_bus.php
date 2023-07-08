<?php
session_start();

if (!$_SESSION["login"]) {
  header("Location: auth/login.php");
}

include 'header.php';
include 'db/koneksi.php';

$user_bus = mysqli_query($conn, 'SELECT * FROM user WHERE id_user = ' . $_SESSION["id_user"]);
$data = mysqli_fetch_assoc($user_bus);

$id_bus =  $_GET['id_bus'];
$id_jadwal =  $_GET['id_jadwal'];

?>
<?php

if ($id_bus == null && $id_jadwal == null) {
  header("Location: index.php");
} else {
  $datas_bus = mysqli_query($conn, 'SELECT * FROM bus WHERE id_bus = ' . $id_bus);
  $data_bus = mysqli_fetch_assoc($datas_bus);

  $datas_jadwal = mysqli_query($conn, 'SELECT * FROM jadwal WHERE id_jadwal = ' . $id_jadwal);
  $data_jadwal = mysqli_fetch_assoc($datas_jadwal);

?>

  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Pesan Bus
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="" method="POST">
              <input type="hidden" name="harga_bus" value="<?= $data_jadwal['harga'] ?>" />
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" readonly value="<?= $data['username'] ?>" />
              </div>
              <div>
                <input type="text" name="email" class="form-control" placeholder="Email" readonly value="<?= $data['email'] ?>" />
              </div>
              <div>
                <input type="text" name="jumlah_kursi" class="form-control" placeholder="Jumlah Kursi" onkeypress="return (event.charCode != 8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))" />

              </div>
              <p>Kursi Tersedia : <?= $data_bus['jumlah_kursi'] ?></>

              <div class="btn_box">
                <button type="submit" name="submit">
                  Pesan
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class=" ">
            <div class="img-box">
              <img src="admin/img/<?= $data_bus['gambar_bus'] ?>" style="width: 100%;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } ?>

<!-- Proses Pesan -->
<?php

if (isset($_POST['submit'])) {
  include 'config/function.php';

  $jumlah_kursi = $_POST['jumlah_kursi'];
  $email = $_POST['email'];
  $username = $_POST['username'];

  if ($jumlah_kursi > $data_bus['jumlah_kursi'] || $jumlah_kursi <= 0) {
    echo "<script>
      alert('Kursi yang anda pesan tidak valid');
      history.back();
      </script>";
  }

  $total_harga = $jumlah_kursi * $_POST['harga_bus'];
  $jumlah_orang = $jumlah_kursi;
  $status_pesan = "Menunggu Pembayaran";
  $id_user = $_SESSION['id_user'];
  // var_dump($id_jadwal);

  // query data 
  $values = "('', '$id_jadwal', '$id_user', '$total_harga', '$status_pesan', '$jumlah_orang')";
  $store_pesan = insert('pemesanan', $values);

  if ($store_pesan > 0) {
    $sisa_kursi = $data_bus['jumlah_kursi'] - $jumlah_kursi;
    // var_dump($sisa_kursi);
    $query_bus = "jumlah_kursi = '$sisa_kursi' WHERE id_bus = '$id_bus'";
    $update_kursi = update('bus', $query_bus);
    echo "<script>
      alert('Berhasil daftar Bus, Silahkan lakukan pembayaran untuk mendaptakan tiket');
      document.location.href ='generate_tiket.php';
      </script>";
  } else {
    echo "<script>
      alert('Gagal daftar bus');
      history.back();
      </script>";
  }
}

?>
<?php include 'footer.php'  ?>