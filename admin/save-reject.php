<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_customer = mysqli_real_escape_string($db, $_POST['id_customer']);
$information_reject = mysqli_real_escape_string($db, $_POST['information_reject']);

$query = "UPDATE customer SET status_customer = 'Rejected', information_reject = '$information_reject' WHERE id_customer = $id_customer;";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data rejected successfully'); window.location.href='././Rejected-Cust'</script>";
} else {
  echo "<script>window.alert('Data rejected failed!'); window.location.href='././Duplicate-Cust'</script>";
}
?>