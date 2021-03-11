<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_form = mysqli_real_escape_string($db, $_POST['id_form']);
$header = mysqli_real_escape_string($db, $_POST['header']);

$query = "UPDATE form SET header = '$header' WHERE id_form = $id_form";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data edited successfully'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data edited failed!'); window.location.href='././dashboard'</script>";
}
?>