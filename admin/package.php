<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");
$web = mysqli_query($db, "SELECT * FROM web WHERE id_web");
$output = mysqli_fetch_array($web);
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/simple-line-icons/css/simple-line-icons.css">
    <title><?php echo $output["title"]; ?> - PACKAGE</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="././dashboard"><?php echo $output["title"]; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <?php include("include/menu.php"); ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                                    <?php include("include/sidebar.php"); ?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-influence">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">DASHBOARD</h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="././dashboard" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Package</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content  -->
                    <!-- ============================================================== -->
                    
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <a href="Tambah-Package">
                            <button class="btn btn-primary">
                        <i class="glyph-icon icon-plus"> Add Package</i>
                        </button>
                    </a>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Name Package</th>
                                                <th>Segment</th>
                                                <th>Images</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
      <?php
        $package = mysqli_query ($db, "SELECT * FROM package ORDER BY id_package DESC");
            if($package == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($db));
                    }
                while ($hasilp = mysqli_fetch_array ($package)){                            
                            ?>
                                            <tr>
                                                <td><?php echo $hasilp['name_package']; ?></td>
                                                <td><?php echo $hasilp['segment_package']; ?></td>
                                                <td><?php
                                                $p = $hasilp['name_file'];
                                                if ($p) {
                                                ?><img src="../admin/package/<?php echo $hasilp['name_file']; ?>" width="100" height="70">
                                                
                                                <?php } else {
  echo "<center>No Image</center>";
}
                                                ?>
                                                </td>
                                                <td><?php if($hasilp['status_package'] == 'active'){
                                                    echo "<span class='badge badge-success'>$hasilp[status_package]</span>";
                                                }
                                                    elseif ($hasilp['status_package'] == 'non active') {
                                                        echo "<span class='badge badge-warning'>$hasilp[status_package]</span>";
                                                    }
                                                    ?></td>
                                                <td>
                                                        <!-- Single button -->
        <div class="input-group-append be-addon">
                                                    <button type="button" data-toggle="dropdown" class="badge btn-default dropdown-toggle">&nbsp;</button>
                                                    <div class="dropdown-menu">
                                                        <a href="Edit-Package?id_package=<?php echo $hasilp['id_package']; ?>" class="dropdown-item" onclick="return confirm('Are you sure you edited this data?')">Edit</a>
                                                        <a href="Hapus-Package?id_package=<?php echo $hasilp['id_package']; ?>" class="dropdown-item" onclick="return confirm('Are you sure you deleted this data?')">Delete</a>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                       <?php
                        }
                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                        
                                        <!-- ============================================================== -->
                                        <!-- end content  -->
                                        <!-- ============================================================== -->
                                    </div>
                                </div>
                                <?php include("include/footer.php"); ?>
</body>
 
</html>