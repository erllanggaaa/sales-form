<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");
include("/include/fungsi_tgl.php");
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
    <title><?php echo $output["title"]; ?> - EDIT ZBC</title>

    <script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
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
                                            <li class="breadcrumb-item active" aria-current="page">Edit ZBC</li>
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
                            <h5 class="card-header"><button onclick="goBack()">Back</button></h5>
                            <div class="card-body">
                                <form action="save-zbc.php" method="post">
                                <div class="table table-striped first">
                                <table>
                                    <?php
                    $id_zbc=$_GET['id_zbc'];
                    $sql = mysqli_query($db, "SELECT * FROM zbc where id_zbc='$id_zbc'"); // jika tidak ada filter maka tampilkan semua entri
                    $hasil_data = mysqli_fetch_assoc($sql);// fetch query yang sesuai ke dalam array
                    ?><thead>
                            <tr>
                            <th>Name ZBC<font color="red">*</font></th>
                            <th><input type="hidden" name="id_zbc" value="<?php echo $hasil_data['id_zbc']; ?>"><input type="text" name="name_zbc" value="<?php echo $hasil_data['name_zbc']; ?>" class="form-control"></th>
                            </tr>
                            <tr>
                                <th>Status<font color="red">*</font></th>
                                <th><select name="status_zbc" class="form-control" required>
                                        <?php
                                            if($hasil_data["status_zbc"] == 'active'){
                                                echo "<option selected value='active'>active</option>
                                                    <option value='non active'>non active</option>";
                                            }else if($hasil_data["status_zbc"] == 'non active'){
                                                echo "<option selected value='non active'>non active</option>
                                                <option value='active'>active</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                            </th>
                            </tr>
                            
                            </thead>
                                </table>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                            </form>
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
                                <script>
    function goBack() {
        window.history.back();
    }
</script>
	                            <?php include("include/footer.php"); ?>
</body>
 
</html>