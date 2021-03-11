<?php 
session_start();
include 'includes/koneksi.php';

// ambil data
$username = htmlspecialchars($_POST['Username']);
$password = md5(htmlspecialchars($_POST['Password']));

// periksa username dan password
$query = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
$hasil = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($hasil);

// cek
if ($data != null) {
  // jika warga dan password cocok
  $_SESSION['admin'] = $data;
  $_SESSION["id_admin"] = $data["id_admin"];
  header('Location: ././admin/dashboard');
} else {
  // jika warga dan password tidak cocok
  echo "<script>window.alert('Username atau password salah'); window.location.href='././Login?action=failed'</script>";
}
