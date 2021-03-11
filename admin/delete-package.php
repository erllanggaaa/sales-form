<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

if($delete = mysqli_query ($db, "DELETE from package WHERE id_package = '".$_GET['id_package']."'")){
    echo "<script> alert('Data Deleted Successfully'); location.href='././Pack' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($db));

?>