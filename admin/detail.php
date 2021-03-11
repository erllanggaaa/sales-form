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
    <title><?php echo $output["title"]; ?> - DETAIL CUSTOMER</title>
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
                                            <li class="breadcrumb-item active" aria-current="page">Detail Customer</li>
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
                                <div class="table table-striped first">
                                <table>
                                    <?php
                    $id_customer=$_GET['id_customer'];
                    $sql = mysqli_query($db, "SELECT * FROM customer where id_customer='$id_customer'"); // jika tidak ada filter maka tampilkan semua entri
                    $hasil_data = mysqli_fetch_assoc($sql);// fetch query yang sesuai ke dalam array
                    ?><thead>
                            
                            <tr>
                                <th colspan="3"><b>CURRENT ADDRESS (Lat: <?=$hasil_data['latitude_current'];?>, Long: <?=$hasil_data['longitude_current'];?>)</b></th>
                            </tr>
                            <tr>
                                <th colspan="3"><iframe width="100%" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?=$hasil_data['latitude_current'];?>,<?=$hasil_data['longitude_current'];?>&amp;key=AIzaSyBxwfY29ToB1ln9ugcO1HIeUTbWvLry25I"></iframe></th>
                            </tr>
                            <?php if ($hasil_data['location'] != 'CURRENT ADDRESS'): ?>
                            <tr>
                                <th colspan="3"><b>OTHER ADDRESS (Lat: <?=$hasil_data['latitude_other'];?>, Long: <?=$hasil_data['longitude_other'];?>)</b></th>
                            </tr>
                            <tr>
                                <th colspan="3"><iframe width="100%" height="200" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?=$hasil_data['latitude_other'];?>,<?=$hasil_data['longitude_other'];?>&amp;key=AIzaSyBxwfY29ToB1ln9ugcO1HIeUTbWvLry25I"></iframe></th>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="2">Type of Application</th>
                                <th>:&emsp;<?=$hasil_data['application'];?></th>
                            </tr>
                            <?php if ($hasil_data['application'] != 'NEW NEW'): ?>
                            <tr>
                                <th colspan="2">No Del/Streamyx</th>
                                <th>:&emsp;<?=$hasil_data['no'];?></th>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="2">Project Name</th>
                                <th>:&emsp;<?=$hasil_data['project_name'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Sales Channel</th>
                                <th>:&emsp;<?=$hasil_data['sales_channel'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Sales Person Name</th>
                                <th>:&emsp;<?=$hasil_data['sales_person_name'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Sales Person Contact</th>
                                <th>:&emsp;<?=$hasil_data['sales_person_contact'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Customer Name</th>
                                <th>:&emsp;<?=$hasil_data['customer_name'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Customer ID</th>
                                <th>:&emsp;<?=$hasil_data['customer_id'];?> <?=$hasil_data['customer_id_no'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Email</th>
                                <th>:&emsp;<?=$hasil_data['email'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">1st Contact No</th>
                                <th>:&emsp;<?=$hasil_data['contact1'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">2nd Contact No</th>
                                <th>:&emsp;<?=$hasil_data['contact2']; ?></th>
                            </tr>
                            <?php if ($hasil_data['contact3']): ?>
                            <tr>
                                <th colspan="2">3rd Contact No</th>
                                <th>:&emsp;<?=$hasil_data['contact3'];?></th>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="2">Installation Address</th>
                                <th>:&emsp;<?=$hasil_data['installation_address'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">E-Form No</th>
                                <th>:&emsp;<?=$hasil_data['eform_no'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Segment</th>
                                <th>:&emsp;<?=$hasil_data['segment'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">Package</th>
                                <th>:&emsp;<?=$hasil_data['package'];?></th>
                            </tr>
                            <tr>
                                <th colspan="2">ZBC</th>
                                <th>:&emsp;<?=$hasil_data['zbc']; ?></th>
                            </tr>
                            <?php if ($hasil_data['remarks']): ?>
                            <tr>
                                <th colspan="2">Remarks</th>
                                <th>:&emsp;<?=$hasil_data['remarks'];?></th>
                            </tr>
                            <?php endif; ?>
                            <?php if ($hasil_data['information_delete']): ?>
                            <tr>
                                <th colspan="2">Information Delete</th>
                                <th>:&emsp;<?=$hasil_data['information_delete'];?></th>
                            </tr>
                            <?php endif; ?>
                            <?php if ($hasil_data['information_reject']): ?>
                            <tr>
                                <th colspan="2">Information Reject</th>
                                <th>:&emsp;<?=$hasil_data['information_reject'];?></th>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th colspan="2">Created</th>
                                <th>:&emsp;<?=$hasil_data['created'];?></th>
                            </tr>
                            </thead>
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
    function goBack() {
        window.history.back();
    }
</script>
	                            <?php include("include/footer.php"); ?>
</body>
 
</html>