<?php 
ob_start();
	require_once "connect.php";
	global $conn;
	$id = $_GET['id'];
	if(isset($id))
	{
		$query = "DELETE FROM users WHERE id = :id";
		$st = $conn->prepare($query);
		$st->bindValue(':id', $id);
		$st->execute();
		header("Location: listall.php");
	}
ob_end_flush();
