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
    <title><?php echo $output["title"]; ?> - by Sales Channel</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
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
                                            <li class="breadcrumb-item active" aria-current="page">by Sales Channel</li>
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
	                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
            <select class="form-control col-md-3" name="kolom" required>
                <option selected disabled='disabled' value=''>Select Sales Channel</option>
                <?php
        $sss="select * from sales_channel WHERE id_sales_channel";
        $hasil=mysqli_query($db,$sss);
        while ($hasildata2 = mysqli_fetch_array($hasil)) { 
            ?>
                <option value="<?php echo $hasildata2['name_sales_channel'];?>" ><?php echo $hasildata2['name_sales_channel'];?></option>
         <?php } ?>
         </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Search">
    </div>
    </form>
	                    <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">by Sales Channel</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Type Of Application</th>
                                                <th>Project Name</th>
                                                <th>Sales Channel</th>
                                                <th>Sales Person Name</th>
                                                <th>Sales Person Contact</th>
                                                <th>Customer Name</th>
                                                <th>Customer ID</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Installation Address</th>
                                                <th>Current Location</th>
                                                <th>Other Location</th>
                                                <th>E-Form No</th>
                                                <th>Segment</th>
                                                <th>Package</th>
                                                <th>ZBC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
      <?php
      if (isset($_POST['kolom'])) {
        $kolom=trim($_POST['kolom']);

            $sql="select * from customer where sales_channel like '%".$kolom."%' order by id_customer asc";

        }else {
            $sql="select * from customer order by id_customer asc";
        }


        $hasil=mysqli_query($db,$sql);
        while ($hasilcust = mysqli_fetch_array($hasil)) {                            
                            ?>
                                            <tr>
                                                <td><?php echo $hasilcust['application']; ?></td>
                                                <td><?php echo $hasilcust['project_name']; ?></td>
                                                <td><?php echo $hasilcust['sales_channel']; ?></td>
                                                <td><?php echo $hasilcust['sales_person_name']; ?></td>
                                                <td><?php echo $hasilcust['sales_person_contact']; ?></td>
                                                <td><?php echo $hasilcust['customer_name']; ?></td>
                                                <td><?php echo $hasilcust['customer_id']; ?> : <?php echo $hasilcust['customer_id_no']; ?></td>
                                                <td><?php echo $hasilcust['email']; ?></td>
                                                <td><?php echo $hasilcust['contact1']; ?></td>
                                                <td><?php echo $hasilcust['installation_address']; ?></td>
                                                <td><?php echo $hasilcust['latitude_current']; ?>, <?php echo $hasilcust['longitude_current']; ?></td>
                                                <td><?php if ($hasilcust['location'] != 'OTHER ADDRESS'): ?> - <?php endif; ?><?php if ($hasilcust['location'] != 'CURRENT ADDRESS'): ?><?php echo $hasilcust['latitude_other']; ?>, <?php echo $hasilcust['longitude_other']; ?><?php endif; ?></td>
                                                <td><?php echo $hasilcust['eform_no']; ?></td>
                                                <td><?php echo $hasilcust['segment']; ?></td>
                                                <td><?php echo $hasilcust['package']; ?></td>
                                                <td><?php echo $hasilcust['zbc']; ?></td>
                                                        <!-- Single button -->
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
                                <script>
                                $(document).ready(function() {
    $('#example').DataTable( {
        searching : false,
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
} );
                                </script>
	                            <?php include("include/footer.php"); ?>
</body>
 
</html>