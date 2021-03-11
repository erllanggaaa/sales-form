<?php
session_start();

// jika sudah login, alihkan ke halaman dasbor
if (isset($_SESSION['admin'])) {
  header('Location: ././admin/dashboard');
  exit();
}

include("includes/koneksi.php");
$web = mysqli_query($db, "SELECT * FROM web WHERE id_web");
$output = mysqli_fetch_array($web);
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $output["title"]; ?> - LOGIN</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><img class="logo-img" src="././admin/img/<?php echo $output["logo"]; ?>" alt="logo"></div>
            <div class="card-body">
                <form action="Proses-Login" method="post">
<?php 
    if(isset($_GET['action'])){
        if($_GET['action'] == "failed"){
            echo "<div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Username Atau Password Salah!
            </div>";
        }else if($_GET['action'] == "login"){
            echo "<div class='alert alert-info alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Anda harus Login dahulu!
            </div>";
        }
        else if($_GET['action'] == "logout"){
            echo "<div class='alert alert-info alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Anda berhasil logout!
            </div>";
        }
    }
    ?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="Username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="Password" type="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>