<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$name_sales_channel = mysqli_real_escape_string($db, $_POST['name_sales_channel']);

$query = "INSERT INTO sales_channel(id_sales_channel, name_sales_channel, status_sales_channel) VALUES (NULL, '$name_sales_channel', 'active')";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data added successfully'); window.location.href='././Sales-Channel'</script>";
} else {
  echo "<script>window.alert('Data added failed!'); window.location.href='././Sales-Channel'</script>";
}
?>