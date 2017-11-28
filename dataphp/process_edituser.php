<?php
ob_start();
require_once "connect.php";
if(isset($_POST["edit"]))
{	
	$id = $_POST["id"];
	if(isset($id))
	{
		$fullname = filter_input(INPUT_POST,'fullname');
		$username = filter_input(INPUT_POST,'username');
		$email = filter_input(INPUT_POST,'email');
		$password = filter_input(INPUT_POST,'password');
		global $conn;
		$query = "UPDATE users
				SET fullname = :fullname, 
					username = :username, 
					email = :email, 
					password = :password
				WHERE id = :id";
		$st = $conn->prepare($query);
		$st->bindValue(':fullname', $fullname);
		$st->bindValue(':username', $username);
		$st->bindValue(':email', $email);
		$password1 = md5($password);
		$st->bindValue(':password', $password1);
		$st->bindValue(':id', $id);
		$st->execute();

		header("Location: listall.php");
	}
}
ob_end_flush();