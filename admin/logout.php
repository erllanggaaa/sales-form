<?php
session_start();
session_destroy();
	header ("Location: ../Login?action=logout");
	exit();
?>