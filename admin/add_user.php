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
                              <form action="store_user.php" method="POST" enctype="multipart/form-data">

                                 <div class="row">
                                    <div class="col-md-4">
                                       <label for="">Username </label>
                                       <div class="form-group">
                                             <input type="text" name="username" class="form-control" placeholder="Masukkan Username" />
                                       </div>
                                    </div>
                                    <div class="col-md-6">

                                       <label for="">Email User</label>
                                       <div class="form-group">
                                          <input type="email" name="email" class="form-control" placeholder="Masukkan Email" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <label for="">Password User</label>
                                       <div class="form-group">
                                          <input type="password" name="password" placeholder="Masukkan Password" class="form-control" id="">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="d-flex">
                                    <div class=" mb-4 mr-3"><button type="submit" class="btn btn-success"> Tambah </button></div>
                                    <div class=" mb-4"><a class="btn btn-secondary" href="index_user.php"> Kembali </a></div>
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