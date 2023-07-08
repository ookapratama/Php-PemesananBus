<?php
include 'header.php';
include '../db/koneksi.php';
include '../config/function.php';

$id = $_GET['id'];
$datas = select('tiket WHERE id_tiket = ' . $id);
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
                              <form action="update_tiket.php" method="POST" enctype="multipart/form-data">
                                 <div class="row">
                                    <input type="hidden" name="id_tiket" value="<?= $data['id_tiket'] ?>">
                                    <div class="col-md-4">
                                       <label for="">Kode Tiket` </label>
                                       <div class="form-group">
                                             <input type="text" name="kode_tiket" class="form-control" placeholder="Masukkan Kode tiket" value="<?= $data['kode_tiket'] ?>" />
                                       </div>
                                    </div>
                                    
                                 </div>
                                 
                                 <div class="d-flex">
                                    <div class=" mb-4 mr-3"><button type="submit" class="btn btn-success"> Update </button></div>
                                    <div class=" mb-4"><a class="btn btn-secondary" href="index_tiket.php"> Kembali </a></div>
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