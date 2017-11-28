<?php
	session_start();
	session_unset();
	ob_start();
	header("Location: login.php");
	ob_end_flush(); 
	exit();
?>
