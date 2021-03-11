<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_customer = mysqli_real_escape_string($db, $_POST['id_customer']);
$application = mysqli_real_escape_string($db, $_POST['application']);
$no = mysqli_real_escape_string($db, $_POST['no']);
$project_name = mysqli_real_escape_string($db, $_POST['project_name']);
$sales_channel = mysqli_real_escape_string($db, $_POST['sales_channel']);
$sales_person_name = mysqli_real_escape_string($db, $_POST['sales_person_name']);
$sales_person_contact = mysqli_real_escape_string($db, $_POST['sales_person_contact']);
$customer_name = mysqli_real_escape_string($db, $_POST['customer_name']);
$customer_id = mysqli_real_escape_string($db, $_POST['customer_id']);
$customer_id_no = mysqli_real_escape_string($db, $_POST['customer_id_no']);
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

$query = "UPDATE customer SET application = '$application', no = '$no', project_name = '$project_name', sales_channel = '$sales_channel', sales_person_name = '$sales_person_name', sales_person_contact = '$sales_person_contact', customer_name = '$customer_name', customer_id = '$customer_id', customer_id_no = '$customer_id_no', email = '$email', contact1 = '$contact1', contact2 = '$contact2', contact3 = '$contact3', installation_address = '$installation_address', location = '$location', latitude_current = '$latitude_current', longitude_current = '$longitude_current', latitude_other = '$latitude_other', longitude_other = '$longitude_other', eform_no = '$eform_no', segment = '$segment', package = '$package', zbc = '$zbc', remarks = '$remarks' WHERE id_customer = $id_customer";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data edited successfully'); window.location.href='././Received-Cust'</script>";
} else {
  echo "<script>window.alert('Data edited failed!'); window.location.href='././Received-Cust'</script>";
}
?>