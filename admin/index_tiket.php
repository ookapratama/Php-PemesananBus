<?php

include 'header.php';
include '../db/koneksi.php';
include '../config/function.php';
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
                  <h1>Data Tiket</h1>
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
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Kode Tiket</th>
                                       <th scope="col">Total Bayar</th>
                                       <th scope="col">Jumlah Orang</th>
                                       <th scope="col">Status </th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $datas = select('tiket JOIN pemesanan ON (pemesanan.tiket_id = tiket.id_tiket)');
                                    $i = 1;
                                    while ($data = mysqli_fetch_assoc($datas)) :
                                    ?>
                                       <tr>
                                          <th scope="row"><?= $i++ ?></th>
                                          <td><?= $data['kode_tiket'] ?></td>
                                          <td><?= $data['total_bayar'] ?></td>
                                          <td><?= $data['jumlah_orang'] ?></td>
                                          <td><?= $data['status_pemesanan'] ?> </td>
                                          <td>
                                             <a class="btn btn-warning" href='edit_tiket.php?id=<?= $data['id_tiket'] ?>'> Edit </a>
                                             
                                             <a class="btn btn-danger" href='delete_tiket.php?id=<?= $data['id_tiket'] ?>' onclick='return confirm("Yakin ingin menghapus ?");'> Hapus </a>
                                          </td>
                                       </td>
                                       </tr>
                                    <?php endwhile; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </section>
         </div>



         <?php include 'footer.php' ?>