<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$id_form = mysqli_real_escape_string($db, $_POST['id_form']);
$number_wa_float = mysqli_real_escape_string($db, $_POST['number_wa_float']);
$content_wa_float = mysqli_real_escape_string($db, $_POST['content_wa_float']);

$query = "UPDATE form SET number_wa_float = '$number_wa_float', content_wa_float = '$content_wa_float' WHERE id_form = $id_form";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data edited successfully'); window.location.href='././dashboard'</script>";
} else {
  echo "<script>window.alert('Data edited failed!'); window.location.href='././dashboard'</script>";
}
?>