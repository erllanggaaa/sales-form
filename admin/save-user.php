<?php
session_start();
if (!isset($_SESSION['admin'])) {
  // jika user belum login
  header('Location: ../Login?action=login');
  exit();
}

include("../includes/koneksi.php");

$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, md5($_POST['password']));

$query = "INSERT INTO admin(id_admin, name, email, username, password) VALUES (NULL, '$name', '$email', '$username', '$password')";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data added successfully'); window.location.href='././User'</script>";
} else {
  echo "<script>window.alert('Data added failed!'); window.location.href='././User'</script>";
}
?>