<?php
include 'header.php';
include '../db/koneksi.php';

$menu  = "dashboard";

?>

<body>
   <div id="app">
      <div class="main-wrapper">
         <div class="navbar-bg"></div>
         <!-- Navbar -->
         <?php include 'navbar.php' ?>

         <!-- Sidebar -->
         <?php include 'sidebar.php' 
         ?>
         

         <!-- Main Content -->
         <div class="main-content">
            <section class="section">
               <div class="section-header">
                  <h1>Dashboard</h1>
               </div>

               <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                           <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                           <div class="card-header">
                              <h4>Total User</h4>
                           </div>
                           <div class="card-body">
                              10
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                           <i class="fas fa-table"></i>
                        </div>
                        <div class="card-wrap">
                           <div class="card-header">
                              <h4>Jadwal</h4>
                           </div>
                           <div class="card-body">
                              42
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                           <i class="fas fa-car"></i>
                        </div>
                        <div class="card-wrap">
                           <div class="card-header">
                              <h4>Bus</h4>
                           </div>
                           <div class="card-body">
                              1,201
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                     <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                           <i class="fas fa-bus"></i>
                        </div>
                        <div class="card-wrap">
                           <div class="card-header">
                              <h4>Pemesanan Bus</h4>
                           </div>
                           <div class="card-body">
                              47
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </section>
         </div>
         



         <?php include 'footer.php' ?>