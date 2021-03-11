<?php
session_start();
include "../includes/koneksi.php";

$id = $_SESSION['admin']['id_admin'];
$sqlcekpass = mysqli_query($db, "SELECT password FROM admin WHERE id_admin = '$id'");
$hasilcekpass = mysqli_fetch_array($sqlcekpass);
if(md5($_POST['passlama']) != $hasilcekpass['password']){
	echo '<script> alert("Old Password Incorrect"); location.href="Ubah-Password" </script>';
	exit;	
}else{
	$update = mysqli_query($db, "UPDATE admin SET password='".md5($_POST['passbaru'])."' WHERE id_admin = '$id'");
		if($update){
			echo '<script> alert("Password Changed Successfully"); location.href="././logout" </script>';
			exit;
		}
}
?>