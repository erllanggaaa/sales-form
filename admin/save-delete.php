<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_customer = mysqli_real_escape_string($db, $_POST['id_customer']);
$information_delete = mysqli_real_escape_string($db, $_POST['information_delete']);

$query = "UPDATE customer SET status_customer = 'Deleted', information_delete = '$information_delete' WHERE id_customer = $id_customer;";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data deleted successfully'); window.location.href='././Delete-Cust'</script>";
} else {
  echo "<script>window.alert('Data deleted failed!'); window.location.href='././Duplicate-Cust'</script>";
}
?>