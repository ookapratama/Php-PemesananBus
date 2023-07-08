<?php
include 'header.php';
include '../db/koneksi.php';
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
                              <form action="store_bus.php" method="POST" enctype="multipart/form-data">

                                 <div class="row">
                                    <div class="col-md-6">
                                       <label for="">Nama Bus</label>
                                       <div class="form-group">
                                          <input type="text" name="nama_bus" class="form-control" placeholder="Masukkan nama bus" />
                                       </div>
                                    </div>
                                    <div class="col-md-2">

                                       <label for="">Jumlah Kursi</label>
                                       <div class="form-group">
                                          <input type="text" name="jumlah_kursi" maxlength="3" onkeypress="return (event.charCode != 8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))" class="form-control" placeholder="1-999" />
                                       </div>
                                    </div>
                                    <div class="col-md">
                                       <label for="">Profile Bus</label>
                                       <div class="form-group">
                                          <input type="file" name="gambar_bus" class="form-control"  />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <div class=" mb-4 mr-3"><button type="submit" class="btn btn-success"> Tambah </button></div>
                                    <div class=" mb-4"><a class="btn btn-secondary" href="index_bus.php"> Kembali </a></div>
                                 </div>
                              </form>
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </section>
         </div>



         <?php include 'footer.php' ?>