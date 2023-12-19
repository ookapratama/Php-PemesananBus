<?php
include 'header.php';
include '../db/koneksi.php';
include '../config/function.php';

$id = $_GET['id'];
$datas = select('jadwal WHERE id_jadwal = ' . $id);
$data = mysqli_fetch_assoc($datas);
?>

<body>
   <div id="app">
      <div class="main-wrapper">
         <div class="navbar-bg"></div>
         <!-- Navbar -->
         <?php include 'navbar.php' ?>

         <!-- Sidebar -->
         <?php include 'sidebar.php' ?>


         <!-- Main Content -->
         <div class="main-content">
            <section class="section">
               <div class="section-header">
                  <h1>Data Bus</h1>
                  <div class="section-header-breadcrumb">
                     <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                     <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                     <div class="breadcrumb-item">Table</div>
                  </div>
               </div>

               <div class="section-body">


                  <div class="row">
                     <div class="col-12 ">
                        <div class="card">
                           <div class="card-body">
                              <form action="update_jadwal.php" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label for="">Nama Bus</label>
                                       <div class="form-group">
                                          <select class="form-control" name="bus_pilihan" id="">
                                             <option selected disabled value="">-- Pilih Bus --</option>
                                             <?php
                                             $datas_bus = select('bus');
                                             while ($data_bus = mysqli_fetch_assoc($datas_bus)) :
                                             ?>
                                                <option <?= $data_bus['id_bus'] == $data['bus_id'] ? 'Selected' : '' ?> value="<?= $data_bus['id_bus'] ?>"><?= $data_bus['nama_bus'] ?></option>
                                             <?php endwhile; ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-3">

                                       <label for="">Terminal Asal</label>
                                       <div class="form-group">
                                          <input type="text" name="terminal_asal" class="form-control" placeholder="ex : Makassar" value="<?= $data['terminal_asal'] ?>" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="">Terminal Tujuan</label>
                                       <div class="form-group">
                                          <input type="text" placeholder="ex : Toraja" name="terminal_tujuan" class="form-control" value="<?= $data['terminal_tujuan'] ?>" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                       <label for="">Waktu Keberangkatan</label>
                                       <div class="form-group">
                                          <input type="time" name="waktu_berangkat" class="form-control" value="<?= $data['waktu_berangkat'] ?>" id="">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <label for="">Harga</label>
                                       <div class="form-group">
                                          <input type="number" name="harga_bus" class="form-control" value="<?= $data['harga'] ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <div class=" mb-4 mr-3"><button type="submit" class="btn btn-success"> Update </button></div>
                                    <div class=" mb-4"><a class="btn btn-secondary" href="index_jadwal.php"> Kembali </a></div>
                                 </div>
                              </form>
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </section>
         </div>

         <script>
            var dengan_rupiah = document.getElementById('rupiah');
            dengan_rupiah.addEventListener('keyup', function(e) {
               dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi */
            function formatRupiah(angka, prefix) {
               var number_string = angka.replace(/[^,\d]/g, '').toString(),
                  split = number_string.split(','),
                  sisa = split[0].length % 3,
                  rupiah = split[0].substr(0, sisa),
                  ribuan = split[0].substr(sisa).match(/\d{3}/gi);

               if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
               }

               rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
               return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
         </script>



         <?php include 'footer.php' ?>