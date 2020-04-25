<?php 
session_start();
include "config/koneksi.php";

  if (isset($_POST['daftar'])){
  
  $sql= "INSERT INTO tbl_user VALUES ('$_POST[nis]', '$_POST[nama]','$_POST[rombel]','$_POST[rayon]','$_POST[username]','$_POST[password]','$_POST[akses]');";
  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil Daftar');document.location.href='http://localhost/un/index.php'</script>";
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agenda Siswa</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.png" />

</head>

<body class="bg-gradient-danger">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                  </div>
                  <form method="post" class="user-center">
                    <div class="form-group">
                      <input type="text" name="nis" class="form-control form-control-user" placeholder="NIS" required>
                    </div>  
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                    </div>
                    <div>
                    <input type="text" name="rombel" class="form-control form-control-user" placeholder="Rombel" required>
                    </div>  
                    <div class="form-group">
                      <input type="text" name="rayon" class="form-control form-control-user" placeholder="rayon" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="akses" class="form-control form-control-user" id="exampleInputPassword" placeholder="Akses" required>
                    </div>
                    <input type="submit" name="daftar" value="Daftar" class="btn btn-danger btn-user btn-block">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
