<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

if($delete = mysqli_query ($db, "DELETE from admin WHERE id_admin = '".$_GET['id_admin']."'")){
    echo "<script> alert('Data Deleted Successfully'); location.href='././User' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($db));

?>