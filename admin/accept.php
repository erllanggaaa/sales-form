<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");
$id_customer=$_GET['id_customer'];

$query = "UPDATE customer SET status_customer = 'Received' WHERE id_customer = $id_customer;";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data received successfully'); window.location.href='././Received-Cust'</script>";
} else {
  echo "<script>window.alert('Data received failed!'); window.location.href='././Duplicate-Cust'</script>";
}
?>