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
    <link rel="stylesheet" href="../assets/vendor/fonts/simple-line-icons/css/simple-line-icons.css">
    <title><?php echo $output["title"]; ?> - DASHBOARD</title>
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
	                    <!-- widgets   -->
	                    <!-- ============================================================== -->
	                    <div class="row">
	                        <!-- ============================================================== -->
	                        <!-- four widgets   -->
	                        
	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Received Customer</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT * FROM customer WHERE status_customer='Received'");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fas fa-user fa-fw fa-sm text-info"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">New<br>Customer</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT * FROM (SELECT id_customer, project_name, sales_person_name, customer_name, customer_id, customer_id_no, created, status_customer FROM customer WHERE status_customer='New' ORDER BY id_customer ASC) as dgly GROUP BY customer_id_no");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fas fa-user-plus fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        
	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Duplicated Customer</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT id_customer, application, project_name, sales_person_name, customer_name, email, contact1, customer_id, customer_id_no, created, status_customer 
FROM customer 
WHERE customer_id_no IN  (SELECT customer_id_no FROM customer WHERE status_customer='New' OR status_customer='Received' GROUP BY customer_id_no HAVING count(*) > 1)");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fas fa-clone fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Rejected Customer</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT customer_id_no FROM customer WHERE status_customer='Rejected'");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fas fa-user-times fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Deleted Customer</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT customer_id_no FROM customer WHERE status_customer='Deleted'");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fas fa-trash fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <div class="d-inline-block">
	                                        <h5 class="text-muted">Total<br>Admin</h5>
	                                        <h2 class="mb-0"> <?php
        $query = mysqli_query($db,"SELECT * FROM admin");
        $count = mysqli_num_rows($query);
        echo $count;
        ?></h2>
	                                    </div>
	                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
	                                        <i class="fa fa-users fa-fw fa-sm text-primary"></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        
	                    </div>
	                    <!-- ============================================================== -->
	                    <!-- end widgets   -->
	                    <!-- ============================================================== -->
	                    
	                                    <!-- ============================================================== -->
	                                    <!-- end content  -->
	                                    <!-- ============================================================== -->
	                                </div>
	                            </div>
	                            <?php include("include/footer.php"); ?>
</body>
 
</html>