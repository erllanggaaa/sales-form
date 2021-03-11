<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_sales_channel = mysqli_real_escape_string($db, $_POST['id_sales_channel']);
$name_sales_channel = mysqli_real_escape_string($db, $_POST['name_sales_channel']);
$status_sales_channel = mysqli_real_escape_string($db, $_POST['status_sales_channel']);

$query = "UPDATE sales_channel SET name_sales_channel = '$name_sales_channel', status_sales_channel = '$status_sales_channel' WHERE id_sales_channel = $id_sales_channel";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data edited successfully'); window.location.href='././Sales-Channel'</script>";
} else {
  echo "<script>window.alert('Data edited failed!'); window.location.href='././Sales-Channel'</script>";
}
?>