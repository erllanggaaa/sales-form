<?php
$db = mysqli_connect('localhost', 'root', '', 'pform');
	
if(mysqli_connect_errno()){
	printf ('Gagal terkoneksi : '.mysqli_connect_error());
	exit();
}
?>