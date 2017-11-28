<?php
ob_start();
require_once "connect.php";
require_once "process.php";

if(isset($_POST["save"]))
{
	$fullname = filter_input(INPUT_POST,'fullname');
	$username = filter_input(INPUT_POST,'username');
	$email = filter_input(INPUT_POST,'email');
	$password = filter_input(INPUT_POST,'password');
	$filename = $_FILES["image"]["name"];
	$folder="images/";
	move_uploaded_file($_FILES["image"]["tmp_name"], $folder . $filename);
	$image = filter_input(INPUT_POST, 'image');
	global $conn;
	$query = "INSERT INTO users (fullname, username, email, password, image)
		VALUES (:fullname, :username, :email, :password , :image)";
	$st = $conn->prepare($query);
	$st->bindValue(':fullname', $fullname);
	$st->bindValue(':username', $username);
	$st->bindValue(':email', $email);
	$password1 = md5($password);
	$st->bindValue(':password', $password1);
	$st->bindValue(':image', $$image);
	$st->execute();
	header("Location: listall.php");
}
ob_end_flush();