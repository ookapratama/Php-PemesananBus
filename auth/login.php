<?php include 'header.php' ?>

<body>
   <div id="app">
      <section class="section">
         <div class="container mt-5">
            <div class="row">
               <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                  <div class="login-brand">
                     <img src="../admin/layouts/stisla-master/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h4>Login</h4>
                     </div>

                     <div class="card-body">
                        <form method="POST" action="" class="needs-validation" novalidate="">
                           <div class="form-group">
                              <label for="username">Username</label>
                              <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>

                           </div>

                           <div class="form-group">
                              <div class="d-block">
                                 <label for="password" class="control-label">Password</label>
                                 <div class="float-right">

                                 </div>
                              </div>
                              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                              <div class="invalid-feedback">
                                 please fill in your password
                              </div>
                           </div>


                           <div class="form-group">
                              <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                 Login
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>

                  <div class="simple-footer">
                     Copyright &copy; Stisla 2018
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <?php
   if (isset($_POST['login'])) {
      if ($_POST["username"] == "" || $_POST["password"] == "") {
         echo "
   <script>
      alert('Username atau password tidak boleh kosong');
      history.back();
   </script>
   ";
      } else {
         include "../db/koneksi.php";

         $user = $_POST["username"];
         $pass = $_REQUEST["password"];
         // var_dump($_REQUEST);
         $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$user' and password='$pass' ");
         $jum_baris = mysqli_num_rows($query);

         if ($jum_baris == 0) {
            echo "
   <script>
      alert('Username atau password anda salah');
      history.back();
   </script>
   ";
         } else {
            $data = mysqli_fetch_array($query);
            $id_user = $data['id_user'];
            // var_dump($id_user);
            session_start();
            $_SESSION["login"] = "berhasil";
            $_SESSION['id_user'] = $id_user;
            $_SESSION['nama_user'] = $data['username'];

            echo "
   <script>
      alert('Berhasil login');
      location.href = '../index.php';
   </script>
   ";
         }
      }
   }
   ?>
   <?php include 'footer.php' ?>