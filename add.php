<?php
include('./includes/koneksi.php');
date_default_timezone_set('Asia/Jakarta');
// ambil data dari form
$application = mysqli_real_escape_string($db, $_POST['application']);
$no = mysqli_real_escape_string($db, $_POST['no']);
$project_name = mysqli_real_escape_string($db, $_POST['project_name']);
$sales_channel = mysqli_real_escape_string($db, $_POST['sales_channel']);
$sales_channel2 = mysqli_real_escape_string($db, $_POST['sales_channel2']);
$sales_person_name = mysqli_real_escape_string($db, $_POST['sales_person_name']);
$sales_person_contact = mysqli_real_escape_string($db, $_POST['sales_person_contact']);
$customer_name = mysqli_real_escape_string($db, $_POST['customer_name']);
$customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
$customer_id_no = mysqli_real_escape_string($db, $_POST['customer_id_no']);
$customer_id_no2 = mysqli_real_escape_string($db, $_POST['customer_id_no2']);
$customer_id_no3 = mysqli_real_escape_string($db, $_POST['customer_id_no3']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$contact1 = mysqli_real_escape_string($db, $_POST['contact1']);
$contact2 = mysqli_real_escape_string($db, $_POST['contact2']);
$contact3 = mysqli_real_escape_string($db, $_POST['contact3']);
$installation_address = mysqli_real_escape_string($db, $_POST['installation_address']);
$location = mysqli_real_escape_string($db, $_POST['location']);
$latitude_current = mysqli_real_escape_string($db, $_POST['latitude_current']);
$longitude_current = mysqli_real_escape_string($db, $_POST['longitude_current']);
$latitude_other = mysqli_real_escape_string($db, $_POST['latitude_other']);
$longitude_other = mysqli_real_escape_string($db, $_POST['longitude_other']);
$eform_no = mysqli_real_escape_string($db, $_POST['eform_no']);
$segment = mysqli_real_escape_string($db, $_POST['segment']);
$package = mysqli_real_escape_string($db, $_POST['package']);
$zbc = mysqli_real_escape_string($db, $_POST['zbc']);
$remarks = mysqli_real_escape_string($db, $_POST['remarks']);
$created = date('Y-m-d H:i:s');

$add = mysqli_query($db, "INSERT INTO customer(id_customer, application, no, project_name, sales_channel, sales_person_name, sales_person_contact, customer_name, customer_id, customer_id_no, email, contact1, contact2, contact3, installation_address, location, latitude_current, longitude_current, latitude_other, longitude_other, eform_no, segment, package, zbc, remarks, status_customer, created) VALUES (NULL,'$application', '$no', '$project_name', '$sales_channel$sales_channel2', '$sales_person_name', '$sales_person_contact', '$customer_name', '$customer_id', '$customer_id_no$customer_id_no2$customer_id_no3', '$email', '$contact1', '$contact2', '$contact3', '$installation_address', '$location', '$latitude_current', '$longitude_current', '$latitude_other', '$longitude_other', '$eform_no', '$segment', '$package', '$zbc', '$remarks', 'New', '$created')");
echo "<script> alert('Added successfully!'); location.href='./App?action=success' </script>";

// masukkan ke database
if($sales_channel == ''){
	$add .= mysqli_query($db, "INSERT INTO sales_channel(id_sales_channel, name_sales_channel, status_sales_channel) VALUES (NULL,'$sales_channel2','active')");
		echo "<script> alert('Added successfully!'); location.href='./App?action=success' </script>";
	}
?>