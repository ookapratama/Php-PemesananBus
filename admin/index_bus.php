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
                              <div class=" mb-4"><a class="btn btn-success" href="add_bus.php"> + Tambah Data </a></div>
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Gambar Bus</th>
                                       <th scope="col">Nama BUs</th>
                                       <th scope="col">Jumlah</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $datas = select('bus');
                                    $i = 1;
                                    while ($data = mysqli_fetch_assoc($datas)) :
                                    ?>
                                       <tr>
                                          <th scope="row"><?= $i++ ?></th>
                                          <td>
                                             <img src="img/<?= $data['gambar_bus'] ?>" width="150" alt="">
                                          </td>
                                          <td><?= $data['nama_bus'] ?></td>
                                          <td><?= $data['jumlah_kursi'] ?></td>
                                          <td>
                                             <a class="btn btn-warning" href='edit_bus.php?id=<?= $data['id_bus'] ?>'> Edit </a>
                                             
                                             <a class="btn btn-danger" href='delete_bus.php?id=<?= $data['id_bus'] ?>' onclick='return confirm("Yakin ingin menghapus ?");'> Hapus </a>
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