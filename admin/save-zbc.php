<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_zbc = mysqli_real_escape_string($db, $_POST['id_zbc']);
$name_zbc = mysqli_real_escape_string($db, $_POST['name_zbc']);
$status_zbc = mysqli_real_escape_string($db, $_POST['status_zbc']);

$query = "UPDATE zbc SET name_zbc='$name_zbc', status_zbc='$status_zbc' WHERE id_zbc='$id_zbc'";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data edited successfully'); window.location.href='././ZBC'</script>";
} else {
  echo "<script>window.alert('Data edited failed!'); window.location.href='././ZBC'</script>";
}
?>