<?php
session_start();
include "../includes/koneksi.php";

$id = $_SESSION['admin']['id_admin'];
if ($edit = mysqli_query($db, "UPDATE admin SET name='".$_POST['name']."', email='".$_POST['email']."' WHERE id_admin = '$id'")){
		echo "<script> alert('Data changed successfully'); location.href='dashboard' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($db));

?>