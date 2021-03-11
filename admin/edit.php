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
    <title><?php echo $output["title"]; ?> - EDIT CUSTOMER</title>

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
                                            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
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
                                <form action="save-edit.php" method="post">
                                <div class="table table-striped first">
                                <table>
                                    <?php
                    $id_customer=$_GET['id_customer'];
                    $sql = mysqli_query($db, "SELECT * FROM customer where id_customer='$id_customer'"); // jika tidak ada filter maka tampilkan semua entri
                    $hasil_data = mysqli_fetch_assoc($sql);// fetch query yang sesuai ke dalam array
                    ?><thead>
                            <tr>
                                <th>Type of Application<font color="red">*</font></th>
                                <th><input type="hidden" name="id_customer" value="<?php echo $hasil_data['id_customer']; ?>"><select id="app" name="application" class="form-control" required>
                                        <?php
                                            if($hasil_data["application"] == 'NEW NEW'){
                                                echo "<option selected value='NEW NEW'>NEW NEW</option>
                                                    <option value='MTU'>MTU</option>";
                                            }else if($hasil_data["application"] == 'MTU'){
                                                echo "<option selected value='MTU'>MTU</option>
                                                <option value='NEW NEW'>NEW NEW</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                            </th>
                            </tr>
                            <tr id="mtu" style="display: none;">
                            <th>No Del/Streamyx<font color="red">*</font></th>
                            <th><input type="text" name="no" value="<?php echo $hasil_data['no']; ?>" class="form-control"></th>
                            </tr>
                            <tr>
                                <th>Project Name<font color="red">*</font></th>
                                <th><input type="text" name="project_name" value="<?php echo $hasil_data['project_name']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>Sales Channel<font color="red">*</font></th>
                                <th><select name="sales_channel" class="form-control" required>
<?php
$query = mysqli_query($db, " SELECT a.sales_channel, b.name_sales_channel FROM customer a JOIN sales_channel b ON a.sales_channel=b.name_sales_channel");
while($data=mysqli_fetch_array($query)){
$name_sales_channel = $data['name_sales_channel'];
$select_attribute = ''; 
if ( $data['name_sales_channel'] === $data['name_sales_channel'] ) { 
  $select_attribute = 'selected'; 
}
echo '<option value=" '.$name_sales_channel.'" '. $select_attribute . ' >'.$name_sales_channel.'</option>';
}
?>
<?php
$x="select * from sales_channel where status_sales_channel='active'";
$y=mysqli_query($db,$x);
while($z=mysqli_fetch_array($y)){
echo "<option value='$z[name_sales_channel]'>$z[name_sales_channel]</option>"; 
}
?>
                    </select></th>
                            </tr>
                            <tr>
                                <th>Sales Person Name<font color="red">*</font></th>
                                <th><input type="text" name="sales_person_name" value="<?php echo $hasil_data['sales_person_name']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>Sales Person Contact<font color="red">*</font></th>
                                <th><input type="text" name="sales_person_contact" maxLength="15" value="<?php echo $hasil_data['sales_person_contact']; ?>" class="form-control" onkeypress="return hanyaAngka(event)" required></th>
                            </tr>
                            <tr>
                                <th>Customer Name<font color="red">*</font></th>
                                <th><input type="text" name="customer_name" value="<?php echo $hasil_data['customer_name']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>Customer ID<font color="red">*</font></th>
                                <th><input type="text" name="customer_id" value="<?php echo $hasil_data['customer_id']; ?>" class="form-control" readonly required></th>
                            </tr>
                            <tr>
                                <th>Customer ID No<font color="red">*</font></th>
                                <th><input type="text" name="customer_id_no" maxLength="25" value="<?php echo $hasil_data['customer_id_no']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>Email<font color="red">*</font></th>
                                <th><input type="text" name="email" value="<?php echo $hasil_data['email']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>1st Contact<font color="red">*</font></th>
                                <th><input type="text" name="contact1" maxLength="15" value="<?php echo $hasil_data['contact1']; ?>" class="form-control" onkeypress="return hanyaAngka(event)" required></th>
                            </tr>
                            <tr>
                                <th>2nd Contact<font color="red">*</font></th>
                                <th><input type="text" name="contact2" maxLength="15" value="<?php echo $hasil_data['contact2']; ?>" class="form-control" onkeypress="return hanyaAngka(event)" required></th>
                            </tr>
                            <tr>
                                <th>3rd Contact <small>(optional)</small></th>
                                <th><input type="text" name="contact3" maxLength="15" value="<?php echo $hasil_data['contact3']; ?>" class="form-control" onkeypress="return hanyaAngka(event)"></th>
                            </tr>
                            <tr>
                                <th>Installation Address<font color="red">*</font></th>
                                <th><textarea name="installation_address" class="form-control" required><?=$hasil_data['installation_address'];?></textarea></th>
                            </tr>
                            <tr>
                                <th>Location<font color="red">*</font></th>
                                <th><select id="location" name="location" class="form-control" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <?php
                                            if($hasil_data["location"] == 'CURRENT ADDRESS'){
                                                echo "<option selected value='CURRENT ADDRESS'>CURRENT ADDRESS</option>
                                                    <option value='OTHER ADDRESS'>OTHER ADDRESS</option>";
                                            }else if($hasil_data["location"] == 'OTHER ADDRESS'){
                                                echo "<option selected value='OTHER ADDRESS'>OTHER ADDRESS</option>
                                                <option value='CURRENT ADDRESS'>CURRENT ADDRESS</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select></th>
                            </tr>
                            <tr id="current" style="display: none;">
                                <th>Latitude Current<font color="red">*</font></th>
                                <th><input type="text" name="latitude_current" value="<?=$hasil_data['latitude_current'];?>" class="form-control" required></th>
                            </tr>
                            <tr id="current2" style="display: none;">
                                <th>Longitude Current<font color="red">*</font></th>
                                <th><input type="text" name="longitude_current" value="<?=$hasil_data['longitude_current'];?>" class="form-control" required></th>
                            </tr>
                            <tr id="other" style="display: none;">
                                <th>Latitude Other<font color="red">*</font></th>
                                <th><input type="text" name="latitude_other" value="<?=$hasil_data['latitude_other'];?>" class="form-control"></th>
                            </tr>
                            <tr id="other2" style="display: none;">
                                <th>Longitude Other<font color="red">*</font></th>
                                <th><input type="text" name="longitude_other" value="<?=$hasil_data['longitude_other'];?>" class="form-control"></th>
                            </tr>
                            <tr>
                                <th>E-Form No<font color="red">*</font></th>
                                <th><input type="text" name="eform_no" value="<?php echo $hasil_data['eform_no']; ?>" class="form-control" required></th>
                            </tr>
                            <tr>
                                <th>Segment<font color="red">*</font></th>
                                <th><select id="segment" name="segment" class="form-control" required 
                                            oninvalid="this.setCustomValidity('Select !')"
                                            oninput="setCustomValidity('')">
                                            <?php
                                            if($hasil_data["segment"] == 'CONSUMER'){
                                                echo "<option selected value='CONSUMER'>CONSUMER</option>
                                                    <option value='BIZ'>BIZ</option>";
                                            }else if($hasil_data["segment"] == 'BIZ'){
                                                echo "<option selected value='BIZ'>BIZ</option>
                                                <option value='CONSUMER'>CONSUMER</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select></th>
                            </tr>
                            <tr id="packagec" style="display: none;">
                                <th>Package<font color="red">*</font></th>
                                <th><select name="package" class="form-control" required>
<?php
$qu = mysqli_query($db, " SELECT a.package, b.name_package, b.segment_package FROM customer a JOIN package b ON a.package=b.name_package WHERE b.segment_package='Consumer'");
while($dat=mysqli_fetch_array($qu)){
$name_package = $dat['name_package'];
$select_attribute = ''; 
if ( $dat['name_package'] === $dat['name_package'] ) { 
  $select_attribute = 'selected'; 
}
echo '<option value=" '.$name_package.'" '. $select_attribute . ' >'.$name_package.'</option>';
}
?>
<?php
$x="select * from package where segment_package='Consumer'";
$y=mysqli_query($db,$x);
while($a=mysqli_fetch_array($y)){
echo "<option value='$a[name_package]'>$a[name_package]</option>"; 
}
?>
                    </select></th>
                            </tr>
                            <tr id="packageb" style="display: none;">
                                <th>Package<font color="red">*</font></th>
                                <th><select name="package" class="form-control" required>
<?php
$qu = mysqli_query($db, " SELECT a.package, b.name_package, b.segment_package FROM customer a JOIN package b ON a.package=b.name_package WHERE b.segment_package='Biz'");
while($dat=mysqli_fetch_array($qu)){
$name_package = $dat['name_package'];
$select_attribute = ''; 
if ( $dat['name_package'] === $dat['name_package'] ) { 
  $select_attribute = 'selected'; 
}
echo '<option value=" '.$name_package.'" '. $select_attribute . ' >'.$name_package.'</option>';
}
?>
<?php
$x="select * from package where segment_package='Biz'";
$y=mysqli_query($db,$x);
while($b=mysqli_fetch_array($y)){
echo "<option value='$b[name_package]'>$b[name_package]</option>"; 
}
?>
                    </select></th>
                            </tr>
                            <tr>
                                <th>ZBC<font color="red">*</font></th>
                                <th><select name="zbc" class="form-control" required>
                        
<?php
$query = mysqli_query($db, " SELECT a.zbc, b.name_zbc FROM customer a JOIN zbc b ON a.zbc=b.name_zbc");
while($d=mysqli_fetch_array($query)){
$name_zbc = $d['name_zbc'];
$select_attribute = ''; 
if ( $d['name_zbc'] === $d['name_zbc'] ) { 
  $select_attribute = 'selected'; 
}
echo '<option value=" '.$name_zbc.'" '. $select_attribute . ' >'.$name_zbc.'</option>';
}
?>
<?php
$x="select * from zbc where status_zbc='active'";
$y=mysqli_query($db,$x);
while($x=mysqli_fetch_array($y)){
echo "<option value='$x[name_zbc]'>$x[name_zbc]</option>"; 
}
?>
                    </select>
                    </th>
                            <tr>
                                <th>Remarks <small>(Optional)</small></th>
                                <th><textarea name="remarks" class="form-control"><?=$hasil_data['remarks'];?></textarea></th>
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