<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

if($delete = mysqli_query ($db, "DELETE from sales_channel WHERE id_sales_channel = '".$_GET['id_sales_channel']."'")){
    echo "<script> alert('Data Deleted Successfully'); location.href='././Sales-Channel' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($db));

?>